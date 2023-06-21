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

$imgClasses = [];

// Attributes
$attributes = [];

$imgAttributes = [];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

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

// Image class
if ($img_class) {
  $imgClasses[] = $img_class;
}

// If image is icon
if (in_array($img_size, $this->settings['icon_sizes'])) {
  $imgClasses[] = sprintf('icon %s', $img_size);
}

// Filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG
$classes = apply_filters(
  VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
  implode(' ', array_filter(array_unique($classes))), 
  $this->settings['base'], 
  $atts
);

array_push($imgAttributes,
  sprintf('src="%s"', is_array($src) ? $src[0] : $src),
  sprintf('data-img-src="%s"', $source),
  sprintf('data-img-size="%s"', $img_size ?: $external_img_size),
);

// Wrapper
if ($wrapper_tag) {
  if (! empty($imgClasses)) {
    $imgAttributes[] = sprintf('class="%s"', implode(' ', $imgClasses));
  }

  $attributes[] = sprintf('class="%s"', trim($classes));

  return sprintf(
    '<%s %s>
      <img %s>
    </%s>', 
    $wrapper_tag,
    implode(' ', $attributes),
    implode(' ', $imgAttributes),
    $wrapper_tag
  );
}

// No wrapper
if (! empty($imgClasses)) {
  $classes .= sprintf(' %s', implode(' ', $imgClasses));
}

$attributes[] = implode(' ', $imgAttributes);

$attributes[] = sprintf('class="%s"', trim($classes));

return sprintf('<img %s>', implode(' ', $attributes));