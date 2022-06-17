<?php
/**
 * Template for next posts
 */
?>
<?php if ($post->numPost % 3 === 0) : ?>
  <div class="fr-col-1"></div>
<?php endif; ?>
<div class="fr-col-xs-12 fr-col-md-3 fr-mb-8w next-post">
  <a href="<?php echo get_permalink($post->ID)?>" class="post-card">
    <?php $image = get_the_post_thumbnail_url($post->ID, 'single-post-thumbnail'); ?>
    <div style="position:relative;display:flex">
      <img src="<?php echo $image; ?>" style="width:100%;max-width:100%;height:205px" />
      <div style="position:absolute;left:20px;top:20px;display:inline-block">
        <?php 
        $categories = wp_get_post_categories($post->ID); 
        if ($categories) {
            foreach ($categories as $category) :
                $nameCategory = get_cat_name($category);
                ?>
                <span class="fr-tag fr-tag--sm fr-mr-1w fr-mb-1w" style="border-radius:4px;color:#000091;background-color:#e3e3fd"><?php echo $nameCategory; ?></span>
            <?php endforeach;
        }
        ?>
      </div>
    </div>
    <div class="fr-mx-1w fr-mt-2w" style="text-align:center">
      <?php 
        $tags = wp_get_post_tags($post->ID); 
        if ($tags) {
            foreach ($tags as $tag) : ?>
                <span class="fr-tag fr-tag--sm fr-mr-2w fr-mt-2w"><?php echo $tag->slug; ?></span>
            <?php endforeach;
        }
        ?>
    </div>
    <div class="fr-mx-2w fr-mt-2w">
      Le <?php the_time('d/m/Y'); ?>
      <?php echo getDurationFirstVideo($post->ID); ?>
    </div>
    <div class="fr-mx-2w fr-my-1w">
      <h2 class="fr-h3"><?php echo $post->post_title; ?></h3>
      <?php echo substr(wp_strip_all_tags($post->post_content), 0, 150) . '...'; ?> <!-- on n'affiche ici que du texte et à 150 caractères on coupe -->
    </div>
  </a>
</div>
<?php if ($post->numPost % 3 === 0) : ?>
  <div class="fr-col-1"></div>
<?php endif; ?>