<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// Slide class (passed from the parent)
$slide_class = $atts['slide_class'] ?? '';

// CSS classes
$classes = [
  'glide__slide'
];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// Slide class
if ($slide_class) {
  $classes[] = $slide_class;
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
  $attributes[] = sprintf('id="%s"', $el_id);
}

if (! empty($classes)) {
  $attributes[] = sprintf('class="%s"', trim($classes));
}

// Output
return sprintf(
  '<li %s>%s</li>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);