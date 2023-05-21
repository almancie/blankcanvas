<?php

return [
  'name' => esc_html__('Tabs', 'js_composer'),
  'description' => esc_html__('Tabbed content', 'js_composer'),
  'base' => 'tabs',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Tabs',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'class' => 'wpb_vc_tta_tabs',
  'icon' => 'icon-wpb-ui-tab-content',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'only' => 'column',
  ],
  'params' => [
    [
      'type' => 'dropdown',
      'heading' => esc_html__('Navbar style', 'js_composer'),
      'param_name' => 'style',
      'description' => esc_html__('Select tabs display style.', 'js_composer'),
      'value' => [
        esc_html__('Tabs', 'blankcanvas') => 'tabs',
        esc_html__('Buttons', 'blankcanvas') => 'pills',
        esc_html__('Links', 'blankcanvas') => 'links',
      ],
      'weight' => 100,
    ],
    [
      'type' => 'textfield',
      'param_name' => 'active_section',
      'heading' => esc_html__('Active section', 'js_composer'),
      'value' => 1,
      'description' => esc_html__('Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'js_composer'),
    ],
    [
      'type' => 'el_id',
      'heading' => esc_html__('Element ID', 'js_composer'),
      'param_name' => 'el_id',
      'description' => sprintf( esc_html__('Enter element ID (Note: make sure it is unique and valid according to %sw3c specification%s).', 'js_composer'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">', '</a>'),
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
    [
      'type' => 'textfield',
      'heading' => esc_html__('Navbar class name', 'blankcanvas'),
      'param_name' => 'navbar_class',
      // 'description' => esc_html__('Navbar element class name.', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 55
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Tab title class name', 'blankcanvas'),
      'param_name' => 'nav_btn_class',
      // 'description' => esc_html__('Tab nav button class name.', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 55
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Tab content class name', 'blankcanvas'),
      'param_name' => 'content_class',
      // 'description' => esc_html__('Tab body class name.', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 55
    ],
    [
      'type' => 'textfield',
      'heading' => esc_html__('Tab panel class name', 'blankcanvas'),
      'param_name' => 'panel_class',
      // 'description' => esc_html__('Tab body class name.', 'blankcanvas'),
      'group' => esc_html__('Style', 'blankcanvas'),
      'weight' => 55
    ],
  ],
  'js_view' => 'VcBackendTtaTabsView',
  'custom_markup' =>
    '<div class="vc_tta-container" data-vc-action="collapse">
      <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
        <div class="vc_tta-tabs-container">
          <ul class="vc_tta-tabs-list">
            <li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section">
              <a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}">
                <span class="vc_tta-title-text">{{ section_title }}</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="vc_tta-panels vc_clearfix {{container-class}}">
          {{ content }}
        </div>
      </div>
    </div>',
  'default_content' => '[vc_tta_section title="' . esc_html__('Tab', 'js_composer') . '"][/vc_tta_section]',
  'admin_enqueue_js' => [
    vc_asset_url('lib/vc_tabs/vc-tabs.min.js')
  ],
];