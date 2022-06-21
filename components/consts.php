<?php 
/**
 * Constantes
 */
define("ALL_ARTICLES", "Tous les articles");
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version); //version du style.css - permet de charger une nouvelle version directement
global $wp;

/**
 * Google api key (permet de récupérer la durée d'une vidéo youtube)
 */
define('YOUTUBE_GOOGLE_API_KEY', getenv('GOOGLE_API_KEY'));
