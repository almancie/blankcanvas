<?php

return [
  'name' => esc_html__('Accordion Item', 'js_composer'),
  'base' => 'accordion_item',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\AccordionItem',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_tta_section bc-container bc-accordion-item bc-element',
  'icon' => 'icon-wpb-ui-tta-section',
  'allowed_container_element' => 'row_inner',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'only' => 'accordion'
  ],
  'js_view' => 'VcBackendTtaSectionView',
  'custom_markup' => 
    '<div class="vc_tta-panel-heading">
      <h4 class="vc_tta-panel-title">
        <a href="javascript:;" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-accordion data-vc-container=".vc_tta-container">
        <i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
          <span class="vc_tta-title-text">{{ section_title }}</span>
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
      'heading' => esc_html__('Title', 'blankcanvas'),
      'description' => esc_html__('Enter section title (Note: you can leave it empty).', 'js_composer'),
      'weight' => 100
    ],
    [
      'type' => 'el_id',
      'param_name' => 'collapse_id',
      'settings' => [
        'auto_generate' => true,
      ],
      'heading' => esc_html__('Collapse ID', 'js_composer'),
      'description' => esc_html__('Links section title to body to enable collapse functionality.', 'blankcanvas'),
      'weight' => 100
    ],
    require THEME_DIR . '/inc/vc/params/id.php'
  ],
];