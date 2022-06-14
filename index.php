<?php
/**
 * Entry point
 */
?>
<!-- CONSTANTES -->
<?php require 'components/consts.php'; ?>
<!-- HEADER -->
<?php get_header() ?>
<!-- CONTENT -->
<?php
if (is_home() || is_tag() || is_category()) :
    // Partie présentation avec les tags et les catégories
    include 'components/welcome-part.php';

    // Applique les filtres si besoin
    $postsFiltered = getPostsFiltered($wp->request, $posts);
    // Affichage spécifique du premier post sur la première page uniquement (publication + récente)
    if ($postsFiltered[0]->first === true) :
        get_template_part('template-parts/first-post');
        array_shift($postsFiltered); //on le supprime des posts restants à afficher
    endif;
    ?>
    <!-- Affichage des autres posts -->
    <div class="fr-container">
      <div class="fr-grid-row fr-grid-row--center fr-my-4w">
        <?php
        $numPost = 2;
        foreach ($postsFiltered as $post) {
            $post->numPost = $numPost++;
            get_template_part('template-parts/next-posts');
        }
        ?>
      </div>
    </div>
    <?php
else:
    // Affichage de l'article en entien
    while (have_posts()) {
        the_post();
        //Cas article : non utilisé pour le moment (laissé sans template)
        if (is_page()) {
            the_title();
            the_content();
        } else {
            //Cas posts (= is_single())
            get_template_part('template-parts/full-post');
        }
    }
endif;
require 'components/pagination.php';
require 'components/help-part.php';
?>  
<!-- FOOTER -->
<?php get_footer() ?>
