<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// CSS classes
$classes = [
  'element',
  'bi',
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

// Icon size
if ($icon_size) {
  $classes[] = sprintf('bi-%s', $icon_size);
}

// Icon name
if ($icon_name) {
  $classes[] = sprintf('bi-%s', $icon_name);
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

$classes = apply_filters(
  VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
  implode(' ', array_filter(array_unique($classes))), 
  $this->settings['base'], 
  $atts
);

// Add classes to the list of attributes
$attributes[] = sprintf('class="%s"', $classes);

return sprintf('<i %s></i>', implode(' ', $attributes));