<?php

return [
  [
    'type' => 'textfield',
    'heading' => esc_html__('Padding', 'blankcanvas'),
    'param_name' => 'padding',
    'group' => esc_html__('Spacing', 'blankcanvas'),
    'description' => esc_html__('Bootstrap classes (e.g. ps-2 pe-md-4)'),
    'weight' => 70,
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Margin', 'blankcanvas'),
    'param_name' => 'margin',
    'group' => esc_html__('Spacing', 'blankcanvas'),
    'description' => esc_html__('Bootstrap classes (e.g. mt-2 mb-md-4)'),
  ],
];