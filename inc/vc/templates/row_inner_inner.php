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
  $attributes[] = sprintf('id="%s"', $el_id);
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

// Columns classes
if ($col_class) {
  $content = preg_replace('/\[column_inner_inner/', sprintf('[column_inner_inner col_class="%s" ', $col_class), $content);
}

// Filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG
$classes = apply_filters(
  VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
  implode(' ', array_filter(array_unique($classes))), 
  $this->settings['base'], 
  $atts
);

if (! empty($classes)) {
  $attributes[] = sprintf('class="%s"', trim($classes));
}

// Output
return sprintf(
  '<div %s>%s</div>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);