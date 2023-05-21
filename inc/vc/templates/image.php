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

// Src
$src = '';

switch ($source) {
  case 'media_library':
    $src = wp_get_attachment_image_src($image, $img_size);

    break;

  case 'external_link':
    $src = $custom_src;

    break;

  case 'featured_image':
    $src = get_the_post_thumbnail_url(null, $img_size);

    break;
}

// Id
if ($el_id) {
  $attributes[] = sprintf('id="%s"', $el_id);
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// If icon
if (in_array($img_size, $this->settings['icon_sizes'])) {
  $classes[] = sprintf('icon %s', $img_size);
}

// Filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG
$classes = apply_filters(
  VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
  implode(' ', array_filter(array_unique($classes))), 
  $this->settings['base'], 
  $atts
);

if ($classes) {
  $attributes[] = sprintf('class="%s"', $classes);
}

array_push($attributes,
  sprintf('src="%s"', is_array($src) ? $src[0] : $src),
  sprintf('data-img-src="%s"', $source),
  sprintf('data-img-size="%s"', $img_size ?: $external_img_size),
);

// Output
return sprintf('<img %s>', implode(' ', $attributes));