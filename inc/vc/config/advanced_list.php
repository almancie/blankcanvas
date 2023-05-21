<?php

return [
  'name' => esc_html__('Advanced List', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside unordered list', 'js_composer'),
  'base' => 'advanced_list',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\AdvancedList',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row',
  'is_container' => true,
  'as_child' => [
    'only' => 'column'
  ],
  'show_settings_on_create' => false,
  'js_view' => 'VcRowView',
  'default_content' => '[vc_column][/vc_column]',
  'params' => [
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Layout', 'blankcanvas'),
      'param_name' => 'layout',
      'value' => [
        esc_html__('Stacked', 'blankcanvas') => '1/1',
        esc_html__('Inline', 'blankcanvas') => 'auto',
        esc_html__('Inline stretched', 'blankcanvas') => 'max'
      ],
      'weight' => 100
    ],
    [
      'type' => 'el_id',
      'heading' => esc_html__('Element ID', 'js_composer'),
      'param_name' => 'el_id',
      'description' => sprintf( esc_html__('Enter element ID (Note: make sure it is unique and valid according to %sw3c specification%s).', 'js_composer'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>'),
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Hide?', 'blankcanvas'),
      'param_name' => 'disable_element',
      'description' => esc_html__('If checked the section won\'t be visible on the public side of your website. You can switch it back any time.', 'js_composer'),
      'value' => [
        esc_html__('Yes', 'js_composer') => 'yes'
      ],
    ],
  ]
];