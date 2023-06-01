<?php

return [
  'name' => esc_html__('List', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the row', 'js_composer'),
  'base' => 'advanced_list',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Row',
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
    // [
    //   'type' => 'dropdown',
    //   'heading' => esc_html__('Layout', 'blankcanvas'),
    //   'param_name' => 'layout',
    //   'value' => [
    //     esc_html__('Stacked', 'blankcanvas') => '1/1',
    //     esc_html__('Inline', 'blankcanvas') => 'auto',
    //     esc_html__('Inline stretched', 'blankcanvas') => 'max'
    //   ],
    //   'weight' => 100
    // ],
    [
      'type' => 'el_id',
      'heading' => esc_html__('Element ID', 'js_composer'),
      'param_name' => 'el_id',
      'description' => esc_html__('Enter unique element ID.', 'blankcanvas'),
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      'param_name' => 'item_class',
      'heading' => esc_html__('Items class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 59
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
    // ...require THEME_DIR . '/inc/vc/params/rowResponsive.php'
  ],
];