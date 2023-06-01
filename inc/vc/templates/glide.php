<?php

wp_enqueue_style('glide');
wp_enqueue_style('glide-theme');
wp_enqueue_script('glide');

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// CSS classes
$classes = [
  'glide'
];

$wrapperClasses = [
  'glide__slides'
];

$arrowsClasses = [
  'glide__arrows'
];

$bulletsClasses = [
  'glide__bullets'
];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Attributes
$attributes = [];

// Id
if (! $el_id) {
  $el_id = 'glide_' . mt_rand();
}

$attributes[] = sprintf('id="%s"', $el_id);

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// Slides classes
if ($slide_class) {
  $content = preg_replace('/\[glide_slide/', sprintf('[glide_slide slide_class="%s"', $slide_class), $content);
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

$script = sprintf(
  "<script>
    window.addEventListener('load', () => {
      new Glide('#%s').mount({\n%s\n});\n
    });
  </script>",
  $el_id,
  urldecode(base64_decode($configuration))
);

// Arrows
$arrows = sprintf(
  '<div class="%s" data-glide-el="controls">
    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
  </div>',
  implode(' ', $arrowsClasses)
);

// Bullets
$slidesCount = substr_count($content, '[glide_slide');

$bulletButtons = [];

for ($i = 0; $i < $slidesCount; $i++) { 
  $bulletButtons[] = sprintf('<button class="glide__bullet" data-glide-dir="=%s"></button>', $i);
}

$bullets = sprintf(
  '<div class="%s" data-glide-el="controls[nav]">
    %s
  </div>',
  implode(' ', $bulletsClasses),
  implode(' ', $bulletButtons)
);

// Output
return sprintf(
  '<div %s>
    %s
    <div class="glide__track" data-glide-el="track">
    <ul class="%s">%s</ul>
    </div>
    %s
  </div>
  %s', 
  implode(' ', $attributes), 
  $arrows,
  implode(' ', $wrapperClasses),
  wpb_js_remove_wpautop($content),
  $bullets,
  $script
);