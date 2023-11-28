<?php

/*
|--------------------------------------------------------------------------
| JS Data 
|--------------------------------------------------------------------------
|
| Exposes certain PHP data to JS.
|
*/

$jsData = [
  'home' => home_url(),
  'theme' => get_template_directory_uri(),
  'l10n' => [
    'search' => [
      'button' => __('Search', 'blankcanvas'),
      'placeholder' => __('Type Something', 'blankcanvas'),
      'noResults' => __('No Results Found', 'blankcanvas'),
    ],
  ]
];

/*
|--------------------------------------------------------------------------
| Script Filter
|--------------------------------------------------------------------------
|
| Filters scripts and styles to add extra attributes.
|
*/

add_filter('script_loader_tag', function($tag, $handle) {

  // Load scripts as modules
  if (substr($handle, 0, 7) === 'module-') {
    $tag = str_replace('<script', '<script type="module"', $tag);
  }

  return $tag;
}, 20, 2);

/*
|--------------------------------------------------------------------------
| Theme Scripts
|--------------------------------------------------------------------------
|
| Registers and enqueues theme scripts and styles.
|
*/

add_action('wp_enqueue_scripts', function () use ($jsData) {

  /**
   * Lottie player
   */
  wp_enqueue_script('lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', [], null);

  /**
   * Theme bundle 
   * 
   * Contains customized version of bootstrap (5.2).
   */
  wp_enqueue_style('blankcanvas-bundle', THEME_URI.'/assets/css/bundle.min.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-bundle', THEME_URI.'/assets/js/bundle.min.js', [], THEME_VER, true);
  wp_localize_script('blankcanvas-bundle', 'bc', $jsData);

  /**
   * Bootstrap icons
   */
  wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css', [], '1.11.1');

  /**
   * Google icons (Material Symbols)
   */
  wp_enqueue_style('google-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@32,200,0,0', [], null);

  /**
   * Animejs
   * 
   * This library allows us to do really cool hassle-free animations.
   * 
   * https://animejs.com/
   */
  wp_enqueue_script('animejs', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js', [], '3.2.1', true);

  /**
   * Animatab
   * 
   * This tiny library is developed by us.
   */
  wp_enqueue_style('blankcanvas-animatab', THEME_URI.'/assets/css/animatab.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-animatab', THEME_URI.'/assets/js/animatab.js', ['animejs'], THEME_VER);

  /**
   * Particles
   * 
   * Allows us to add particles effect on images and elements.
   */
  // wp_enqueue_script('particles', 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', [], '2.0.0', true);

  /**
   * Blankcanvas onscreen
   * 
   * This tiny library is developed by us. 
   * 
   * This library allows us to attach callbacks to elements which are
   * triggered when the element is visible on viewport.
   * 
   * https://blankcanvas.me/
   */
  wp_enqueue_script('blankcanvas-onscreen', THEME_URI.'/assets/js/onscreen.js', [], THEME_VER);

  /**
   * Blankcanvas transition
   * 
   * This Tiny library is developed by us. 
   * 
   * This library allows us to attach cool animations to elements using
   * data attributes. 
   * 
   * https://blankcanvas.me/
   */
  wp_enqueue_style('blankcanvas-transition', THEME_URI.'/assets/css/transition.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-transition', THEME_URI.'/assets/js/transition.js', ['blankcanvas-onscreen', 'animejs'], THEME_VER, true);

  /**
   * Blankcanvas revealer
   * 
   * This Tiny library is developed by us. 
   * 
   * This library allows us to attach cool reveal animations to elements and text.
   * 
   * https://blankcanvas.me/
   */
  wp_enqueue_style('blankcanvas-revealer', THEME_URI.'/assets/css/revealer.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-revealer', THEME_URI.'/assets/js/revealer.js', ['blankcanvas-onscreen', 'animejs'], THEME_VER, true);
  
  /**
   * Blankcanvas Youtube player
   */
  
  wp_enqueue_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api', [], null, true);
  wp_enqueue_style('blankcanvas-youtube-player', THEME_URI.'/assets/css/youtube-player.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-youtube-player', THEME_URI.'/assets/js/youtube-player.js', ['youtube-iframe-api', 'blankcanvas-onscreen'], THEME_VER, true);
  
  /**
   * Blankcanvas video player
   */
  wp_enqueue_script('blankcanvas-video-player', THEME_URI.'/assets/js/video-player.js', ['blankcanvas-onscreen'], THEME_VER, true);
    
  /**
   * Blankcavas Theme toggle
   */
  // wp_enqueue_style('open-props-easings', 'https://unpkg.com/open-props@1.5.10/easings.min.css', [], '1.5.10');
  wp_enqueue_style('blankcanvas-theme-toggle', THEME_URI.'/assets/css/theme-toggle.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-theme-toggle', THEME_URI.'/assets/js/theme-toggle.js', [], THEME_VER);

  /**
   * Glide slider
   */
  wp_register_script('glide', 'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js', [], '3.6.0', true);
  wp_register_style('glide', 'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css', [], '3.6.0');
  wp_register_style('glide-theme', 'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.theme.min.css', [], '3.6.0');

  /**
   * Blankcanvas Letterize
   */
  wp_enqueue_script('letterize', 'https://cdn.jsdelivr.net/npm/letterizejs@2.0.1/lib/letterize.min.js', [], '2.0.1', true);
  wp_enqueue_script('blankcanvas-letterize', THEME_URI.'/assets/js/letterize.js', ['blankcanvas-onscreen', 'animejs', 'letterize'], THEME_VER, true);
  wp_enqueue_style('blankcanvas-letterize', THEME_URI.'/assets/css/letterize.css', [], THEME_VER);

  /**
   * Blankcanvas Tiles
   */
  wp_enqueue_script('blankcanvas-tiles', THEME_URI.'/assets/js/tiles.js', ['blankcanvas-onscreen', 'animejs'], THEME_VER, true);
  wp_enqueue_style('blankcanvas-tiles', THEME_URI.'/assets/css/tiles.css', [], THEME_VER);

  /**
   * Simple parallax
   */
  wp_enqueue_script('simple-parallax', 'https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js', [], THEME_VER, true);

  /**
   * Theme main JS & CSS
   */
  wp_enqueue_style('blankcanvas', get_stylesheet_uri(), [], THEME_VER);
  wp_enqueue_script('blankcanvas', THEME_URI.'/assets/js/main.js', [], THEME_VER, true);

  /**
   *  WP comment
   */
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  /**
   * WPBakery main CSS
   */
  wp_enqueue_style('blankcanvas-vc-main', THEME_URI.'/inc/vc/assets/css/main.css', [], THEME_VER);
});

/*
|--------------------------------------------------------------------------
| Admin Scripts
|--------------------------------------------------------------------------
|
| Enqueues scripts and styles for admin panel.
|
*/

add_action('admin_enqueue_scripts', function () use ($jsData) {

  // Admin main assets
  wp_enqueue_style('blankcanvas-admin', THEME_URI.'/assets/css/admin.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-admin', THEME_URI.'/assets/js/admin.js', [], THEME_VER, true);

  // WPBakery
  wp_enqueue_style('blankcanvas-vc-admin', THEME_URI.'/inc/vc/assets/css/admin.css', [], THEME_VER);
  wp_enqueue_script('module-blankcanvas-vc-admin', THEME_URI.'/inc/vc/assets/js/admin.js', [], THEME_VER, true);

  // WPBakery
  // wp_enqueue_style('blankcanvas-acf-admin', THEME_URI.'/inc/acf/assets/css/admin.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-acf-admin', THEME_URI.'/inc/acf/assets/js/admin.js', [], THEME_VER, true);

  // Bootstrap icons
  wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', [], '1.9.1');

  // Grapick (gradient color picker)
  wp_enqueue_style('grapick', 'https://cdn.jsdelivr.net/gh/artf/grapick@0.1.13/dist/grapick.min.css', [], '0.1.13');
  wp_enqueue_script('grapick', 'https://cdn.jsdelivr.net/gh/artf/grapick@0.1.13/dist/grapick.min.js', [], '0.1.13', true);
  wp_enqueue_script('module-grapick', THEME_URI.'/inc/vc/assets/js/modules/grapick.js', ['grapick'], THEME_VER, true); // Just a wrapper

  // CodeMirror (code editor)
  wp_enqueue_style('wp-codemirror');
  wp_enqueue_script('wp-codemirror');
  wp_enqueue_script('module-wp-codemirror-editor', THEME_URI.'/assets/js/modules/codeMirror.js', ['wp-codemirror'], THEME_VER, true); // Just a wrapper
  
  // Contact Form 7
  wp_enqueue_script('module-blankcanvas-wpcf7-admin', THEME_URI.'/inc/wpcf7/assets/js/admin.js', [], THEME_VER, true);

  /**
   * Localize data
   */
  wp_localize_script('blankcanvas-admin', 'bc', $jsData);
}, 99);

/*
|--------------------------------------------------------------------------
| Script Filter
|--------------------------------------------------------------------------
|
| Filters scripts and styles to add extra attributes.
|
*/

add_filter('script_loader_tag', function($tag, $handle) {

  // Load scripts as modules
  if (substr($handle, 0, 7) === 'module-') {
    $tag = str_replace('<script', '<script type="module"', $tag);
  }

  return $tag;
}, 20, 2);