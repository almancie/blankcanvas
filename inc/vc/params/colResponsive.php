<?php

$group = esc_html__('Responsive', 'blankcanvas');

$options = [
  esc_html__( '1/12', 'blankcanvas' ) => '1/12',
  esc_html__( '2/12', 'blankcanvas' ) => '1/6',
  esc_html__( '3/12', 'blankcanvas' ) => '1/4',
  esc_html__( '4/12', 'blankcanvas' ) => '1/3',
  esc_html__( '5/12', 'blankcanvas' ) => '5/12',
  esc_html__( '6/12', 'blankcanvas' ) => '1/2',
  esc_html__( '7/12', 'blankcanvas' ) => '7/12',
  esc_html__( '8/12', 'blankcanvas' ) => '2/3',
  esc_html__( '9/12', 'blankcanvas' ) => '3/4',
  esc_html__( '10/12', 'blankcanvas' ) => '5/6',
  esc_html__( '11/12', 'blankcanvas' ) => '11/12',
  esc_html__( '12/12', 'blankcanvas' ) => '1/1',
  esc_html__( 'Auto grow', 'blankcanvas' ) => 'max',
  esc_html__( 'Auto shrink', 'blankcanvas' ) => 'auto',
  // esc_html__( '20%', 'js_composer' ) => '1/5',
  // esc_html__( '40%', 'js_composer' ) => '2/5',
  // esc_html__( '60%', 'js_composer' ) => '3/5',
  // esc_html__( '80%', 'js_composer' ) => '4/5',
];

$options1 = [esc_html__('Inherit', 'blankcanvas') => ''] + $options;

$options2 = [esc_html__('Default', 'blankcanvas') => ''] + $options;

return [
  [
    'type' => 'textfield',
    'heading' => esc_html__('Width', 'blankcanvas'),
    'param_name' => 'width',
    'group' => $group,
    'weight' => 90
  ],
  [
    'type' => 'dropdown',
    'heading' => esc_html__('≥ 1400px', 'blankcanvas'),
    'param_name' => 'width_xxl',
    'group' => $group,
    'value' => $options1,
  ],
  [
    'type' => 'dropdown',
    'heading' => esc_html__('≥ 1200px', 'blankcanvas'),
    'param_name' => 'width_xl',
    'group' => $group,
    'value' => $options1,
  ],
  [
    'type' => 'dropdown',
    'heading' => esc_html__('≥ 992px', 'blankcanvas'),
    'param_name' => 'width_lg',
    'group' => $group,
    'value' => $options1,
  ],
  [
    'type' => 'dropdown',
    'heading' => esc_html__('≥ 768px', 'blankcanvas'),
    'param_name' => 'width_md',
    'group' => $group,
    'value' => $options1,
  ],
  [
    'type' => 'dropdown',
    'heading' => esc_html__('≥ 576px', 'blankcanvas'),
    'param_name' => 'width_sm',
    'group' => $group,
    'value' => $options1,
  ],
  [
    'type' => 'dropdown',
    'heading' => esc_html__('> 0px', 'blankcanvas'),
    'param_name' => 'width_default',
    'group' => $group,
    'value' => $options2,
  ],
];