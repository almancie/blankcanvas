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
      esc_html__('Bounce down', 'blankcanvas') => 'fadeBounceDown',
      esc_html__('Bounce down rotate', 'blankcanvas') => 'fadeBounceDownAndRotate',
      esc_html__('Zoom in', 'blankcanvas') => 'fadeZoomIn',
      esc_html__('Zoom out', 'blankcanvas') => 'fadeZoomOut',
      esc_html__('Roll start', 'blankcanvas') => 'fadeRollStart',
      esc_html__('Roll end', 'blankcanvas') => 'fadeRollEnd',
      esc_html__('Tiles', 'blankcanvas') => 'tiles',
    ],
    'weight' => 0
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Anchor', 'blankcanvas'),
    'param_name' => 'transition_anchor',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'description' => esc_html__('Optional: Add a selector to a different element that will trigger the animation of this element.', 'blankcanvas'),
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Duration (ms)', 'blankcanvas'),
    'param_name' => 'transition_duration',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'description' => esc_html__('Optional: Add a custom duration time.', 'blankcanvas'),
    'edit_field_class' => 'vc_col-xs-4',
  ],
  [
    'type' => 'textfield',
    'heading' => esc_html__('Delay (ms)', 'blankcanvas'),
    'param_name' => 'transition_delay',
    'group' => esc_html__('Transition', 'blankcanvas'),
    'description' => esc_html__('Optional: Add a custom delay time.', 'blankcanvas'),
    'edit_field_class' => 'vc_col-xs-4',
  ],
];