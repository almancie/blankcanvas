<?php

return [
  'name' => esc_html__('Column', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the column', 'js_composer'),
  'base' => 'vc_column_inner',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\VcColumnInner',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column bc-container bc-column bc-column-inner bc-element',
  'is_container' => true,
  'content_element' => false,
  'as_child' => [
    'only' => 'vc_row_inner',
  ],
  'js_view' => 'VcColumnView',
  'params' => [
    ...require THEME_DIR . '/inc/vc/params/general.php',
    ...require THEME_DIR . '/inc/vc/params/responsive.php'
  ],
];