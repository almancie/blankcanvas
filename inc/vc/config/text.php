<?php

return [
  'name' => esc_html__('Text Block', 'blankcanvas'),
  'description' => esc_html__('A block of text with WYSIWYG editor', 'js_composer'),
  'base' => 'text',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Text',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-layer-shape-text',
  'show_settings_on_create' => false,
  'as_child' => [
    'except' => ', section',
  ],
  'params' => [
    [
      'type' => 'textarea_html',
      'holder' => 'div',
      'heading' => esc_html__('Text', 'js_composer'),
      'param_name' => 'content',
      'value' => esc_html__('Text block.', 'blankcanvas'),
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