<?php

return [
  'name' => esc_html__('HTML', 'blankcanvas'),
  'base' => 'html',
  'description' => esc_html__('A block of HTML content', 'blankcanvas'),
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Html',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-raw-html',
  'class' => 'bc-element',
  'show_settings_on_create' => false,
  'as_child' => [
    'except' => ', section',
  ],
  'params' => [
    [
      'type' => 'textarea_raw_html',
      'holder' => 'div',
      'param_name' => 'content',
      'heading' => esc_html__('HTML content', 'blankcanvas'),
      'weight' => 100
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];