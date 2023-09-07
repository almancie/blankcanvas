<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// wp_enqueue_script('lottie-player');

// CSS classes
$classes = [
  'element',
  'lottie-player'
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

if ($src) {
  $attributes[] = sprintf('src="%s"', $src);
}

if ($mode) {
  $attributes[] = $mode;
}

if ($direction) {
  $attributes[] = $direction;
}

if ($speed) {
  $attributes[] = sprintf('speed="%s"', $speed);
}

if ($autoplay) {
  $attributes[] = 'autoplay';
}

if ($loop) {
  $attributes[] = 'loop';
}

if ($hover) {
  $attributes[] = 'hover';
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

if (! empty($classes)) {
  $attributes[] = sprintf('class="%s"', trim($classes));
}

// Output
return sprintf(
  '<lottie-player %s></lottie-player>', 
  implode(' ', $attributes), 
);