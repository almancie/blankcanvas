<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// Col class (passed from the parent)
$item_class = $atts['item_class'] ?? '';

// Width responsive CSS classes
$widths = [
  ''    => $width_default, 
  'sm'  => $width_sm, 
  'md'  => $width_md, 
  'lg'  => $width_lg, 
  'xl'  => $width_xl, 
  'xxl' => $width_xxl, 
];

$widthClasses = [];

foreach ($widths as $size => $value) {
  if (! $value) continue;

  if ($value === 'max') {
    $value = '';
  }

  if (preg_match('/\d+\/\d+/', $value)) {
    $value = explode('/', $value);

    $value = 12 / $value[1] * $value[0];
  }

  $widthClasses[] = sprintf(
    'col%s%s', 
    $size ? '-' . $size : '', 
    $value ? '-' . $value : ''
  );
}

// CSS classes
$classes = $widthClasses;

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Layout
// if (! empty($atts['layout_class'])) {
//   $classes[] = $atts['layout_class'];
// }

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// Item class
if ($item_class) {
  $classes[] = $item_class;
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