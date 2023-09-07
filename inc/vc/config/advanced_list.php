<?php

return [
  'name' => esc_html__('List', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside unordered list', 'js_composer'),
  'base' => 'advanced_list',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\AdvancedList',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'only' => 'column',
  ],
  'js_view' => 'VcRowView',
  'default_content' => '
    [vc_column width="1/3"][/vc_column]
    [vc_column width="1/3"][/vc_column]
    [vc_column width="1/3"][/vc_column]',
  'params' => [
    [
      'type' => 'textfield',
      'param_name' => 'item_class',
      'heading' => esc_html__('Items class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 59
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];