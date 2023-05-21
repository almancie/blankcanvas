<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

wp_enqueue_script( 'wpb_composer_front_js' );

// CSS classes
$classes = [
  'row'
];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Attributes
$attributes = [];

// Id
if ($el_id) {
  $attributes[] = sprintf('id="%s"', $id);
}

// Columns X position
if ($columns_position_x) {
  $classes[] = sprintf('justify-content-%s', $columns_position_x);
}

// Columns Y position
if ($columns_position_y) {
  $classes[] = sprintf('align-items-%s', $columns_position_y);
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// Filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG
$classes = apply_filters(
  VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
  implode(' ', array_filter(array_unique($classes))), 
  $this->settings['base'], 
  $atts
);

$attributes[] = sprintf('class="%s"', esc_attr(trim($classes)));

// Output
return sprintf(
  '<div %s>%s</div>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);