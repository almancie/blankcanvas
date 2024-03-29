<?php

return [
  'name' => esc_html__('Group Column', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the column', 'js_composer'),
  'base' => 'group_column',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\GroupColumn',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column bc-element',
  'is_container' => true,
  'content_element' => false, // Hides it from "Add element"
  // 'as_parent' => [
  //   'only' => 'text, image, bootstrap_icon, button, html',
  // ],
  'as_child' => [
    'only' => 'group'
  ],
  'js_view' => 'VcColumnView',
  'params' => [
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];