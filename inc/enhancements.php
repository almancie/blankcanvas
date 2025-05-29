<?php

/*
|--------------------------------------------------------------------------
| Pingback
|--------------------------------------------------------------------------
|
| Adds a pingback url auto-discovery header for single posts, pages, or attachments.
|
| This is not important and can be deleted if desired.
|
*/

add_action('wp_head', function () {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
});

/*
|--------------------------------------------------------------------------
| Media MIME Types
|--------------------------------------------------------------------------
|
| Adds support for custom media uploads MIME types.
|
*/

add_filter('upload_mimes', function ($mimes) {
  return array_merge($mimes, [
    'svg'  => 'image/svg+xml',
    'json' => 'text/plain'
  ]);
});

/*
|--------------------------------------------------------------------------
| Admin Menu Items
|--------------------------------------------------------------------------
|
| Re-arranges admin menu items such as plugins.
|
*/

// add_action('admin_menu', function() {
//   // Remove top-level menus
//   remove_menu_page('revslider');
//   remove_menu_page('vc-general');

//   // Add named separator (visual only, styled with CSS)
//   add_submenu_page(
//     'plugins.php',
//     '',
//     'Separator',
//     'read',
//     'bc-menu-item-separator',
//     ''
//   );

//   // Add Slider Revolution
//   add_submenu_page(
//     'plugins.php',
//     'Slider Revolution',
//     'Slider Revolution',
//     'manage_options',
//     'revslider',
//     'revslider_admin'
//   );

//   // Add WPBakery Page Builder
//   add_submenu_page(
//     'plugins.php',
//     'WPBakery Page Builder',
//     'WPBakery Page Builder',
//     'edit_posts',
//     'vc-general',
//     'vc_page_general'
//   );

//   // Add WPBakery Role Manager (if needed)
//   add_submenu_page(
//     'plugins.php',
//     'Role Manager',
//     'Role Manager',
//     'edit_posts',
//     'vc-roles',
//     'vc_page_roles'
//   );
// }, 999);