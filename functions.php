<?php
/**
 * Fonctions
 */

add_theme_support('title-tag');
wp_enqueue_style('dsfr');
wp_enqueue_style('utilities');
wp_enqueue_style('custom');

/**
 * Filtrage des posts selon tag / catégorie 
 * 
 * @param $request  requete entrante
 * @param $my_posts liste des posts
 * 
 * @return posts
 */
function getPostsFiltered($request, $my_posts) 
{
    if (have_posts()) {  
        //Filtre pas tag ou catégorie
        if (is_tag()) {
            $tagFiltered = explode('/', $request)[1]; //on prend le query param 1
            $my_posts = array_filter(
                $my_posts, 
                function ($post) use ($tagFiltered) {
                    $tags = wp_get_post_tags($post->ID);
                    if (count($tags) > 0) {
                        foreach ($tags as $tag) {
                            if ($tag->slug === $tagFiltered) {
                                  return true;
                            }
                        }
                    }
                    return false;
                }
            );
        } elseif (is_category()) {
            //Si pagination => suppression des query params correspondants (au cas où hiérarchie des catégories)
            if (is_paged()) {
                $categoryFiltered = explode('/', $request);
                array_pop($categoryFiltered);
                array_pop($categoryFiltered);
                $categoryFiltered = implode('/', $categoryFiltered);
                $categoryFiltered = array_pop(explode('/', $categoryFiltered));
            } else {
                $categoryFiltered = array_pop(explode('/', $request)); 
            }
            $my_posts = array_filter(
                $my_posts,
                function ($post) use ($categoryFiltered) {
                    $categories = wp_get_post_categories($post->ID);
                    if (count($categories) > 0) {
                        foreach ($categories as $key => $categorie) {
                            if (get_category_by_slug($categoryFiltered)->name === get_cat_name($categorie)) {
                                return true;
                            }
                        }
                    }
                    return false;
                }
            );
        }

        //flag du premier post de la première page pour son affichage différent
        if (get_query_var('paged') === 0) {
            $my_posts[0]->first = true;
        } else {
            $my_posts[0]->anchor = true;
        }

        return $my_posts;
    }
}

/**
 * Récupération de la durée de la vidéo si présente dans le post
 * 
 * @param $postId id du post
 * 
 * @return string
 */
function getDurationFirstVideo($postId)
{
    $post = get_post($postId);
    $content = do_shortcode(apply_filters('the_content', $post->post_content));
    $embeds = get_media_embedded_in_content($content);

    if (!empty($embeds)) {
        foreach ($embeds as $embed) {
            //Prend la durée de le première vidéo embed trouvée
            if (strpos($embed, 'video')) {
                $urlFirstVideo = substr($embed, strpos($embed, "http"));
                $urlFirstVideo = substr($urlFirstVideo, 0, strpos($urlFirstVideo, "\""));

                $attachments = get_posts(
                    array(
                        'post_type' => 'attachment',
                        'post_guid' => $urlFirstVideo,
                        'posts_per_page' => -1,
                        'post_parent' => [$postId, 0], //0 au cas où le fichier a été uploadé en dehors de l'article
                        'exclude'     => get_post_thumbnail_id()
                        )
                );

                if (!empty($attachments)) {
                    $attachments = array_filter(
                        $attachments, function ($attachment) use ($urlFirstVideo) {
                            return $attachment->guid === $urlFirstVideo;
                        }
                    );
                    foreach ($attachments as $attachment) {
                        //Prend la durée de le première vidéo embed trouvée
                        if (str_contains($attachment->post_mime_type, 'video')) {
                            $metadata = wp_get_attachment_metadata($attachment->ID);
                            include_once ABSPATH . 'wp-admin/includes/media.php';
                            return ' - lecture : ' . human_readable_duration(gmdate('i:s', $metadata['length']));
                        }
                    }
                }
                //Cherche une vidéo youtube si présente
            } else if (strpos($embed, 'iframe') && strpos($embed, 'youtube') && YOUTUBE_GOOGLE_API_KEY) {
                $urlFirstVideo = substr($embed, strpos($embed, "http"));
                $urlFirstVideo = substr($urlFirstVideo, 0, strpos($urlFirstVideo, "\""));

                // Récupértion de l'id associé à l'url
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $urlFirstVideo, $matches);
                $video_id = $matches[1];
                $json_result = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=" . $video_id . "&key=" . YOUTUBE_GOOGLE_API_KEY); //Configuré en var d'env
                $result = json_decode($json_result, true);

                if (count($result['items'])) {
                    $duration_encoded = $result['items'][0]['contentDetails']['duration'];
                
                    // Durée en secondes
                    $interval = new DateInterval($duration_encoded);
                    $seconds = $interval->days * 86400 + $interval->h * 3600 + $interval->i * 60 + $interval->s;
                
                    include_once ABSPATH . 'wp-admin/includes/media.php';
                    return ' - lecture : ' . human_readable_duration(gmdate('i:s', $seconds));
                }
            }
        }
    }
    //pas de vidéo "embed" trouvée
    return '';
}

/**
 * Tri par ordre alphabétique
 * 
 * @param $a nom1
 * @param $b nom2
 * 
 * @return int
 */
function cmp($a, $b)
{
    if ($a->name < $b->name) {
        return -1;
    } else if ($a->name > $b->name) {
        return 1;
    }
    return 0;
}

/**
 * Ajout des classes du DSFR sur des éléments du DOM
 * 
 * @param $content contenu
 * 
 * @return html
 */
function addDsfrClass($content)
{
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    if (!empty($content)) {
        $document = new DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML(utf8_decode($content));

        //Ajout des classes des titres/sous-titres
        for ($i = 1; $i <= 6; $i++) {
            $level = 'h' . $i;
            $class = 'fr-h' . $i; 
            $titles = $document->getElementsByTagName($level);
            if ($titles) {
                foreach ($titles as $title) {
                    $title->setAttribute('class', $class);
                }
            }
        }

        //Suppression du thumbnail quand trouvé (pour ne pas qu'elle soit affichée 2 fois en haut et dans le contenu)
        $images = $document->getElementsByTagName('figure');
        if ($images) {
            foreach ($images as $image) {
                if ($image->getAttribute('class') === 'wp-block-post-featured-image') {
                    $image->setAttribute('style', 'display:none');
                    break;
                }
            }
        }

        $html = $document->saveHTML();
        return $html;
    }
}

//Appel de la fonction addDsfrClass lorsque le contenu the_content est affiché
add_filter('the_content', 'addDsfrClass');
