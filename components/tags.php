<?php
/**
 * Liste des tags
 */
?>
<span>Filtrer par th&eacute;matique&nbsp;:</span> 
<p>
  <?php
    $tags = get_tags('post_tag');
    global $wp;
    $page = home_url($wp->request);

    if ($tags) :
        usort($tags, 'cmp');
        foreach ($tags as $tag) :
            $urlActive = $page;
            //Si pagination => suppression des query params correspondants
            if (is_paged()) {
                $urlActive = explode('/', $page);
                array_pop($urlActive);
                array_pop($urlActive);
                $urlActive = implode('/', $urlActive);
            }

            $active = esc_url(get_tag_link($tag->term_id)) === $urlActive . '/' ? "true" : "false";
            $redirect = esc_url(get_tag_link($tag->term_id));
            $hrefTag = esc_url(get_tag_link($tag->term_id)) === $urlActive . '/' ? '' : 'href="' . $redirect . '"';
            ?>
            <button class="fr-tag fr-tag--sm fr-mr-2w fr-mt-2w" aria-pressed="<?php echo $active; ?>">
              <a class="tag" <?php echo $hrefTag; ?> title="<?php echo esc_attr($tag->name); ?>"><?php echo esc_html($tag->name); ?></a>
            </button>
        <?php endforeach;
    else :
        echo '<em>Aucun th&egrave;me pr&eacute;sent</em>';
    endif; ?>
</p>
