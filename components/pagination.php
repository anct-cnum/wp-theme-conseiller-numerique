<?php
/**
 * Pagination
 */
?>
<?php
$pages= paginate_links(['type' => 'array']);
if ($pages !== null) { ?>
    <div class="fr-container">
      <div class="fr-grid-row fr-grid-row--center">
        <nav role="navigation" class="fr-pagination" aria-label="Pagination">
          <ul class="fr-pagination__list">
            <?php 
            if (is_tag() || is_category()) {
                if (is_paged()) {
                    $refOne = explode('/', $wp->request);
                    array_pop($refOne);
                    array_pop($refOne);
                    $refOne = implode('/', $refOne);
                    $hrefFirst = $wp->request === "" ? '' : 'href="/' . $refOne . '"';
                } else {
                    $hrefFirst = '';
                }
            } else {
                $hrefFirst = $wp->request === "" ? '' : 'href="/"';
            }
            ?>
            <li>
              <a class="fr-pagination__link fr-pagination__link--first" <?php echo $hrefFirst; ?>>
                Premi&egrave;re page
              </a>
            </li>
            <?php 
            if (!str_contains($pages[0], 'Précédent')) { ?>
              <li>
                <a class="fr-pagination__link fr-pagination__link--prev fr-pagination__link--lg-label" aria-disabled="true" role="link">
                  Page pr&eacute;c&eacute;dente
                </a>
              </li> <?php
            }

            foreach ($pages as $page) {
                echo '<li>';
                if (str_contains($page, 'Suivant')) {
                    $page = str_replace('»', '', $page);
                    $page = str_replace('Suivant', 'Page suivante', $page);
                    echo str_replace('page-numbers', 'fr-pagination__link fr-pagination__link--next fr-pagination__link--lg-label', $page);
                } else if (str_contains($page, 'Précédent')) {
                    $page = str_replace('«', '', $page);
                    $page = str_replace('Précédent', 'Page précédente', $page);
                    echo str_replace('page-numbers', 'fr-pagination__link fr-pagination__link--prev fr-pagination__link--lg-label', $page);
                } else {
                    echo str_replace('page-numbers', 'fr-pagination__link', $page);
                }
                echo '</li>';
            }

            if (!str_contains($pages[array_key_last($pages)], 'Suivant')) { ?>
                <li>
                  <a class="fr-pagination__link fr-pagination__link--next fr-pagination__link--lg-label" aria-disabled="true" role="link">
                    Page suivante
                  </a>
                </li>
                <?php
                $hrefLast = '';
            } else {
                if (is_tag() || is_category()) {
                    $lastPage =  !str_contains($pages[0], 'Précédent') ? array_key_last($pages) : (int)array_key_last($pages) - 1;
                    if (is_paged()) {
                        $refLast = explode('/', $wp->request);
                        array_pop($refLast);
                        array_pop($refLast);
                        $refLast = implode('/', $refLast);
                        $hrefLast = $wp->request === "" ? '' : 'href="/' . $refLast . '/page/' . $lastPage . '"';
                    } else {
                        $hrefLast = $wp->request === "" ? '' : 'href="/' . $wp->request . '/page/' . $lastPage . '"';
                    }
                } else {
                    $lastPage =  !str_contains($pages[0], 'Précédent') ? array_key_last($pages) + 1 : (int)array_key_last($pages) - 1;
                    $hrefLast = 'href="/page/' . $lastPage . '"';
                }
            } ?>
            <li>
                <a class="fr-pagination__link fr-pagination__link--last" <?php echo $hrefLast; ?>>
                  Derni&egrave;re page
                </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <?php
}
