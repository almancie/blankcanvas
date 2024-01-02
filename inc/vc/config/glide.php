<?php

return [
  'name' => esc_html__('Glide Slider', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside slider', 'blankcanvas'),
  'base' => 'glide',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Glide',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row bc-row bc-element',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'only' => 'section,vc_column',
  ],
  'js_view' => 'VcRowView',
  'default_content' => '
    [glide_slide width="1/3"][/glide_slide]
    [glide_slide width="1/3"][/glide_slide]
    [glide_slide width="1/3"][/glide_slide]',
  // 'default_content' => '
  //   [vc_column width="1/3"][/vc_column]
  //   [vc_column width="1/3"][/vc_column]
  //   [vc_column width="1/3"][/vc_column]',
  'params' => [
    [
      'type' => 'textarea_raw_html',
      'heading' => esc_html__('Options', 'blankcanvas'),
      'param_name' => 'config',
      'description' => __('For available options, <a target="_blank" href="https://glidejs.com/docs/options/">click here</a>.', 'blankcanvas'),
      'value' => urlencode(base64_encode("type: 'carousel',\nautoplay: 3000,")),
      'weight' => 100
    ],
    [
      'type' => 'textarea_raw_html',
      'heading' => esc_html__('Events', 'blankcanvas'),
      'group' => esc_html__('Events', 'blankcanvas'),
      'param_name' => 'events',
      'description' => __('For available events, <a target="_blank" href="https://glidejs.com/docs/events/">click here</a>.', 'blankcanvas'),
      'value' => urlencode(base64_encode("// slider.on('mount.before', () => {});")),
      'weight' => 100
    ],
    [
      'type' => 'checkbox',
      // 'heading' => esc_html__('Hide Arrows?', 'blankcanvas'),
      'param_name' => 'hide_arrows',
      'description' => __('Hide control arrows.', 'blankcanvas'),
      'value' => [
        esc_html__(' Hide arrows', 'blankcanvas') => 'yes'
      ],
      'weight' => 99
    ],
    [
      'type' => 'checkbox',
      // 'heading' => esc_html__('Hide Bullets?', 'blankcanvas'),
      'param_name' => 'hide_bullets',
      'description' => __('Hide control bullets.', 'blankcanvas'),
      'value' => [
        esc_html__(' Hide bullets', 'blankcanvas') => 'yes'
      ],
      'weight' => 99
    ],
    [
      'type' => 'textfield',
      'param_name' => 'track_class',
      'heading' => esc_html__('Track class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 59
    ],
    [
      'type' => 'textfield',
      'param_name' => 'wrapper_class',
      'heading' => esc_html__('Slides wrapper class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 58
    ],
    [
      'type' => 'textfield',
      'param_name' => 'arrows_class',
      'heading' => esc_html__('Arrows wrapper class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 57
    ],
    [
      'type' => 'textfield',
      'param_name' => 'bullets_class',
      'heading' => esc_html__('Bullets wrapper class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 56
    ],
    [
      'type' => 'textfield',
      'param_name' => 'slide_class',
      'heading' => esc_html__('Slide class name', 'blankcanvas'),
      'description' => esc_html__('Add the same class names to every slide inside this slider.', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 55
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];