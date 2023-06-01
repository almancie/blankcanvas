<?php

return [
  'name' => esc_html__('Tab Panel', 'js_composer' ),
  'base' => 'panel',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Panel',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_tta_section',
  'icon' => 'icon-wpb-ui-tta-section',
  'allowed_container_element' => 'row_inner',
  "is_container" => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'only' => 'tabs'
  ],
  'js_view' => 'VcBackendTtaSectionView',
  'custom_markup' => 
    '<div class="vc_tta-panel-heading">
      <h4 class="vc_tta-panel-title">
        <a href="javascript:;" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-accordion data-vc-container=".vc_tta-container">
          <span class="vc_tta-title-text">{{ section_title }}</span>
          <i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
        </a>
      </h4>
    </div>
    <div class="vc_tta-panel-body">
      {{ editor_controls }}
      <div class="{{ container-class }}">
        {{ content }}
      </div>
    </div>',
  'default_content' => '',
  'params' => [
    [
      'type' => 'textfield',
      'param_name' => 'title',
      'heading' => esc_html__( 'Title', 'js_composer' ),
      'description' => esc_html__( 'Enter section title (Note: you can leave it empty).', 'js_composer' ),
      'weight' => 100
    ],
    [
      'type' => 'el_id',
      'param_name' => 'tab_id',
      'settings' => [
        'auto_generate' => true,
      ],
      'heading' => esc_html__( 'Section ID', 'js_composer' ),
      'description' => esc_html__('Enter unique element ID.', 'blankcanvas'),
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__( 'Extra class name', 'js_composer' ),
      'param_name' => 'el_class',
      'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
    ],
  ],
];