<?php

return [
  'name' => esc_html__('Column', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the column', 'js_composer'),
  'base' => 'column',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Column',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_column',
  'is_container' => true,
  'content_element' => false, // Hides it from "Add element"
  'as_child' => [
    'only' => 'row',
  ],
  'js_view' => 'VcColumnView',
  'params' => [
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Use video background?', 'js_composer'),
      'param_name' => 'video_bg',
      'description' => esc_html__('If checked, video will be used as row background.', 'js_composer'),
      'value' => [ 
        esc_html__('Yes', 'js_composer') => 'yes' 
      ],
      'weight' => 100,
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('YouTube link', 'js_composer'),
      'param_name' => 'video_bg_url',
      'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
      // default video url
      'description' => esc_html__('Add YouTube link.', 'js_composer'),
      'dependency' => [
        'element' => 'video_bg',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Parallax', 'js_composer'),
      'param_name' => 'video_bg_parallax',
      'value' => [
        esc_html__('None', 'js_composer') => '',
        esc_html__('Simple', 'js_composer') => 'content-moving',
        esc_html__('With fade', 'js_composer') => 'content-moving-fade',
      ],
      'description' => esc_html__('Add parallax type background for row.', 'js_composer'),
      'dependency' => [
        'element' => 'video_bg',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Parallax', 'js_composer'),
      'param_name' => 'parallax',
      'value' => [
        esc_html__('None', 'js_composer') => '',
        esc_html__('Simple', 'js_composer') => 'content-moving',
        esc_html__('With fade', 'js_composer') => 'content-moving-fade',
      ],
      'description' => esc_html__('Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'js_composer'),
      'dependency' => [
        'element' => 'video_bg',
        'is_empty' => true,
      ],
    ],
    [
      'type' => 'attach_image',
      'heading' => esc_html__('Image', 'js_composer'),
      'param_name' => 'parallax_image',
      'value' => '',
      'description' => esc_html__('Select image from media library.', 'js_composer'),
      'dependency' => [
        'element' => 'parallax',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Parallax speed', 'js_composer'),
      'param_name' => 'parallax_speed_video',
      'value' => '1.5',
      'description' => esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'js_composer'),
      'dependency' => [
        'element' => 'video_bg_parallax',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Parallax speed', 'js_composer'),
      'param_name' => 'parallax_speed_bg',
      'value' => '1.5',
      'description' => esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'js_composer'),
      'dependency' => [
        'element' => 'parallax',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'el_id',
      'heading' => esc_html__('Column ID', 'blankcanvas'),
      'param_name' => 'el_id',
      'description' => sprintf(esc_html__('Enter element ID (Note: make sure it is unique and valid according to %sw3c specification%s).', 'js_composer'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>'),
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
    ...require THEME_DIR . '/inc/vc/params/colResponsive.php'
  ],
];