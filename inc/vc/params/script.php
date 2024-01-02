<?php

return [
  [
    'type' => 'textarea_raw_html',
    'heading' => esc_html__('Custom JS', 'blankcanvas'),
    'param_name' => 'custom_js',
    'group' => esc_html__('Script', 'blankcanvas'),
    'description' => esc_html__('Refer to this element as ($0).', 'blankcanvas'),
    'weight' => 40,
    // 'value' => urlencode(base64_encode("window.addEventListener('load', () => {});")),
  ],
];