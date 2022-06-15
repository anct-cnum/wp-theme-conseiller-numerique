<?php
/**
 * Template for first post on home
 */
?>
<div class="fr-container" id="anchor-list">
  <div class="fr-grid-row fr-my-12w" style="border:1px solid #E5E5E5">
    <a href="<?php echo get_permalink($post->ID)?>" class="post-card-first">
      <div class="fr-col-xs-12 fr-col-lg-6">
        <?php $image = get_the_post_thumbnail_url($post->ID, 'single-post-thumbnail');  ?>
        <div style="position:relative;display:flex;height:100%">
          <img src="<?php echo $image; ?>" style="width:100%;max-width:100%;height:100%" />
          <div style="position:absolute;left:20px;top:20px;display:inline-block">
            <?php 
            $categories = wp_get_post_categories($post->ID); 
            if ($categories) {
                foreach ($categories as $category) :
                    $nameCategory = get_cat_name($category);
                    ?>
                    <span class="fr-tag fr-tag--sm fr-mr-2w" style="border-radius:4px;color:#000091;background-color:#e3e3fd"><?php echo $nameCategory; ?></span>
                <?php endforeach;
            }
            ?>
          </div>
        </div>
      </div>
      <div class="fr-col-xs-12 fr-col-lg-6">
        <div class="fr-mx-5w fr-mt-5w">
            <?php 
            $tags = wp_get_post_tags($post->ID); 
            if ($tags) {
                foreach ($tags as $tag) : ?>
                    <span class="fr-tag fr-tag--sm fr-mr-2w"><?php echo $tag->slug; ?></span>
                <?php endforeach;
            }
            ?>
        </div>
        <div class="fr-mx-5w fr-mt-5w">
          Le <?php the_time('d/m/Y'); ?>
          <?php echo getDurationFirstVideo($post->ID); ?>
        </div>
        <div class="fr-mx-5w fr-my-5w">
          <h3 class="fr-h3"><?php echo $post->post_title; ?></h3>
          <br/>
          <?php echo substr(wp_strip_all_tags($post->post_content), 0, 250) . '...'; ?> <!-- on n'affiche ici que du texte et à 250 caractères on coupe -->
        </div>
      </div>
    </a>
  </div>
</div>
