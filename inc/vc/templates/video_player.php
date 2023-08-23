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
  'video'
];

// Style
$style = [];

// Youtube video settings
$youtubeSettings = [];

// Direct video settings
$directSettings = [
  'muted'
];

// Direct video script
$directScript = '';

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

$classes[] = sprintf('video-%s', $source);

// Id
if (! $el_id) {
  $el_id = sprintf('video-%s', mt_rand());
}

// Video link
if ($link) {
  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);

  $youtubeSettings[] = sprintf('data-video-id="%s"', $match[1]);
}

// Video controls
if ($hide_controls) {
  $classes[] = 'video-has-no-controls';

  $youtubeSettings[] = sprintf('data-video-controls="%s"', 'false');
} else {
  $directSettings[] = 'controls';
}

// Video state
if ($state) {
  $youtubeSettings[] = sprintf('data-video-state="%s"', $state);

  if ($state === 'playing') {
    $directSettings[] = 'autoplay';
  }

  if ($state === 'scroll') {  
    $directSettings[] = 'wait';
  }
}

if ($video_width) {
  $style[] = sprintf('width: %s;', $video_width);
}

// Filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG
$classes = apply_filters(
  VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
  implode(' ', array_filter(array_unique($classes))), 
  $this->settings['base'], 
  $atts
);

$style = implode(' ', ($style));

// Attributes
$attributes = [];

$attributes[] = sprintf('id="%s"', $el_id);

if ($style) {
  $attributes[] = sprintf('style="%s"', $style);
}

if (! empty($classes)) {
  $attributes[] = sprintf('class="%s"', trim($classes));
}

if ($source === 'youtube') {
  // Output
  return sprintf(
    '<div %s %s></div>',
    implode(' ', $attributes),
    implode(' ', $youtubeSettings)
  );
}

$attributes[] = implode(' ', $directSettings);

// Output
return sprintf(
  '<video %s>
    <source src=%s>
  </video>
  %s', 
  implode(' ', $attributes),
  filter_var($link, FILTER_SANITIZE_URL),
  $directScript
);