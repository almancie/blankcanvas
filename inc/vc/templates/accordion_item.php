<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// Parent ID
$parent_id = $atts['parent_id'] ?? '';

// Item class (passed from the parent)
$item_class = $atts['item_class'] ?? '';

// Header class (passed from the parent)
$header_class = $atts['header_class'] ?? '';

// Body class (passed from the parent)
$body_class = $atts['body_class'] ?? '';

// CSS classes
$classes = [
  'accordion-item',
];

// Attributes
$attributes = [];

// Id
if ($el_id) {
  $attributes[] = sprintf('id="%s"', $el_id);
}

// Combine with element class
if ($item_class) {
  $classes[] = $item_class;
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// Collapse ID
if (! $collapse_id) {
  $collapse_id = mt_rand();
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

return sprintf(
  '<div %s>
    <h2 class="accordion-header%s">
      <button class="accordion-button collapsed%s" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-panel-%s">
        %s
      </button>
    </h2>
    <div id="accordion-panel-%s" class="accordion-collapse collapse%s"%s>
      <div class="accordion-body%s">
        %s
      </div>
    </div>
  </div>',
  implode(' ', $attributes),
  $this->getExtraClass($header_class),
  $this->getExtraClass($title_class),
  $collapse_id,
  $title ?: esc_html__('No Title', 'blankcanvas'), 
  $collapse_id,
  $this->getExtraClass($panel_class),
  $parent_id ? sprintf(' data-bs-parent="#%s"', $parent_id) : '',
  $this->getExtraClass($body_class),
  wpb_js_remove_wpautop($content)
);