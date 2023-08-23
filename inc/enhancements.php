<?php

/*
|--------------------------------------------------------------------------
| Pingback
|--------------------------------------------------------------------------
|
| Adds a pingback url auto-discovery header for single posts, pages, or attachments.
|
| This is not important and can be deleted if desired.
|
*/

add_action('wp_head', function () {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
});

/*
|--------------------------------------------------------------------------
| Media MIME Types
|--------------------------------------------------------------------------
|
| Adds support for custom media uploads MIME types.
|
*/

add_filter('upload_mimes', function ($mimes) {
  return array_merge($mimes, [
    'svg'  => 'image/svg+xml',
    'json' => 'text/plain'
  ]);
});