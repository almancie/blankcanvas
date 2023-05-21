<?php

return [
  'name' => esc_html__('Section', 'blankcanvas'),
  'base' => 'section',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Section',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'vc_icon-vc-section',
  'class' => 'wpb_vc_section vc_main-sortable-element',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'only' => '', // Only root
  ],
  'description' => esc_html__('Group multiple rows in section', 'js_composer'),
  'params' => [
    [
      'type' => 'dropdown',
      'heading' => esc_html__( 'Section stretch', 'js_composer' ),
      'param_name' => 'full_width',
      'value' => [
        esc_html__( 'Default', 'js_composer' ) => '',
        esc_html__( 'Stretch section', 'js_composer' ) => 'stretch_row',
        esc_html__( 'Stretch section and content', 'js_composer' ) => 'stretch_row_content',
      ],
      'description' => esc_html__( 'Stretch section to be screen wide.', 'js_composer' ),
      'weight' => 100,
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__( 'Full height section?', 'js_composer' ),
      'param_name' => 'full_height',
      'description' => esc_html__( 'If checked section will be set to full height.', 'js_composer' ),
      'value' => [ esc_html__( 'Yes', 'js_composer' ) => 'yes' ],
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__( 'Content position', 'js_composer' ),
      'param_name' => 'content_placement',
      'value' => [
        esc_html__( 'Default', 'js_composer' ) => '',
        esc_html__( 'Top', 'js_composer' ) => 'start',
        esc_html__( 'Middle', 'js_composer' ) => 'center',
        esc_html__( 'Bottom', 'js_composer' ) => 'end',
      ],
      'description' => esc_html__( 'Select content position within section.', 'js_composer' ),
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__( 'Use video background?', 'js_composer' ),
      'param_name' => 'video_bg',
      'description' => esc_html__( 'If checked, video will be used as section background.', 'js_composer' ),
      'value' => [ esc_html__( 'Yes', 'js_composer' ) => 'yes' ],
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__( 'YouTube link', 'js_composer' ),
      'param_name' => 'video_bg_url',
      'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
      // default video url
      'description' => esc_html__( 'Add YouTube link.', 'js_composer' ),
      'dependency' => [
        'element' => 'video_bg',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__( 'Parallax', 'js_composer' ),
      'param_name' => 'video_bg_parallax',
      'value' => [
        esc_html__( 'None', 'js_composer' ) => '',
        esc_html__( 'Simple', 'js_composer' ) => 'content-moving',
        esc_html__( 'With fade', 'js_composer' ) => 'content-moving-fade',
      ],
      'description' => esc_html__( 'Add parallax type background for section.', 'js_composer' ),
      'dependency' => [
        'element' => 'video_bg',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__( 'Parallax', 'js_composer' ),
      'param_name' => 'parallax',
      'value' => [
        esc_html__( 'None', 'js_composer' ) => '',
        esc_html__( 'Simple', 'js_composer' ) => 'content-moving',
        esc_html__( 'With fade', 'js_composer' ) => 'content-moving-fade',
      ],
      'description' => esc_html__( 'Add parallax type background for section (Note: If no image is specified, parallax will use background image from Design Options).', 'js_composer' ),
      'dependency' => [
        'element' => 'video_bg',
        'is_empty' => true,
      ],
    ],
    [
      'type' => 'attach_image',
      'heading' => esc_html__( 'Image', 'js_composer' ),
      'param_name' => 'parallax_image',
      'value' => '',
      'description' => esc_html__( 'Select image from media library.', 'js_composer' ),
      'dependency' => [
        'element' => 'parallax',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__( 'Parallax speed', 'js_composer' ),
      'param_name' => 'parallax_speed_video',
      'value' => '1.5',
      'description' => esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'js_composer' ),
      'dependency' => [
        'element' => 'video_bg_parallax',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__( 'Parallax speed', 'js_composer' ),
      'param_name' => 'parallax_speed_bg',
      'value' => '1.5',
      'description' => esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'js_composer' ),
      'dependency' => [
        'element' => 'parallax',
        'not_empty' => true,
      ],
    ],
    [
      'type' => 'el_id',
      'heading' => esc_html__( 'Section ID', 'js_composer' ),
      'param_name' => 'el_id',
      'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %sw3c specification%s).', 'js_composer' ), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>' ),
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__( 'Hide?', 'blankcanvas' ),
      'param_name' => 'disable_element',
      'description' => esc_html__( 'If checked the section won\'t be visible on the public side of your website. You can switch it back any time.', 'js_composer' ),
      'value' => [ esc_html__( 'Yes', 'js_composer' ) => 'yes' ],
    ],
  ],
  'js_view' => 'VcSectionView',
  'default_content' => ''
];