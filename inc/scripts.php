<?php

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

add_action('wp_enqueue_scripts', function () {

  /**
   * Theme bundle 
   * 
   * Contains customized version of bootstrap (5.2).
   */
  wp_enqueue_style('blankcanvas-bundle', THEME_URI . '/assets/css/bundle.min.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-bundle', THEME_URI . '/assets/js/bundle.min.js', [], THEME_VER, true);

  /**
   * Bootstrap icons
   */
  wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', [], '1.9.1');

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
  wp_enqueue_script('blankcanvas-animatab', THEME_URI . '/assets/js/animatab.js', ['animejs'], THEME_VER, true);

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
  wp_enqueue_script('blankcanvas-onscreen', THEME_URI . '/assets/js/onscreen.js', [], THEME_VER, true);

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
  wp_enqueue_style('blankcanvas-transition', THEME_URI . '/assets/css/transition.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-transition', THEME_URI . '/assets/js/transition.js', ['blankcanvas-onscreen', 'animejs'], THEME_VER, true);

  /**
   * Theme main JS & CSS
   */
  wp_enqueue_style('blankcanvas', get_stylesheet_uri(), [], THEME_VER);
  wp_enqueue_script('blankcanvas', THEME_URI . '/assets/js/main.js', [], THEME_VER, true);

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

  /**
   * Localize data
   */
  wp_localize_script('blankcanvas-bundle', 'bc',
    [
      'home' => home_url(),
      'l10n' => [
        'search' => __('Search', 'blankcanvas')
      ]
    ]
  );
});

/*
|--------------------------------------------------------------------------
| Admin Scripts
|--------------------------------------------------------------------------
|
| Enqueues scripts and styles for admin panel.
|
*/

add_action('admin_enqueue_scripts', function () {

  /**
   * Admin Main JS & CSS
   */
  wp_enqueue_style('blankcanvas-admin', THEME_URI.'/assets/css/admin.css', [], THEME_VER);
  wp_enqueue_script('blankcanvas-admin', THEME_URI.'/assets/js/admin.js', [], THEME_VER, true);

  // WPBakery Main CSS & JS
  wp_enqueue_style('blankcanvas-vc-admin', THEME_URI.'/inc/vc/assets/css/admin.css', [], THEME_VER);
  wp_enqueue_script('module-blankcanvas-vc-admin', THEME_URI.'/inc/vc/assets/js/admin.js', [], THEME_VER, true);

  // Bootstrap icons
  wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', [], '1.9.1');

  // Grapick (advanced color picker)
  wp_enqueue_style('grapick', 'https://cdn.jsdelivr.net/gh/artf/grapick@0.1.13/dist/grapick.min.css', [], '0.1.13');
  wp_enqueue_script('grapick', 'https://cdn.jsdelivr.net/gh/artf/grapick@0.1.13/dist/grapick.min.js', [], '0.1.13', true);
  wp_enqueue_script('module-grapick', THEME_URI.'/inc/vc/assets/js/modules/grapick.js', ['grapick'], THEME_VER, true);

  // CodeMirror
  wp_enqueue_style('wp-codemirror');
  wp_enqueue_script('wp-codemirror');
  wp_enqueue_script('module-wp-codemirror-editor', THEME_URI.'/inc/vc/assets/js/modules/codeMirrorEditor.js', [], THEME_VER, true);

  // WP code editor
  // wp_enqueue_script('code-editor');
}, 99);