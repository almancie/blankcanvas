<?php

return [
  'name' => esc_html__('Column', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the column', 'js_composer'),
  'base' => 'column_inner',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\ColumnInner',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column_inner',
  'is_container' => true,
  'content_element' => false,
  'as_child' => [
    'only' => 'row_inner',
  ],
  'params' => [
    [
      'type' => 'el_id',
      'heading' => esc_html__('Column ID', 'blankcanvas'),
      'param_name' => 'el_id',
      'description' => sprintf(esc_html__('Enter element ID (Note: make sure it is unique and valid according to %sw3c specification%s).', 'js_composer'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>'),
      'weight' => 100,
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