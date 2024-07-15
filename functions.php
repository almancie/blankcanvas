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
| Nav Menu Items
|--------------------------------------------------------------------------
|
| Filters nav menu items to replace Home with an icon
|
*/

// add_filter('wp_nav_menu_items', function ($items, $args) {
//   if ($args->theme_location !== 'menu-1') return;

//   return str_replace(
//     '>Home</a>', 
//     sprintf('><svg data-svg="%s" class="svg-body"></svg></a>', get_template_directory_uri() . '/assets/imgs/home-angle-2-svgrepo-com.svg'),
//     $items
//   );

//   // return str_replace(
//   //   '>Home</a>', 
//   //   '><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33537 7.87495C1.79491 9.00229 1.98463 10.3208 2.36407 12.9579L2.64284 14.8952C3.13025 18.2827 3.37396 19.9764 4.54903 20.9882C5.72409 22 7.44737 22 10.8939 22H13.1061C16.5526 22 18.2759 22 19.451 20.9882C20.626 19.9764 20.8697 18.2827 21.3572 14.8952L21.6359 12.9579C22.0154 10.3208 22.2051 9.00229 21.6646 7.87495C21.1242 6.7476 19.9738 6.06234 17.6731 4.69181L16.2882 3.86687C14.199 2.62229 13.1543 2 12 2C10.8457 2 9.80104 2.62229 7.71175 3.86687L6.32691 4.69181C4.02619 6.06234 2.87583 6.7476 2.33537 7.87495ZM12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V15C11.25 14.5858 11.5858 14.25 12 14.25C12.4142 14.25 12.75 14.5858 12.75 15V18C12.75 18.4142 12.4142 18.75 12 18.75Z" fill="var(--body-color)"></path> </g></svg></a>',
//   //   $items
//   // );

//   // $items = str_replace(
//   //   '>About</a>', 
//   //   '><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="6" r="4" stroke="var(--body-color)" stroke-width="1.2"></circle> <path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="var(--body-color)" stroke-width="1.2"></path> </g></svg></a>',
//   //   $items
//   // );

//   return $items;
// }, 10, 2);

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

/*
|--------------------------------------------------------------------------
| Advanced Custom Fields (ACF) additions
|--------------------------------------------------------------------------
|
| Adds custom fields groups
|
*/

require THEME_DIR . '/inc/acf/functions.php';

/*
|--------------------------------------------------------------------------
| Contact Form 7 additions
|--------------------------------------------------------------------------
|
| Alters Contact Form 7 behaviour
|
*/

require THEME_DIR . '/inc/wpcf7/functions.php';

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
| Scripts
|--------------------------------------------------------------------------
|
| Includes theme frontend and backend scripts and styles.
|
*/

require THEME_DIR . '/inc/scripts.php';