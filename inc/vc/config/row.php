<?php

return [
  'name' => esc_html__('Row', 'blankcanvas'),
  'description' => esc_html__('Place content elements inside the row', 'js_composer'),
  'base' => 'row',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Row',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row',
  'is_container' => true,
  'as_child' => [
    'only' => 'section'
  ],
  'show_settings_on_create' => false,
  'js_view' => 'VcRowView',
  'default_content' => '[vc_column][/vc_column]',
  'params' => [
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Columns position (X)', 'js_composer'),
      'param_name' => 'columns_position_x',
      'value' => [
        esc_html__('Start', 'blankcanvas') => '',
        esc_html__('Center', 'blankcanvas') => 'center',
        esc_html__('End', 'blankcanvas') => 'flex-end',
      ],
      'description' => esc_html__('Select columns position within row.', 'js_composer'),
      'weight' => 100,
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Columns position (Y)', 'js_composer'),
      'param_name' => 'columns_position_y',
      'value' => [
        esc_html__('Equal height', 'blankcanvas') => '',
        esc_html__('Top', 'js_composer') => 'top',
        esc_html__('Middle', 'js_composer') => 'center',
        esc_html__('Bottom', 'js_composer') => 'bottom',
      ],
      'description' => esc_html__('Select columns position within row.', 'js_composer'),
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Use video background?', 'js_composer'),
      'param_name' => 'video_bg',
      'description' => esc_html__('If checked, video will be used as row background.', 'js_composer'),
      'value' => [
        esc_html__('Yes', 'js_composer') => 'yes'
      ],
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
      'type' => 'textfield',
      'param_name' => 'col_class',
      'heading' => esc_html__('Columns class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 59
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