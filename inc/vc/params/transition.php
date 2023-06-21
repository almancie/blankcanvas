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
      esc_html__('Start', 'blankcanvas') => 'start', 
      esc_html__('End', 'blankcanvas') => 'end', 
      esc_html__('Up', 'blankcanvas') => 'up', 
      esc_html__('Down', 'blankcanvas') => 'down',
      esc_html__('Down bounce', 'blankcanvas') => 'downBounce',
      esc_html__('Down rotate bounce', 'blankcanvas') => 'downRotateBounce',
      esc_html__('Zoom in', 'blankcanvas') => 'zoomIn',
      esc_html__('Tiles', 'blankcanvas') => 'tiles',
      esc_html__('Custom', 'blankcanvas') => 'custom',
    ],
    'weight' => 0
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
  [
    'type' => 'textfield',
    'heading' => esc_html__('Anchor', 'blankcanvas'),
    'param_name' => 'transition_anchor',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'description' => esc_html__('Add a selector to a different element that will trigger the animation of this element.', 'blankcanvas'),
  ],
  [
    'type' => 'textarea_raw_html',
    'heading' => esc_html__('Extra', 'blankcanvas'),
    'param_name' => 'transition_extra',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'description' => __('Add extra css properties to animate (must be in JSON format to work). Learn more by <a target="_blank" href="https://animejs.com/documentation/#cssProperties">clicking here</a>.', 'blankcanvas'),
  ],
];