<?php

/*
|--------------------------------------------------------------------------
| Menu Item Icon
|--------------------------------------------------------------------------
|
| Updates the output of nav menu items to add icons.
|
*/

add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {
  if (! function_exists('get_field')) return $output;

  $icon = get_field('menu_item_icon', $item->ID);

  if ($icon) {
    $output = sprintf('<i class="bi bi-%s"></i>', $icon) . $output;
  }

  return $output;
}, 10, 4);

/*
|--------------------------------------------------------------------------
| Menu Item CSS Classes
|--------------------------------------------------------------------------
|
| Adds css class to menu item to hide text.
|
*/

// add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
//   if (! function_exists('get_field')) return $classes;

//   $iconOnly = get_field('menu_icon_only', $item->ID);

//   if ($iconOnly) {
//     $classes[] = 'icon-only';
//   }

//   $hasIcon = get_field('menu_icon', $item->ID);

//   if ($hasIcon) {
//     $classes[] = 'menu-item-has-icon';
//   }

//   return $classes;
// }, 10, 4);

/*
|--------------------------------------------------------------------------
| External Link
|--------------------------------------------------------------------------
|
| Updates the output of nav menu items to add icon for external links.
|
*/

add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {

  // If not a parent item, bail out.
  if (! in_array('menu-item-type-custom', $item->classes)) {
    return $output;
  }

  ob_start(); ?>

  <i class="external-link-arrow bi bi-arrow-right-short"></i>
  <!-- <img src="<?= get_template_directory_uri().'/inc/nav-menu/imgs/arrow-circle-down.svg' ?>" class="external-link-arrow" /> -->

  <?php
  return $output .= ob_get_clean();
}, 10, 4);

/*
|--------------------------------------------------------------------------
| Sub Menu Toggler
|--------------------------------------------------------------------------
|
| Updates the output of nav menu items to add toggle buttons for mobile.
|
*/

add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {

  // If not a parent item, bail out.
  if (! in_array('menu-item-has-children', $item->classes)) {
    return $output;
  }

  ob_start(); ?>

  <button 
    type="button" 
    class="sub-menu-btn btn btn-link p-0 rounded-circle d-flex flex-center border-0" 
    data-bs-toggle="collapse" data-bs-target="#sub-menu-<?= $item->ID ?>" 
    aria-expanded="false" aria-controls="sub-menu-<?= $item->ID ?>"
  >
    <img src="<?= get_template_directory_uri().'/inc/nav-menu/imgs/arrow-down-circle.svg' ?>" />
  </button>

  <?php
  return $output .= ob_get_clean();
}, 10, 4);

/*
|--------------------------------------------------------------------------
| Menu Item Wrapper
|--------------------------------------------------------------------------
|
| Updates the output of nav menu items to add toggle buttons for mobile.
|
*/

add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {
  ob_start(); ?>

  <div class="menu-item-title"><?= $output ?></div>

  <?php
  return ob_get_clean();
}, 10, 4);

/*
|--------------------------------------------------------------------------
| Menu Item Desciption
|--------------------------------------------------------------------------
|
| Updates the output of nav menu items to add toggle buttons for mobile.
|
*/

add_filter('walker_nav_menu_start_el', function ($output, $item, $depth, $args) {
  if (! function_exists('get_field')) return $output;

  $desc = get_field('menu_item_desc', $item->ID);

  if (! $desc) {
    return $output;
  }

  ob_start(); ?>

  <p class="menu-item-desc"><?= $desc ?></p>

  <?php
  return $output .= ob_get_clean();
}, 10, 4);

/*
|--------------------------------------------------------------------------
| Scripts
|--------------------------------------------------------------------------
|
| Registers and enqueues menu scripts and styles.
|
*/

add_action('wp_enqueue_scripts', function () {

  /**
   * links toggle buttons to sub menus.
   */
  wp_enqueue_script('blankcanvas-nav-menu', get_template_directory_uri() . '/inc/nav-menu/scripts/nav-menu.js', [], THEME_VER, true);

  /**
   * Adds basic styling to menu.
   */
  wp_enqueue_style('blankcanvas-nav-menu', get_template_directory_uri() . '/inc/nav-menu/styles/basic.css', [], THEME_VER);
});