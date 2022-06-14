<?php
/**
 * Liste des catégories
 */
?>
<span>Filtrer par type de m&eacute;dia&nbsp;:</span> 
<p>
  <?php 
    $categories = get_categories();
    $page = home_url($wp->request);

    if ($categories) :
        usort($categories, 'cmp');
        foreach ($categories as $category) :
            $urlActive = $page;
            //Si pagination => suppression des query params correspondants
            if (is_paged()) {
                $urlActive = explode('/', $page);
                array_pop($urlActive);
                array_pop($urlActive);
                $urlActive = implode('/', $urlActive);
            }
            $active = esc_url(get_category_link($category->term_id)) === $urlActive . '/' ? "true" : "false";
            $redirect = esc_url(get_category_link($category->term_id)); 
            $hrefCategorie = esc_url(get_category_link($category->term_id)) === $urlActive . '/' ? '' : 'href="' . $redirect . '"';
            ?>
            <button class="fr-tag fr-tag--sm fr-mr-2w fr-mt-2w" style="border-radius:4px" aria-pressed="<?php echo $active; ?>">
              <a class="tag" <?php echo $hrefCategorie; ?> title="<?php echo esc_attr($category->name); ?>"><?php echo esc_html($category->name); ?></a>
            </button>
        <?php endforeach;
    else :
        echo "<em>Aucune cat&eacute;gorie pr&eacute;sente</em>";
    endif;
    $hrefAllArticles = is_home() ? '' : 'href="' . home_url() . '"' ?>
    <button class="fr-tag fr-tag--sm fr-mr-2w fr-mt-2w" style="border-radius:4px" aria-pressed="<?php echo is_home() ? "true" : "false" ?>">
        <a class="tag" <?php echo $hrefAllArticles; ?> title="<?php echo ALL_ARTICLES ?>"><?php echo ALL_ARTICLES ?></a>
    </button>
</p>
