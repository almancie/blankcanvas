<?php

return [
  [
    'type' => 'textfield',
    'heading' => esc_html__( 'Extra class name', 'js_composer' ),
    'param_name' => 'el_class',
    'group' => esc_html__('Style', 'blankcanvas'),
    'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
    'weight' => 60,
  ],
  [
    'type' => 'textarea',
    'heading' => esc_html__('Custom CSS', 'blankcanvas'),
    'param_name' => 'custom_css',
    'group' => esc_html__('Style', 'blankcanvas'),
    'description' => esc_html__('Enter custom CSS (Note: it will be added to this element as inline style).', 'blankcanvas'),
    'weight' => 50,
  ],
];