<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

wp_enqueue_script( 'wpb_composer_front_js' );

// CSS classes
$classes = [
  'section',
  // 'vc_section',
];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Has background
if ($background_image || $video_bg || $parallax) {
  $classes[] = 'section-has-fill';
}

// Attributes
$attributes = [];

// Id
if ($el_id) {
  $attributes[] = sprintf('id="%s"', $el_id);
}

// Stretch
if ($full_width === 'stretch') {
  $classes[] = 'section-stretched';
}

// Stretch content
if ($full_width === 'stretch_content') {
  $classes[] = 'section-stretched-content';
}

// Full height
if ($full_height) {
  $classes[] = 'section-full-height';
}

// Content alignment
if ($content_placement) {
  $classes[] = sprintf('d-flex flex-column justify-content-%s', $content_placement);
}

// Has background video
$has_video_bg = ! empty($video_bg) && ! empty($video_bg_url) && vc_extract_youtube_id($video_bg_url);

// Parallax effect
$parallax_speed = $parallax_speed_bg;

if ( $has_video_bg ) {
  $parallax = $video_bg_parallax;
  $parallax_speed = $parallax_speed_video;
  $parallax_image = $video_bg_url;
  $classes[] = 'vc_video-bg-container';
  wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
  wp_enqueue_script( 'vc_jquery_skrollr_js' );
  $attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
  $classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
  if ( false !== strpos( $parallax, 'fade' ) ) {
    $classes[] = 'js-vc_parallax-o-fade';
    $attributes[] = 'data-vc-parallax-o-fade="on"';
  } elseif ( false !== strpos( $parallax, 'fixed' ) ) {
    $classes[] = 'js-vc_parallax-o-fixed';
  }
}

if ( ! empty( $parallax_image ) ) {
  if ( $has_video_bg ) {
    $parallax_image_src = $parallax_image;
  } else {
    $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
    $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
    if ( ! empty( $parallax_image_src[0] ) ) {
      $parallax_image_src = $parallax_image_src[0];
    }
  }
  $attributes[] = sprintf('data-vc-parallax-image="%s"', esc_attr($parallax_image_src));
}

if ( ! $parallax && $has_video_bg ) {
  $attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
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
  '<section %s>%s</section>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);