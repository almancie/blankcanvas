<?php

return [
  'name' => esc_html__('Slider', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside carousel', 'blankcanvas'),
  'base' => 'glide',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Glide',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'except' => '',
  ],
  'js_view' => 'VcRowView',
  'default_content' => '
    [vc_column][/vc_column]
    [vc_column][/vc_column]
    [vc_column][/vc_column]',
  'params' => [
    [
      'type' => 'textarea_raw_html',
      'heading' => esc_html__('Configuration', 'blankcanvas'),
      'param_name' => 'configuration',
      'description' => __('For available options, <a target="_blank" href="https://glidejs.com/docs/options/">click here</a>.', 'blankcanvas'),
      'value' => "type: 'slider', \nautoplay: true, \nhoverpause: true,\n",
      'weight' => 100
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Hide Arrows?', 'blankcanvas'),
      'param_name' => 'hide_arrows',
      'description' => __('Hide control arrows.', 'blankcanvas'),
      'value' => [
        esc_html__('Yes', 'js_composer') => 'yes'
      ],
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Hide Bullets?', 'blankcanvas'),
      'param_name' => 'hide_bullets',
      'description' => __('Hide control bullets.', 'blankcanvas'),
      'value' => [
        esc_html__('Yes', 'js_composer') => 'yes'
      ],
    ],
    [
      'type' => 'textfield',
      'param_name' => 'wrapper_class',
      'heading' => esc_html__('Slides wrapper class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 59
    ],
    [
      'type' => 'textfield',
      'param_name' => 'arrows_class',
      'heading' => esc_html__('Arrows wrapper class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 58
    ],
    [
      'type' => 'textfield',
      'param_name' => 'bullets_class',
      'heading' => esc_html__('Bullets wrapper class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 58
    ],
    [
      'type' => 'textfield',
      'param_name' => 'slide_class',
      'heading' => esc_html__('Slides class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 57
    ],
    [
      'type' => 'el_id',
      'heading' => esc_html__('Element ID', 'js_composer'),
      'param_name' => 'el_id',
      'description' => esc_html__('Enter unique element ID.', 'blankcanvas'),
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
  ],
];