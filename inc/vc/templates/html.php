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
  'html-block'
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

$attributes[] = sprintf('class="%s"', $classes);

$content = urldecode(base64_decode($content));

// Get tags count
preg_match_all('/<(?:(.*))>(?:.|\n)+?<\/\1>/', $content, $matches);

// If multiple tags, wrap everything with a div and
// add settings on the wrapper div
if (count($matches[0]) === 1) {

  // If only one tag, add settings to the tag
  return preg_replace('/>/', sprintf(' %s>', implode(' ', $attributes)), $content, 1);
}

// Output
return sprintf(
  '<div %s>%s</div>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);