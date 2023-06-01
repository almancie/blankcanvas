<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// CSS classes
$classes = [
  'row',
  'list-unstyled'
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

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// Item class
if ($item_class) {
  $content = preg_replace('/\[advanced_list_item[^_]/', sprintf('[advanced_list_item item_class="%s" ', $item_class), $content);
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
  '<ul %s>%s</ul>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);