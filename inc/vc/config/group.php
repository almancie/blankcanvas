<?php

return [
  'name' => esc_html__('Group', 'blankcanvas'),
  'description' => esc_html__('Group content elements together', 'blankcanvas'),
  'base' => 'group',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Group',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'except' => ''
  ],
  'js_view' => 'VcRowView',
  'default_content' => '[group_column][/group_column]',
  'params' => [
    [
      'type' => 'textfield',
      'param_name' => 'child_class',
      'heading' => esc_html__('Elements class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 59
    ],
    [
      'type' => 'el_id',
      'heading' => esc_html__('Element ID', 'js_composer'),
      'param_name' => 'el_id',
      'description' => esc_html__('Enter unique element ID.', 'blankcanvas'),
      'weight' => 100
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
  ],
];