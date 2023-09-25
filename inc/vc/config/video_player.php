<?php

return [
  'name' => esc_html__('Video', 'blankcanvas'),
  'description' => esc_html__('Add video player', 'blankcanvas'),
  'base' => 'video_player',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\VideoPlayer',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-layer-shape-text',
  'class' => 'bc-element',
  'show_settings_on_create' => false,
  'as_child' => [
    'except' => ', section',
  ],
  'params' => [
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Source', 'js_composer'),
      'param_name' => 'source',
      'value' => [
        esc_html__('Youtube', 'blankcanvas') => 'youtube',
        esc_html__('Direct', 'blankcanvas') => 'direct',
      ],
      'weight' => 100,
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Link', 'blankcanvas'),
      'param_name' => 'link',
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Width', 'blankcanvas'),
      'param_name' => 'video_width',
      'value' => esc_html__('100%', 'blankcanvas'),
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('State', 'blankcanvas'),
      'param_name' => 'state',
      'value' => [
        esc_html__('Paused', 'blankcanvas') => '',
        esc_html__('Playing', 'blankcanvas') => 'playing',
        esc_html__('Playing on scroll', 'blankcanvas') => 'scroll',
      ],
      'weight' => 100,
    ],
    // [
    //   'type' => 'checkbox',
    //   'heading' => esc_html__('Loop?', 'blankcanvas'),
    //   'param_name' => 'loop',
    //   'value' => [
    //     esc_html__( 'Yes', 'blankcanvas' ) => 'yes'
    //   ],
    //   'weight' => 100
    // ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Hide controls?', 'blankcanvas'),
      'param_name' => 'hide_controls',
      'value' => [
        esc_html__( 'Yes', 'blankcanvas' ) => 'yes'
      ],
      'dependency' => [
        'element' => 'state',
        'not_empty' => true,
      ],
      'weight' => 100
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];