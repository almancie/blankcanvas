<?php

$iconSizes = [
  'Icon (sm)' => 'icon-sm', 
  'Icon (md)' => 'icon-md', 
  'Icon (lg)' => 'icon-lg', 
  'Icon (xl)' => 'icon-xl', 
  'Icon (xxl)' => 'icon-xxl',
];

$sizes = array_merge(
  array_combine(
    array_map(fn ($v) => ucfirst(str_replace('_', ' ', $v)), get_intermediate_image_sizes()), 
    get_intermediate_image_sizes()
  ),
  $iconSizes
);

return [
  'name' => esc_html__('Image', 'blankcanvas'),
  'base' => 'image',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Image',
  'icon' => 'icon-wpb-single-image',
  'class' => 'bc-element',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'description' => esc_html__('Simple image', 'blankcanvas'),
  'show_settings_on_create' => false,
  'as_child' => [
    'except' => ', section',
  ],
  'icon_sizes' => $iconSizes,
  'params' => [
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Image source', 'js_composer'),
      'param_name' => 'source',
      'value' => [
        esc_html__('Media library', 'js_composer') => 'media_library',
        esc_html__('External link', 'js_composer') => 'external_link',
        esc_html__('Featured image', 'js_composer') => 'featured_image',
      ],
      'std' => 'media_library',
      'description' => esc_html__('Select image source.', 'js_composer'),
      'weight' => 100,
    ],
    [
      'type' => 'attach_image',
      'heading' => esc_html__('Image', 'js_composer'),
      'param_name' => 'image',
      'value' => '',
      'description' => esc_html__('Select image from media library.', 'js_composer'),
      'dependency' => [
        'element' => 'source',
        'value' => 'media_library',
      ],
      'admin_label' => true,
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('External link', 'js_composer'),
      'param_name' => 'custom_src',
      'description' => esc_html__('Select external link.', 'js_composer'),
      'dependency' => [
        'element' => 'source',
        'value' => 'external_link',
      ],
      'admin_label' => true,
      'weight' => 100
    ],
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Image size', 'js_composer'),
      'param_name' => 'img_size',
      'value' => $sizes,
      'dependency' => [
        'element' => 'source',
        'value' => [
          'media_library',
          'featured_image',
        ],
      ],
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('HTML tag', 'blankcanvas'),
      'param_name' => 'wrapper_tag',
      'description' => esc_html__('Choose a wrapper for your image or leave empty if you don\'t want to wrap your image.', 'blankcanvas'),
      'value' => 'figure',
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Image size', 'js_composer'),
      'param_name' => 'external_img_size',
      'value' => '',
      'description' => esc_html__('Enter image size in pixels. Example: 200x100 (Width x Height).', 'js_composer'),
      'dependency' => [
        'element' => 'source',
        'value' => 'external_link',
      ],
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      'param_name' => 'img_class',
      'heading' => esc_html__('Image class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 59,
      'dependency' => [
        'element' => 'wrapper_tag',
        'not_empty' => true,
      ],
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];
