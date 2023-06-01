<?php

$sizes = [
  esc_html__('Small', 'blankcanvas') => 'sm',
  esc_html__('Medium', 'blankcanvas') => 'md',
  esc_html__('Large', 'blankcanvas') => 'lg',
  esc_html__('X large', 'blankcanvas') => 'xl',
  esc_html__('2x large', 'blankcanvas') => 'xxl',
];

return [
  'name' => esc_html__('Icon', 'blankcanvas'),
  'base' => 'bootstrap_icon',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\BootstrapIcon',
  'icon' => 'icon-wpb-vc_icon',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'description' => esc_html__('Bootstrap icon', 'blankcanvas'),
  'as_child' => [
    'except' => ', section',
  ],
  'params' => [
    [
      'type' => 'textfield',
      'heading' => esc_html__('Name', 'blankcanvas'),
      'param_name' => 'icon_name',
      'description' => '<a target="_blank" href="https://icons.getbootstrap.com">Click here</a> to browse available icons.',
      'weight' => 100,
      'dependency' => [
        'element' => 'source',
        'value' => 'bootstrap_icon',
      ],
      'admin_label' => true,
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Size', 'blankcanvas'),
      'param_name' => 'icon_size',
      'description' => esc_html__('Select icon size.', 'blankcanvas'),
      'value' => $sizes,
      'dependency' => [
        'element' => 'source',
        'value' => [
          'media_library',
          'bootstrap_icon',
        ],
      ],
    ],
    [
      'type' => 'el_id',
      'heading' => esc_html__('Element ID', 'js_composer'),
      'param_name' => 'el_id',
      'description' => esc_html__('Enter unique element ID.', 'blankcanvas'),
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Hide?', 'blankcanvas' ),
      'param_name' => 'disable_element',
      'description' => esc_html__('If checked the section won\'t be visible on the public side of your website. You can switch it back any time.', 'js_composer' ),
      'value' => [
        esc_html__('Yes', 'js_composer') => 'yes'
      ],
    ],
  ],
];
