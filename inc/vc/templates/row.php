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
  'row',
  // 'vc_row',
  // 'wpb_row',
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

// Stretch
// if ($full_width) {
//   array_push($attributes, 'data-vc-full-width="true"', 'data-vc-full-width-init="false"');

//   if ($full_width === 'stretch_row_content') {
//     $attributes[] = 'data-vc-stretch-content="true"';
//   }
// }

// Full height
// if ($full_height) {
//   $classes[] = 'vc_row-o-full-height';
// }

// Columns X position
if ($columns_position_x) {
  $classes[] = sprintf('justify-content-%s', $columns_position_x);
}

// Columns Y position
if ($columns_position_x) {
  $classes[] = sprintf('align-items-%s', $columns_position_x);
}

// Has background
if (/*$background ||*/ $video_bg || $parallax) {
  $classes[] = 'vc_section-has-fill';
}

// Has background video
$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

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

// Columns classes
if ($col_class) {
  $content = preg_replace('/\[column[^_]/', sprintf('[column col_class="%s" ', $col_class), $content);
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
  '<div %s>%s</div>', 
  implode(' ', $attributes), 
  wpb_js_remove_wpautop($content)
);