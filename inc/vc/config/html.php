<?php

return [
  'name' => esc_html__('HTML', 'blankcanvas'),
  'base' => 'html',
  'description' => esc_html__('A block of HTML content', 'blankcanvas'),
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Html',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-raw-html',
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
    [
      'type' => 'el_id',
      'param_name' => 'el_id',
      'heading' => esc_html__('Element ID', 'js_composer'),
      'description' => sprintf(esc_html__('Enter section ID (Note: make sure it is unique and valid according to %sw3c specification%s).', 'js_composer'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>'),
    ],
  ],
];