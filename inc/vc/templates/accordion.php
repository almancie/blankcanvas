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
  'accordion',
];

// Navbar CSS classes
$itemClasses = [
  'nav'
];

// Tab content CSS classes
// $contentClasses = [
//   'tab-content'
// ];

// Flush
if ($flush) {
  $classes[] = 'accordion-flush';
}

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

if ($navbar_class) {
  $navbarClasses[] = $navbar_class;
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

preg_match_all('/\[accordion_item(?:\s*)(.*?)\](?:.|\n)*?\[\/accordion_item\]/', $content, $items, PREG_SET_ORDER);

$updatedShortcodes = [];

foreach ($items as $key => $panel) {
  $shortcode = $panel[0];

  // $panelAtts = $panel[1];

  // Add extra atts to panel shortcode
  $shortcode = str_replace('[accordion_item', sprintf('[accordion_item %s item_class="%s" header_class="%s" body_class="%s"', $always_close ? "parent_id='$el_id'" : '', $item_class, $header_class, $body_class), $shortcode);

  // Add updated panel shortcode
  $updatedShortcodes[] = $shortcode;
}

$content = implode('', $updatedShortcodes);

return sprintf(
  '<div %s>%s</div>',
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);