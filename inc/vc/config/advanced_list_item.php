<?php

return [
  'name' => esc_html__('Advanced List Item', 'blankcanvas'),
  'base' => 'advanced_list_item',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\AdvancedListItem',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  // 'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_column',
  'allowed_container_element' => 'row_inner',
  'is_container' => true,
  'content_element' => false, // Hides it from "Add element"
  'js_view' => 'VcColumnView',
  'params' => [
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
  ]
];