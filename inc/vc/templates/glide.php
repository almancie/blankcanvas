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

$trackClasses = [
  'glide__track'
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

if ($track_class) {
  $trackClasses[] = $track_class;
}

if ($wrapper_class) {
  $wrapperClasses[] = $wrapper_class;
}

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
  window.addEventListener('load', function () {
    const element = document.querySelector('#%s');
    const slider = new Glide(element, {%s});
    %s
    element.slider = slider;
    slider.mount();
  });
</script>",
$el_id,
trim(preg_replace('/\s+/', ' ', urldecode(base64_decode($config)))),
urldecode(base64_decode($events))
);

// Arrows
$arrows = sprintf(
  '<div class="%s" data-glide-el="controls">
    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">%s</button>
    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">%s</button>
  </div>',
  implode(' ', $arrowsClasses),
  '<i class="bi bi-arrow-left"></i>',
  '<i class="bi bi-arrow-right"></i>',
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
    <div class="%s" data-glide-el="track">
    <ul class="%s">%s</ul>
    </div>
    %s
  </div>
  %s', 
  implode(' ', $attributes), 
  $hide_arrows ? '' : $arrows,
  implode(' ', $trackClasses),
  implode(' ', $wrapperClasses),
  wpb_js_remove_wpautop($content),
  $hide_bullets ? '' : $bullets,
  $script
);