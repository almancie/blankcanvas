<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// CSS classes
$classes = [];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Layout
if (! empty($atts['layout_class'])) {
  $classes[] = $atts['layout_class'];
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

// Attributes
$attributes = [];

// Id
if ($el_id) {
  $attributes[] = sprintf('id="%s"', $id);
}

$attributes[] = sprintf('class="%s"', $classes);

// Output
return sprintf(
  '<li %s>%s</li>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);