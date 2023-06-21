<?php

return [
  'name' => esc_html__('List Item', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the column', 'js_composer'),
  'base' => 'advanced_list_item',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Column',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column',
  'is_container' => true,
  'as_parent' => [
    'only' => 'bootstrap_icon, button, group, html, row_inner, text'
  ],
  // 'allowed_container_element' => 'row_inner',
  'content_element' => false, // Hides it from "Add element"
  'js_view' => 'VcColumnView',
  'params' => [
    ...require THEME_DIR . '/inc/vc/params/general.php',
    ...require THEME_DIR . '/inc/vc/params/responsive.php'
  ],
];