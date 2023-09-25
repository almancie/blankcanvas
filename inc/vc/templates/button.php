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
  'btn'
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

// Size
if ($size) {
  $classes[] = sprintf('btn-%s', $size);
}

// Style & color
if ($color) {
  $classes[] = sprintf('btn-%s%s', $style ? $style . '-' : '', $color);
}

if ($icon) {
  // $classes[] = 'btn-has-icon';

  // if ($gap) {
  //   $classes[] = sprintf('gap-%s', $gap);
  // }

  $iconClasses = [
    'btn-icon',
  ];

  // if ($icon_size) {
  //   $iconClasses[] = sprintf('bi-%s', $icon_size);
  // }

  if ($icon_name) {
    $iconClasses[] = sprintf('bi bi-%s', $icon_name);
  }

  if ($icon_position === 'end') {
    $classes[] = 'flex-row-reverse';
  }

  if ($icon_style === 'emphasis') {
    $iconClasses[] = $icon_position === 'end' ? 'btn-icon-emphasis-end' : 'btn-icon-emphasis';
  }

  $text = sprintf('<i class="%s"></i>%s', implode(' ', $iconClasses), $text);
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

if ($link) {
  $linkAtts = vc_build_link($link);

  $linkAtts = ['href' => $linkAtts['url']] + $linkAtts;

  unset($linkAtts['url']);

  foreach ($linkAtts as $name => $value) {
    $attributes[] = sprintf('%s="%s"', $name, $value);
  }
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
  '<a %s>%s</a>', 
  implode(' ', $attributes), 
  $text
);