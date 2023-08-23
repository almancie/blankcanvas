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
  'text-block'
];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
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
  $attributes[] = sprintf('id="%s"', $el_id);
}

if (! empty($classes)) {
  $attributes[] = sprintf('class="%s"', trim($classes));
}

// Wrap content with P tag
$content = sprintf('<p>%s</p>', $content);

// Remove empty HTML tags
$content = preg_replace('/<(.*)><\/\1>/', '', $content);

// Get tags count
// preg_match_all('/<(?:(.*))>(?:.|\n)+?<\/\1>/', $content, $matches);

// If multiple tags, wrap everything with a div and
// add settings on the wrapper div
// if (count($matches[0]) > 1) {

  // Output
  return sprintf(
    '<div %s>%s</div>', 
    implode(' ', $attributes), 
    wpb_js_remove_wpautop($content)
  );
// }

// If only one tag, add settings to the tag
// return preg_replace('/>/', sprintf(' %s>', implode(' ', $attributes)), $content, 1);