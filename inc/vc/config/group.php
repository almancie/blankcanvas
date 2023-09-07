<?php

return [
  'name' => esc_html__('Group', 'blankcanvas'),
  'description' => esc_html__('Group content elements together', 'blankcanvas'),
  'base' => 'group',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Group',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row',
  'is_container' => true,
  'show_settings_on_create' => false,
  'as_child' => [
    'only' => 'column'
  ],
  'js_view' => 'VcRowView',
  'default_content' => '[group_column][/group_column]',
  'params' => [
    // [
    //   'type' => 'textfield',
    //   'param_name' => 'child_class',
    //   'heading' => esc_html__('Elements class name', 'blankcanvas'),
    //   'group' => esc_html__('Style', 'blankcanvas'),
    //   'description' => esc_html__('Add the same class names to every element inside this group.', 'blankcanvas'),
    //   'weight' => 59
    // ],
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];