<?php

return [
  [
    'type' => 'dropdown',
    'heading' => esc_html__('Background', 'blankcanvas'),
    'param_name' => 'background',
    'value' => [
      esc_html__('None', 'blankcanvas') => '', 
      esc_html__('Image', 'blankcanvas') => 'image', 
      esc_html__('Solid', 'blankcanvas') => 'solid', 
      esc_html__('Gradient', 'blankcanvas') => 'gradient', 
    ],
    'group' => esc_html__('Design', 'blankcanvas'),
    'weight' => 80
  ],
  [
    'type' => 'attach_image',
    'heading' => esc_html__('Background image', 'blankcanvas'),
    'param_name' => 'background_image',
    'description' => esc_html__('Select image from media library.', 'js_composer'),
    'group' => esc_html__('Design', 'blankcanvas'),
    'dependency' => [
      'element' => 'background',
      'value' => 'image'
    ],
  ],
  [
    'type' => 'colorpicker',
    'heading' => esc_html__('Background color', 'blankcanvas'),
    'param_name' => 'background_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    'dependency' => [
      'element' => 'background',
      'value' => 'solid'
    ]
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Background color', 'blankcanvas'),
    'param_name' => 'gradient_background_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    'value' => 'linear-gradient(to right, #1d2327 0%, #1d2327 100%)',
    'dependency' => [
      'element' => 'background',
      'value' => 'gradient'
    ]
  ],
  [
    'type' => 'checkbox',
    'heading' => esc_html__('Add overlay?', 'blankcanvas'),
    'param_name' => 'overlay',
    'group' => esc_html__('Design', 'blankcanvas'),
    'dependency' => [
      'element' => 'background',
      'value' => 'image'
    ],
  ],
  [
    'type' => 'colorpicker',
    'heading' => esc_html__('Overlay color', 'blankcanvas'),
    'param_name' => 'overlay_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    'dependency' => [
      'element' => 'overlay',
      'not_empty' => true
    ]
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Overlay opacity', 'blankcanvas'),
    'param_name' => 'overlay_opacity',
    'description' => esc_html__('Use a value between 0 and 1.', 'blankcanvas'),
    'group' => esc_html__('Design', 'blankcanvas'),
    'dependency' => [
      'element' => 'overlay',
      'not_empty' => true
    ]
  ],
  [
    'type' => 'colorpicker',
    'heading' => esc_html__('Text color', 'blankcanvas'),
    'param_name' => 'text_color',
    'group' => esc_html__('Design', 'blankcanvas'),
  ],
];