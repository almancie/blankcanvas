<?php

return [
  'name' => esc_html__('Row 2', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the row', 'js_composer'),
  'base' => 'row_inner_inner',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\RowInnerInner',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row bc-row bc-element',
  'is_container' => true,
  'as_child' => [
    'only' => 'vc_column_inner'
  ],
  'show_settings_on_create' => false,
  'js_view' => 'VcRowView', // Allows us to reorder columns
  'default_content' => '[column_inner_inner][/column_inner_inner]', // Changing row layout creates vc_column that is why we default to it and then change it with JS.
  'params' => [
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Columns position (X)', 'js_composer'),
      'param_name' => 'columns_position_x',
      'value' => [
        esc_html__('Start', 'blankcanvas') => '',
        esc_html__('Center', 'blankcanvas') => 'center',
        esc_html__('End', 'blankcanvas') => 'end',
      ],
      'description' => esc_html__('Select columns position within row.', 'js_composer'),
      'weight' => 100,
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Columns position (Y)', 'js_composer'),
      'param_name' => 'columns_position_y',
      'description' => esc_html__('Select columns position within row.', 'js_composer'),
      'value' => [
        esc_html__('Equal height', 'blankcanvas') => '',
        esc_html__('Top', 'js_composer') => 'start',
        esc_html__('Middle', 'js_composer') => 'center',
        esc_html__('Bottom', 'js_composer') => 'end',
      ],
      'weight' => 100,
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