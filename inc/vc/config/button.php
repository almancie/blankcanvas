<?php

return [
  'name' => esc_html__('Button', 'blankcanvas'),
  'base' => 'button',
  'description' => esc_html__('A simple button with link.', 'blankcanvas'),
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Button',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-ui-button',
  'show_settings_on_create' => false,
  'as_child' => [
    'except' => ', section',
  ],
  'params' => [
    [
      'type' => 'textfield',
      // 'holder' => 'div',
      'heading' => esc_html__('Text', 'js_composer'),
      'param_name' => 'text',
      'value' => esc_html__('Button', 'blankcanvas'),
      'admin_label' => true,
      'weight' => 100
    ],
    [
      'type' => 'vc_link',
      'heading' => esc_html__('Link', 'js_composer'),
      'param_name' => 'link',
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Size', 'blankcanvas'),
      'param_name' => 'size',
      'value' => [
        esc_html__('Default', 'blankcanvas') => '',
        esc_html__('Small', 'blankcanvas') => 'sm',
        esc_html__('Large', 'blankcanvas') => 'lg',
      ],
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Style', 'blankcanvas'),
      'param_name' => 'style',
      'value' => [
        esc_html__('Solid', 'blankcanvas') => '',
        esc_html__('Outline', 'blankcanvas') => 'outline',
      ],
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Color', 'blankcanvas'),
      'param_name' => 'color',
      'value' => [
        esc_html__('None', 'blankcanvas') => '', 
        esc_html__('Text color', 'blankcanvas') => 'body-color', 
        esc_html__('Body color', 'blankcanvas') => 'body-bg', 
        esc_html__('Dark', 'blankcanvas') => 'dark', 
        esc_html__('Light', 'blankcanvas') => 'light', 
        esc_html__('Color 1', 'blankcanvas') => 'color-1', 
      ],
      'weight' => 100
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Icon?', 'blankcanvas'),
      'param_name' => 'icon',
      'value' => [
        esc_html__( 'Yes', 'js_composer' ) => 'yes'
      ],
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Icon name', 'blankcanvas'),
      'param_name' => 'icon_name',
      'description' => '<a target="_blank" href="https://icons.getbootstrap.com">Click here</a> to browse available icons.',
      'dependency' => [
        'element' => 'icon',
        'not_empty' => true,
      ],
      'admin_label' => true,
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Icon size', 'blankcanvas'),
      'param_name' => 'icon_size',
      'value' => [
        esc_html__('Default', 'blankcanvas') => '',
        esc_html__('Small', 'blankcanvas') => 'sm',
        esc_html__('Medium', 'blankcanvas') => 'md',
        esc_html__('Large', 'blankcanvas') => 'lg',
        esc_html__('X large', 'blankcanvas') => 'xl',
        esc_html__('2x large', 'blankcanvas') => 'xxl',
      ],
      'dependency' => [
        'element' => 'icon',
        'not_empty' => true,
      ],
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Icon position', 'blankcanvas'),
      'param_name' => 'icon_position',
      'value' => [
        esc_html__('Start', 'js_composer') => '',
        esc_html__('End', 'js_composer') => 'end',
        esc_html__('Top', 'js_composer') => 'top',
        esc_html__('Bottom', 'js_composer') => 'bottom'
      ],
      'dependency' => [
        'element' => 'icon',
        'not_empty' => true,
      ],
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Gap', 'blankcanvas'),
      'param_name' => 'gap',
      'value' => [
        esc_html__('Defaut', 'js_composer') => '',
        esc_html__('1 ', 'js_composer') => '1',
        esc_html__('2 ', 'js_composer') => '2',
        esc_html__('3 ', 'js_composer') => '3',
        esc_html__('4 ', 'js_composer') => '4',
        esc_html__('5 ', 'js_composer') => '5'
      ],
      'dependency' => [
        'element' => 'icon',
        'not_empty' => true,
      ],
      'weight' => 100
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];