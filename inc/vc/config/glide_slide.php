<?php

return [
  'name' => esc_html__('Glide Slide', 'blankcanvas'),
  'base' => 'glide_slide',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\GlideSlide',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  // 'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_column',
  // 'allowed_container_element' => 'row_inner, group',
  'is_container' => true,
  'content_element' => false,
  'js_view' => 'VcColumnView',
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
  ]
];