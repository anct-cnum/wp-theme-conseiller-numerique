<?php
/**
 * Template for a full post
 */
?>
<div class="fr-container">
  <div class="fr-grid-row">
    <div class="fr-col-xs-12 fr-col-md-6">
      <div class="fr-mt-7w">
        <a class="fr-link fr-fi-arrow-left-line fr-link--icon-left fr-pb-2w" style="background-image:none;border-bottom: 1px solid #E5E5E5" href="<?php echo wp_get_referer(); ?>" style="font-weight: 500">
          Retour à l&rsquo;index
        </a>
      </div>
      <div class="fr-mr-5w fr-mt-5w">
        <h3 class="fr-h3"><?php echo the_title() ?></h3>
      </div>
      <div class="fr-mr-5w fr-mt-5w">
        <?php 
        $tags = wp_get_post_tags($post->ID); 
        if ($tags) {
            foreach ($tags as $tag) : ?>
                <span class="fr-tag fr-tag--sm fr-mr-2w"><?php echo $tag->slug; ?></span>
            <?php endforeach;
        }
        ?>
      </div>
      <div class="fr-mr-5w fr-mt-5w">
        Le <?php the_time('d/m/Y'); ?>
        <?php echo getDurationFirstVideo($post->ID); ?>
      </div>
    </div>
    <div class="fr-col-xs-12 fr-col-md-6">
      <?php $image = get_the_post_thumbnail_url($post->ID, 'single-post-thumbnail');  ?>
      <div style="position:relative;display:flex;height:100%">
        <img src="<?php echo $image; ?>" style="max-width:100%" />
      </div>
    </div>
  </div>
</div>
<div class="fr-container">
  <div class="fr-grid-row fr-grid-row--center">
    <a href="#anchor-content" style="background-image: none">
      <span class="fr-icon-arrow-down-s-line"></span>
    </a>
  </div>
</div>
<div class="fr-container" id="anchor-content">
  <div class="fr-grid-row fr-my-12w">
    <div class="fr-col-xs-1 fr-col-md-2"></div>
    <div class="fr-col-xs-10 fr-col-md-8">
      <!-- Affichage du contenu sans le thumbnail get_the_content(); VS the_content() -->
      <?php echo get_the_content(); ?>
      <a class="fr-link fr-fi-arrow-up-line fr-link--icon-up fr-pb-2w" style="background-image:none;border-bottom: 1px solid #E5E5E5" href="#" style="font-weight: 500">
        Haut de page
      </a>
  </div>
    </div>
    <div class="fr-col-xs-1 fr-col-md-2"></div>
  </div>
</div>
