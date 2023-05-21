<?php

extract($atts);

// CSS classes
$classes = [
  'tab-pane',
  'fade'
];

// Attributes
$attributes = [];

// Active
if ($active) {
  array_push($classes, 'active', 'show');
}

// Id
if ($tab_id) {
  $attributes[] = sprintf('id="tab-%s-pane"', $tab_id);
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// Passed down from the parent
if ($panel_class) {
  $classes[] = $panel_class;
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
  '<div %s role="tabpanel" tabindex="0">%s</div>', 
  implode(' ', $attributes),
  wpb_js_remove_wpautop($content)
);