<?php 
/**
 * Constantes
 */
define("ALL_ARTICLES", "Tous les articles");
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version); //version du style.css - permet de charger une nouvelle version directement
global $wp;
