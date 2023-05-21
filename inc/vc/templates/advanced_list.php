<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// CSS classes
$classes = [
  'element'
];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Attributes
$attributes = [];

// Layout (can be moved to JS)
switch ($layout) {
  case 'auto':
    $classes[] = 'list-inline';

    $content = preg_replace('/(\[advanced_list_item)/', '\1 layout_class="list-inline-item"', $content);

    break;

  case 'max':
    array_push($classes, 'list-inline', 'd-flex');

    $content = preg_replace('/(\[advanced_list_item)/', '\1 layout_class="col"', $content);

    break;

  default:
    $classes[] = 'list-unstyled';

    break;
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

// Id
if ($el_id) {
  $attributes[] = sprintf('id="%s"', $id);
}

$attributes[] = sprintf('class="%s"', $classes);

// Output
return sprintf(
  '<ul %s>%s</ul>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);