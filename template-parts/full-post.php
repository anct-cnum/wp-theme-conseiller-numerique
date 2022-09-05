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
          Retour aux articles
        </a>
      </div>
      <div class="fr-mr-5w fr-mt-5w">
        <h1 class="fr-h1"><?php echo the_title() ?></h1>
      </div>
      <div class="fr-mr-5w fr-mt-5w">
        <span style="font-size:14px;color:#929292;">Th&eacute;matique(s)&nbsp;:</span>
        <?php 
        $tags = wp_get_post_tags($post->ID); 
        if ($tags) {
            foreach ($tags as $tag) : ?>
                <span class="fr-tag fr-mr-2w fr-mb-1w"><?php echo $tag->name; ?></span>
            <?php endforeach;
        }
        ?>
      </div>
      <div class="fr-mr-5w fr-mt-3w">
      <span style="font-size:12px;color:#929292;">Type(s) de m&eacute;dia&nbsp;:</span>
        <?php 
        $categories = wp_get_post_categories($post->ID); 
        if ($categories) {
            foreach ($categories as $category) :
                $nameCategory = get_cat_name($category);
                ?>
                <span class="fr-tag fr-tag--sm fr-mr-1w fr-mb-1w" style="border-radius:4px"><?php echo $nameCategory; ?></span>
            <?php endforeach;
        }
        ?>
      </div>
      <div class="fr-mr-5w fr-mt-3w" style="font-size:12px">
        Le <?php the_time('d/m/Y'); ?>
        <?php echo getDurationFirstVideo($post->ID); ?>
      </div>
    </div>
    <div class="fr-col-xs-12 fr-col-md-6" style="align-self:center">
      <?php $image = get_the_post_thumbnail_url($post->ID, 'single-post-thumbnail');  ?>
      <?php $legend = get_the_post_thumbnail_caption($post->ID); ?>
      <div style="position:relative;display:flex;flex-direction:column;max-height:100%">
        <img src="<?php echo $image; ?>" style="max-width:100%;z-index:-1" />
        <span style="align-self:center"><b><em><?php echo $legend ?></em></b></span>
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
      <?php echo the_content(); ?>
      <a class="fr-link fr-fi-arrow-up-line fr-link--icon-up fr-pb-2w" style="background-image:none;border-bottom: 1px solid #E5E5E5" href="#" style="font-weight: 500">
        Haut de page
      </a>
  </div>
    </div>
    <div class="fr-col-xs-1 fr-col-md-2"></div>
  </div>
</div>
