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
  'js_view' => 'VcRowView', // Allows us to reorder columns
  'default_content' => '[vc_column][/vc_column]', // Changing row layout creates vc_column that is why we default to it and then change it with JS.
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
      'description' => esc_html__('Select columns position within row.', 'js_composer'),
      'value' => [
        esc_html__('Equal height', 'blankcanvas') => '',
        esc_html__('Top', 'js_composer') => 'start',
        esc_html__('Middle', 'js_composer') => 'center',
        esc_html__('Bottom', 'js_composer') => 'end',
      ],
      'weight' => 100
    ],
    // [
    //   'type' => 'checkbox',
    //   'heading' => esc_html__('Use video background?', 'js_composer'),
    //   'param_name' => 'video_bg',
    //   'description' => esc_html__('If checked, video will be used as row background.', 'js_composer'),
    //   'value' => [
    //     esc_html__('Yes', 'js_composer') => 'yes'
    //   ],
    //   'weight' => 100
    // ],
    // [
    //   'type' => 'textfield',
    //   'heading' => esc_html__('YouTube link', 'js_composer'),
    //   'param_name' => 'video_bg_url',
    //   'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k', // default video url
    //   'description' => esc_html__('Add YouTube link.', 'js_composer'),
    //   'dependency' => [
    //     'element' => 'video_bg',
    //     'not_empty' => true,
    //   ],
    //   'weight' => 100
    // ],
    // [
    //   'type' => 'dropdown',
    //   'heading' => esc_html__('Parallax', 'js_composer'),
    //   'param_name' => 'video_bg_parallax',
    //   'description' => esc_html__('Add parallax type background for row.', 'js_composer'),
    //   'value' => [
    //     esc_html__('None', 'js_composer') => '',
    //     esc_html__('Simple', 'js_composer') => 'content-moving',
    //     esc_html__('With fade', 'js_composer') => 'content-moving-fade',
    //   ],
    //   'dependency' => [
    //     'element' => 'video_bg',
    //     'not_empty' => true,
    //   ],
    //   'weight' => 100
    // ],
    // [
    //   'type' => 'dropdown',
    //   'heading' => esc_html__('Parallax', 'js_composer'),
    //   'param_name' => 'parallax',
    //   'description' => esc_html__('Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'js_composer'),
    //   'value' => [
    //     esc_html__('None', 'js_composer') => '',
    //     esc_html__('Simple', 'js_composer') => 'content-moving',
    //     esc_html__('With fade', 'js_composer') => 'content-moving-fade',
    //   ],
    //   'dependency' => [
    //     'element' => 'video_bg',
    //     'is_empty' => true,
    //   ],
    //   'weight' => 100
    // ],
    // [
    //   'type' => 'attach_image',
    //   'heading' => esc_html__('Image', 'js_composer'),
    //   'param_name' => 'parallax_image',
    //   'description' => esc_html__('Select image from media library.', 'js_composer'),
    //   'value' => '',
    //   'dependency' => [
    //     'element' => 'parallax',
    //     'not_empty' => true,
    //   ],
    //   'weight' => 100
    // ],
    // [
    //   'type' => 'textfield',
    //   'heading' => esc_html__('Parallax speed', 'js_composer'),
    //   'param_name' => 'parallax_speed_video',
    //   'description' => esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'js_composer'),
    //   'value' => '1.5',
    //   'dependency' => [
    //     'element' => 'video_bg_parallax',
    //     'not_empty' => true,
    //   ],
    //   'weight' => 100
    // ],
    // [
    //   'type' => 'textfield',
    //   'heading' => esc_html__('Parallax speed', 'js_composer'),
    //   'param_name' => 'parallax_speed_bg',
    //   'description' => esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'js_composer'),
    //   'value' => '1.5',
    //   'dependency' => [
    //     'element' => 'parallax',
    //     'not_empty' => true,
    //   ],
    //   'weight' => 100
    // ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Parallax', 'js_composer'),
      'param_name' => 'parallax',
      'group' => esc_html__('Design', 'blankcanvas'),
      'value' => [
        esc_html__('None', 'js_composer') => '',
        esc_html__('Simple', 'js_composer') => 'content-moving',
      ],
      'description' => esc_html__('Add parallax effect to your background.', 'blankcanvas'),
      'dependency' => [
        'element' => 'background',
        'value' => 'image',
      ],
      'weight' => 79
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Parallax speed', 'js_composer'),
      'param_name' => 'parallax_speed_bg',
      'group' => esc_html__('Design', 'blankcanvas'),
      'value' => '1.5',
      'description' => esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'js_composer'),
      'dependency' => [
        'element' => 'parallax',
        'not_empty' => true,
      ],
      'weight' => 79
    ],
    [
      'type' => 'textfield',
      'param_name' => 'col_class',
      'heading' => esc_html__('Columns class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'description' => esc_html__('Add the same class names to every column inside this row.', 'blankcanvas'),
      'weight' => 59
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];