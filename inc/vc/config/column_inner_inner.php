<?php

return [
  'name' => esc_html__('Column', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the column', 'js_composer'),
  'base' => 'column_inner_inner',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\ColumnInnerInner',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column bc-column bc-element',
  'is_container' => true,
  'content_element' => false, 
  'as_child' => [
    'only' => 'row_inner_inner',
  ],
  'js_view' => 'VcColumnView',
  'params' => [
    ...require THEME_DIR . '/inc/vc/params/general.php',
    ...require THEME_DIR . '/inc/vc/params/responsive.php'
  ],
];