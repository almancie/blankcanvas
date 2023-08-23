<?php

return [
  [
    'type' => 'dropdown',
    'heading' => esc_html__('Transition', 'blankcanvas'),
    'param_name' => 'transition',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'value' => [
      esc_html__('None', 'blankcanvas') => '', 
      esc_html__('Fade', 'blankcanvas') => 'fade', 
      esc_html__('Fade start', 'blankcanvas') => 'fadeStart', 
      esc_html__('Fade end', 'blankcanvas') => 'fadeEnd', 
      esc_html__('Fade up', 'blankcanvas') => 'fadeUp', 
      esc_html__('Fade down', 'blankcanvas') => 'fadeDown',
      esc_html__('Fade up start', 'blankcanvas') => 'fadeUpStart', 
      esc_html__('Fade up end', 'blankcanvas') => 'fadeUpEnd', 
      esc_html__('Fade down start', 'blankcanvas') => 'fadeDownStart', 
      esc_html__('Fade down end', 'blankcanvas') => 'fadeDownEnd',
      esc_html__('Fade down bounce', 'blankcanvas') => 'fadeDownBounce',
      esc_html__('Fade down rotate bounce', 'blankcanvas') => 'fadeDownRotateBounce',
      esc_html__('Fade zoom in', 'blankcanvas') => 'fadeZoomIn',
      esc_html__('Fade zoom out', 'blankcanvas') => 'fadeZoomOut',
      esc_html__('Tiles', 'blankcanvas') => 'tiles',
    ],
    'weight' => 0
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Anchor (optional)', 'blankcanvas'),
    'param_name' => 'transition_anchor',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'description' => esc_html__('Add a selector to a different element that will trigger the animation of this element.', 'blankcanvas'),
  ],
  [
    'type' => 'checkbox',
    'heading' => esc_html__('Custom timing?', 'blankcanvas'),
    'param_name' => 'transition_custom_timing',
    'group' => esc_html__('Transition', 'blankcanvas'),
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Duration (ms)', 'blankcanvas'),
    'param_name' => 'transition_duration',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'edit_field_class' => 'vc_col-xs-4',
    'dependency' => [
      'element' => 'transition_custom_timing',
      'not_empty' => true
    ],
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Delay (ms)', 'blankcanvas'),
    'param_name' => 'transition_delay',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'edit_field_class' => 'vc_col-xs-4',
    'dependency' => [
      'element' => 'transition_custom_timing',
      'not_empty' => true
    ],
  ],
  // [
  //   'type' => 'textarea_raw_html',
  //   'heading' => esc_html__('Extra', 'blankcanvas'),
  //   'param_name' => 'transition_extra',
  //   'group' => esc_html__('Transition', 'blankcanvas'),
  //   'description' => __('Add extra css properties to animate (must be in JSON format to work). Learn more by <a target="_blank" href="https://animejs.com/documentation/#cssProperties">clicking here</a>.', 'blankcanvas'),
  // ],
];