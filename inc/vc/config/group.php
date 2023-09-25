<?php

return [
  'name' => esc_html__('Group', 'blankcanvas'),
  'description' => esc_html__('Group content elements together', 'blankcanvas'),
  'base' => 'group',
  'php_class_name' => 'Blankcanvas\Vc\Shortcodes\Group',
  'category' => esc_html__('Blank Canvas', 'blankcanvas'),
  'icon' => 'icon-wpb-row',
  'class' => 'wpb_vc_row shortcodes_container bc-element',
  'content_element' => true,
  'show_settings_on_create' => false,
  'is_container' => true,
  'as_child' => [
    'except' => ',section'
  ],
  'params' => [
    ...require THEME_DIR . '/inc/vc/params/general.php'
  ],
];