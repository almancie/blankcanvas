<?php

return [
  'name' => esc_html__('Row', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the row', 'js_composer'),
  'base' => 'row_inner_inner',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\RowInnerInner',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row',
  'is_container' => true,
  'as_child' => [
    'only' => 'column_inner'
  ],
  'show_settings_on_create' => false,
  'js_view' => 'VcRowView',
  'default_content' => '[vc_column][/vc_column]',
  'params' => [
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Columns position (X)', 'js_composer'),
      'param_name' => 'columns_position_x',
      'value' => [
        esc_html__('Start', 'blankcanvas') => '',
        esc_html__('Center', 'blankcanvas') => 'center',
        esc_html__('End', 'blankcanvas') => 'flex-end',
      ],
      'description' => esc_html__('Select columns position within row.', 'js_composer'),
      'weight' => 100,
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Columns position (Y)', 'js_composer'),
      'param_name' => 'columns_position_y',
      'value' => [
        esc_html__('Equal height', 'blankcanvas') => '',
        esc_html__('Top', 'js_composer') => 'top',
        esc_html__('Middle', 'js_composer') => 'center',
        esc_html__('Bottom', 'js_composer') => 'bottom',
      ],
      'description' => esc_html__('Select columns position within row.', 'js_composer'),
    ],
    [
      'type' => 'textfield',
      'param_name' => 'col_class',
      'heading' => esc_html__('Columns class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'description' => esc_html__('Add the same class names to every column inside this row.', 'blankcanvas'),
      'weight' => 59
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];