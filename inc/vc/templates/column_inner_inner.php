<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

wp_enqueue_script('wpb_composer_front_js');

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

$attributes[] = sprintf('class="%s"', esc_attr(trim($classes)));

// Output
return sprintf(
  '<div %s>%s</div>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);