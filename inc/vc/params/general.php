<?php

return [
  require THEME_DIR . '/inc/vc/params/id.php',
  [
    'type' => 'checkbox',
    // 'heading' => esc_html__('Hide?', 'blankcanvas'),
    'param_name' => 'disable_element',
    'description' => esc_html__('Hide the element and its content.', 'js_composer'),
    'value' => [
      esc_html__(' Hide element', 'js_composer') => 'yes' 
    ],
    'weight' => 99
  ],
];