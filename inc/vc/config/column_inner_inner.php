<?php

return [
  'name' => esc_html__('Column', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the column', 'js_composer'),
  'base' => 'column_inner_inner',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\ColumnInnerInner',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column_inner',
  'is_container' => true,
  'content_element' => false, 
  'as_child' => [
    'only' => 'row_inner_inner',
  ],
  'params' => [
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
    ...require THEME_DIR . '/inc/vc/params/colResponsive.php'
  ],
  'js_view' => 'VcColumnView',
];