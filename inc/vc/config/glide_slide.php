<?php

return [
  'name' => esc_html__('Slide', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside slide', 'blankcanvas'),
  'base' => 'glide_slide',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\GlideSlide',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column bc-container bc-column bc-element',
  'is_container' => true,
  'content_element' => false,
  'as_child' => [
    'only' => 'glide',
  ],
  'js_view' => 'VcColumnView',
  'params' => [
    ...require THEME_DIR . '/inc/vc/params/general.php',
  ],
];