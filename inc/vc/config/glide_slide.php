<?php

return [
  'name' => esc_html__('Slide', 'blankcanvas'),
  'base' => 'glide_slide',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\GlideSlide',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column',
  // 'allowed_container_element' => 'row_inner, group',
  'is_container' => true,
  'content_element' => false,
  'js_view' => 'VcColumnView',
  'params' => [
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ]
];