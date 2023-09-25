<?php

return [
  require THEME_DIR . '/inc/vc/params/id.php',
  [
    'type' => 'checkbox',
    'heading' => esc_html__('Disable element', 'blankcanvas'),
    'param_name' => 'disable_element',
    'description' => __('<div style="margin-bottom: 1rem;">Hide the element and its content.</div>', 'blankcanvas'),
    'value' => [
      esc_html__('Yes', 'blankcanvas') => 'yes' 
    ],
    'weight' => 99
  ],
];