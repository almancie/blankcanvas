<?php

return [
  'name' => esc_html__('Text Block', 'blankcanvas'),
  'description' => esc_html__('Add text with WYSIWYG editor', 'blankcanvas'),
  'base' => 'text',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Text',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-bc-text',
  'class' => 'bc-element',
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
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];