<?php

$colors = [
  esc_html__('Primary', 'blankcanvas') => 'var(--primary)',
  esc_html__('Secondary', 'blankcanvas') => 'var(--secondary)',
  esc_html__('Light', 'blankcanvas') => 'var(--light)',
  esc_html__('Dark', 'blankcanvas') => 'var(--dark)',
  esc_html__('Custom', 'blankcanvas') => 'custom',
];

$bg = [esc_html__('None', 'blankcanvas') => ''] + $colors;

$text = [esc_html__('Default', 'blankcanvas') => ''] + $colors;

$overlay = [esc_html__('None', 'blankcanvas') => '', esc_html__('Default', 'blankcanvas') => 'var(--body-bg)'] + $colors;

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
    'group' => esc_html__('Design', 'blankcanvas'),
    'dependency' => [
      'element' => 'background',
      'value' => 'image'
    ],
  ],
  [
    'type' => 'dropdown',
    'heading' => esc_html__('Background color', 'blankcanvas'),
    'param_name' => 'background_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    'edit_field_class' => 'vc_col-xs-4',
    'dependency' => [
      'element' => 'background',
      'value' => 'solid'
    ],
    'value' => $bg
  ],
  [
    'type' => 'colorpicker',
    'heading' => esc_html__('Custom color', 'blankcanvas'),
    'param_name' => 'custom_background_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    'edit_field_class' => 'vc_col-xs-4',
    'dependency' => [
      'element' => 'background_color',
      'value' => 'custom'
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
    'type' => 'dropdown',
    'heading' => esc_html__('Overlay color', 'blankcanvas'),
    'param_name' => 'overlay_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    'edit_field_class' => 'vc_col-xs-4',
    'dependency' => [
      'element' => 'background',
      'value' => 'image'
    ],
    'value' => $overlay
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Overlay opacity', 'blankcanvas'),
    'param_name' => 'overlay_opacity',
    // 'description' => esc_html__('Use a value between 0 and 1.', 'blankcanvas'),
    'group' => esc_html__('Design', 'blankcanvas'),
    'edit_field_class' => 'vc_col-xs-4',
    'dependency' => [
      'element' => 'overlay_color',
      'not_empty' => true
    ],
    'value' => '75%'
  ],
  [
    'type' => 'colorpicker',
    'heading' => esc_html__('Custom color', 'blankcanvas'),
    'param_name' => 'custom_overlay_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    // 'edit_field_class' => 'vc_col-xs-3',
    'dependency' => [
      'element' => 'overlay_color',
      'value' => 'custom'
    ]
  ],
  [
    'type' => 'dropdown',
    'heading' => esc_html__('Text color', 'blankcanvas'),
    'param_name' => 'text_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    'value' => $text
  ],
  [
    'type' => 'colorpicker',
    'heading' => esc_html__('Custom color', 'blankcanvas'),
    'param_name' => 'custom_text_color',
    'group' => esc_html__('Design', 'blankcanvas'),
    'dependency' => [
      'element' => 'text_color',
      'value' => 'custom'
    ]
  ],
  // [
  //   'type' => 'checkbox',
  //   // 'heading' => esc_html__('Border?', 'blankcanvas'),
  //   'param_name' => 'border',
  //   'group' => esc_html__('Design', 'blankcanvas'),
  //   // 'description' => esc_html__('Add border', 'blankcanvas'),
  //   'value' => [
  //     esc_html__(' Border', 'blankcanvas') => 'yes' 
  //   ],
  // ],
  // [
  //   'type' => 'dropdown',
  //   'heading' => esc_html__('Border color', 'blankcanvas'),
  //   'param_name' => 'border_color',
  //   'group' => esc_html__('Design', 'blankcanvas'),
  //   'edit_field_class' => 'vc_col-xs-4',
  //   'dependency' => [
  //     'element' => 'border',
  //     'not_empty' => true
  //   ],
  //   'value' => $text
  // ],
  // [
  //   'type' => 'textfield',
  //   'heading' => esc_html__('Border size', 'blankcanvas'),
  //   'param_name' => 'border_size',
  //   'group' => esc_html__('Design', 'blankcanvas'),
  //   'edit_field_class' => 'vc_col-xs-4',
  //   'dependency' => [
  //     'element' => 'border',
  //     'not_empty' => true
  //   ],
  //   'value' => '1px'
  // ],
  // [
  //   'type' => 'colorpicker',
  //   'heading' => esc_html__('Custom color', 'blankcanvas'),
  //   'param_name' => 'custom_border_color',
  //   'group' => esc_html__('Design', 'blankcanvas'),
  //   // 'edit_field_class' => 'vc_col-xs-4',
  //   'dependency' => [
  //     'element' => 'border_color',
  //     'value' => 'custom'
  //   ]
  // ],
];