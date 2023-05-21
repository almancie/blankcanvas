<?php

/*
|--------------------------------------------------------------------------
| Theme Constants
|--------------------------------------------------------------------------
|
| Sets theme constants.
|
*/

define('THEME_VER', '1.0.0');

define('THEME_DIR', get_template_directory());

define('THEME_URI', get_template_directory_uri());

/*
|--------------------------------------------------------------------------
| Theme Setup
|--------------------------------------------------------------------------
|
| Sets up theme defaults and registers support for various 
| WordPress features.
|
*/

add_action('after_setup_theme', function () {

  // Makes the theme available for translation.
  load_theme_textdomain('blankcanvas', THEME_DIR . '/languages');

  // Adds default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  // Lets WordPress manage the document title.
  add_theme_support('title-tag');

  // Enables featured image on posts.
  add_theme_support('post-thumbnails');

  // Registers Nav Menus
  register_nav_menus([
    'menu-1' => esc_html__('Header', 'blankcanvas')
  ]);

  // Switches default core markup to HTML5.
  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script'
  ]);

  // Adds support for custom logo.
  add_theme_support('custom-logo');
});

/*
|--------------------------------------------------------------------------
| Widget Area
|--------------------------------------------------------------------------
|
| Registers sidebar.
|
*/

add_action('widgets_init', function () {
  register_sidebar([
    'name'          => esc_html__('Sidebar', 'blankcanvas'),
    'id'            => 'sidebar-1',
    'description'   => esc_html__('Add widgets here.', 'blankcanvas'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ]);
});

/*
|--------------------------------------------------------------------------
| Scripts
|--------------------------------------------------------------------------
|
| Includes theme frontend and backend scripts and styles.
|
*/

require THEME_DIR . '/inc/scripts.php';

/*
|--------------------------------------------------------------------------
| Template Tags
|--------------------------------------------------------------------------
|
| Functions that generate HTML tags.
|
*/

require THEME_DIR . '/inc/tags.php';

/*
|--------------------------------------------------------------------------
| Enhancements
|--------------------------------------------------------------------------
|
| Functions which enhance the theme by hooking into WordPress.
|
*/

require THEME_DIR . '/inc/enhancements.php';

/*
|--------------------------------------------------------------------------
| Nav Menu
|--------------------------------------------------------------------------
|
| Updates nav menu output.
|
*/

require THEME_DIR . '/inc/nav-menu/functions.php';

/*
|--------------------------------------------------------------------------
| Custom Post Types
|--------------------------------------------------------------------------
|
| Registers custom post types.
|
*/

require THEME_DIR . '/inc/post-types/functions.php';

/*
|--------------------------------------------------------------------------
| Customizer Additions
|--------------------------------------------------------------------------
|
| Extends WordPress customizer options.
|
*/

require THEME_DIR . '/inc/customizer.php';

/*
|--------------------------------------------------------------------------
| Shortcodes
|--------------------------------------------------------------------------
|
| Registers theme shortcodes.
|
*/

require THEME_DIR . '/inc/shortcodes/functions.php';

/*
|--------------------------------------------------------------------------
| WPBakery additions
|--------------------------------------------------------------------------
|
| Extends WPBakery elements and fields.
|
*/

require THEME_DIR . '/inc/vc/functions.php';