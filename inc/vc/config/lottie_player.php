<?php

return [
  'name' => esc_html__('Lottie', 'blankcanvas'),
  'description' => esc_html__('Add lottie animation', 'blankcanvas'),
  'base' => 'lottie_player',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\LottiePlayer',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-layer-shape-text',
  'class' => 'bc-element',
  'show_settings_on_create' => false,
  'as_child' => [
    'except' => ', section',
  ],
  'params' => [
    [
      'type' => 'textfield',
      // 'holder' => 'div',
      'heading' => esc_html__('JSON URL', 'blankcanvas'),
      'param_name' => 'src',
      'value' => esc_html__('https://assets9.lottiefiles.com/datafiles/MUp3wlMDGtoK5FK/data.json', 'blankcanvas'),
      // 'admin_label' => true,
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Play mode', 'blankcanvas'),
      'param_name' => 'mode',
      'value' => [
        esc_html__('Normal', 'blankcanvas') => '', 
        esc_html__('Bounce', 'blankcanvas') => 'bounce', 
      ],
      // 'admin_label' => true,
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      // 'holder' => 'div',
      'heading' => esc_html__('Direction', 'blankcanvas'),
      'param_name' => 'mode',
      'value' => [
        esc_html__('Forward', 'blankcanvas') => '', 
        esc_html__('Backward', 'blankcanvas') => 'backward', 
      ],
      // 'admin_label' => true,
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      // 'holder' => 'div',
      'heading' => esc_html__('Speed', 'blankcanvas'),
      'param_name' => 'speed',
      'value' => esc_html__(1, 'blankcanvas'),
      // 'admin_label' => true,
      'weight' => 100
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Autoplay?', 'blankcanvas'),
      'param_name' => 'autoplay',
      'value' => [
        esc_html__( 'Yes', 'blankcanvas' ) => 'yes'
      ],
      'weight' => 100
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Loop?', 'blankcanvas'),
      'param_name' => 'loop',
      'value' => [
        esc_html__( 'Yes', 'blankcanvas' ) => 'yes'
      ],
      'weight' => 100
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Play on hover?', 'blankcanvas'),
      'param_name' => 'hover',
      'value' => [
        esc_html__( 'Yes', 'blankcanvas' ) => 'yes'
      ],
      'weight' => 100
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];