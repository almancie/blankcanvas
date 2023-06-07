<?php

return [
  'name' => esc_html__('Accordion', 'js_composer'),
  'description' => esc_html__('Collapsible content panels', 'js_composer'),
  'base' => 'accordion',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Accordion',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_tta_accordion',
  'icon' => 'icon-wpb-ui-accordion',
  'is_container' => true,
  'show_settings_on_create' => false,
  'js_view' => 'VcBackendTtaAccordionView',
  'custom_markup' => 
    '<div class="vc_tta-container" data-vc-action="collapseAll">
      <div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
         <div class="vc_tta-panels vc_clearfix {{container-class}}">
            {{ content }}
            <div class="vc_tta-panel vc_tta-section-append">
              <div class="vc_tta-panel-heading">
                <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                  <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
                    <span class="vc_tta-title-text">' . esc_html__( 'Add Section', 'js_composer' ) . '</span>
                    <i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
                  </a>
                </h4>
              </div>
            </div>
         </div>
      </div>
    </div>',
  'default_content' => '[vc_tta_section title="' . esc_html__('Tab', 'js_composer') . '"][/vc_tta_section]',
  'as_child' => [
    'only' => 'section, column',
  ],
  'params' => [
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Flush?', 'blankcanvas'),
      'param_name' => 'flush',
      'description' => esc_html__('If checked, the background color will be removed.', 'blankcanvas'),
      'value' => [
        esc_html__('Yes', 'js_composer') => 'yes',
      ],
      'weight' => 100
    ],
    [
      'type' => 'checkbox',
      'heading' => esc_html__('Alway close?', 'blankcanvas'),
      'param_name' => 'always_close',
      'description' => esc_html__('If checked, opening a new section will close other sections.', 'blankcanvas'),
      'value' => [
        esc_html__('Yes', 'js_composer') => 'yes'
      ],
      'weight' => 100
    ],
    [
      'type' => 'textfield',
      'param_name' => 'item_class',
      'heading' => esc_html__('Item class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 59
    ],
    [
      'type' => 'textfield',
      'param_name' => 'header_class',
      'heading' => esc_html__('Item header class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 58
    ],
    [
      'type' => 'textfield',
      'param_name' => 'body_class',
      'heading' => esc_html__('Item body class name', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 56
    ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];