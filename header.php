<?php
/**
 * Header
 */
?>
<!doctype html>
<html lang="fr" data-fr-scheme="light">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_register_style("dsfr", get_template_directory_uri() . "/dsfr.min.css", '', '1.5.1'); ?>
    <?php wp_register_style("utilities", get_template_directory_uri() . "/utility/utility.min.css", '', '1.5.1'); ?>
    <?php wp_register_style("custom", get_template_directory_uri() . "/style.css", '', THEME_VERSION); ?>
    <meta name="theme-color" content="#000091">
    <link rel="apple-touch-icon" href="favicon/apple-touch-icon.png"><!-- 180×180 -->
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon/favicon.svg" type="image/svg+xml">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon/favicon.ico" type="image/x-icon"><!-- 32×32 -->
    <?php wp_head() ?>
  </head>
  <body>
    <header role="banner" class="fr-header">
      <div class="fr-header__body">
        <div class="fr-container">
          <div class="fr-header__body-row">
            <div class="fr-header__brand fr-enlarge-link">
              <div class="fr-header__brand-top">
                <div class="fr-header__logo">
                  <a href="https://www.conseiller-numerique.gouv.fr" title="Accueil - Conseiller num&eacute;rique France services">
                      <p class="fr-logo">
                          R&eacute;publique
                        <br />
                          Française
                      </p>
                  </a>
                </div>
                <div class="fr-header__operator">
                  <img src="<?php bloginfo('template_url'); ?>/logos/logo-rf-conseiller-numerique-min.svg" class="fr-responsive-img" alt="Logo Conseiller num&eacute;rique" />
                </div>
                <div class="fr-header__navbar">
                  <button class="fr-btn--menu fr-btn" data-fr-opened="false" aria-controls="modal-833" aria-haspopup="menu" title="Menu" id="fr-btn-menu-mobile-4">
                    Menu
                  </button>
                </div>
              </div>
            </div>
            <div class="fr-header__tools">
              <div class="fr-header__tools-links">
                <ul class="fr-links-group">
                  <li>
                    <a
                      title="Aide"
                      class="fr-link fr-icon-question-answer-line"
                      href="https://aide.conseiller-numerique.gouv.fr/fr/"
                      target="_blank"
                      rel="noopener noreferrer">
                        J&rsquo;ai une question
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require 'components/menu.php' ?>
    </header>
