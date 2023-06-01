<?php

if (! defined('WPB_VC_VERSION')) return;

/*
|--------------------------------------------------------------------------
| Autoloaders
|--------------------------------------------------------------------------
|
| Autoloads elements classes for us.
|
*/

/**
 * Loads WPBakery built-in elements classes (e.g. vc-section).
 */
spl_autoload_register(function ($class) {
  if (! str_starts_with($class, 'WPBakeryShortCode_Vc_')) {
    return;
  }

  // Converts WPBakeryShortCode_Vc_Foo to vc-foo Because 
  // WPBakery names classes different than their files.
  require WPB_PLUGIN_DIR . sprintf(
    '/include/classes/shortcodes/%s.php',
    str_replace('_', '-', substr(strtolower($class), 18))
  );
});

/**
 * Loads WPBakery custom elements classes.
 */
spl_autoload_register(function ($class) {
  if (! str_starts_with($class, 'Blankcanvas\Vc\Shortcode')) {
    return;
  }

  require THEME_DIR . sprintf('/inc/vc/shortcodes/%s.php', substr($class, 26));
});

/*
|--------------------------------------------------------------------------
| Configuration
|--------------------------------------------------------------------------
|
| Configures WPBakery.
|
*/

/**
 * Disables Gutenberg for pages so we can load WPBakery editor.
 */
add_filter('use_block_editor_for_post', function ($bool, $post) {
  return $post->post_type === 'page' ? false : $bool;
}, 0, 2);

/**
 * Disables frontend editor.
 */
vc_disable_frontend();

/**
 * Changes default WPBakery templates directory.
 */
vc_set_shortcodes_templates_dir(THEME_DIR . '/inc/vc/templates');

/*
|--------------------------------------------------------------------------
| Custom Elements
|--------------------------------------------------------------------------
|
| Adds new custom elements to WPBakery.
|
*/

$elements = [
  'section', 
  'row', 
  'column', 
  'row_inner', 
  'column_inner',
  'row_inner_inner', 
  'column_inner_inner', 
  'tabs', 
  'panel', 
  'accordion', 
  'accordion_item', 
  'image', 
  'bootstrap_icon', 
  'text',
  'button',
  'advanced_list',
  'advanced_list_item',
  'html',
  'glide',
  'glide_slide',
  'group',
  'group_column'
];

add_action('vc_before_init', function() use ($elements) {
  foreach ($elements as $element) {
    vc_map(include sprintf(THEME_DIR . '/inc/vc/config/%s.php', $element));
  }
});

/*
|--------------------------------------------------------------------------
| Shared Fields
|--------------------------------------------------------------------------
|
| Adds custom fields to all of our custom elements.
|
*/

$fields = [
  'design', 
  'spacing', 
  'style', 
  'script', 
  'attributes',
  'transition',
];

add_action('vc_after_init', function () use ($elements, $fields) {
  foreach ($elements as $element) {
    foreach ($fields as $field) {
      $settings = include THEME_DIR . sprintf('/inc/vc/params/%s.php', $field);

      foreach ($settings as $setting) {
        vc_add_param($element, $setting);
      }
    }
  };
});

/*
|--------------------------------------------------------------------------
| Content Filters
|--------------------------------------------------------------------------
|
| Modifies shortcode's HTML output.
|
*/

/**
 * Data attributes
 */
add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) {
  $dataAttributes = [];

  if (! empty($atts['attributes'])) {
    $dataAttributes[] = str_replace(',', ' ', $atts['attributes']);
  }

  $transitionAtts = shortcode_atts([
    'transition' => '',
    'transition_duration' => '',
    'transition_delay' => '',
  ], $atts, $shortcode);

  foreach ($transitionAtts as $key => $value) {
    if (! $value) continue;

    $dataAttributes[] = sprintf('data-%s="%s"', str_replace('_', '-', $key), $value);
  }

  if (! empty($dataAttributes)) {
    $output = preg_replace('/>/', sprintf(' %s>', implode(' ', $dataAttributes)), $output, 1);
  }

  return $output;
}, 99, 4);

/**
 * CSS
 */
add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) {
  $css = [
    'background_color'          => 'background-color: %s',
    'gradient_background_color' => 'background: %s',
    'overlay_color'             => '--overlay-color: %s',
    'overlay_opacity'           => '--overlay-opacity: %s',
    'text_color'                => 'color: %s',
    'custom_css'                => ''
  ];

  $style = [];

  // Background image
  if (! empty($atts['background_image'])) {
    $img = wp_get_attachment_image_src($atts['background_image'], 'full');

    ! is_array($img) ?: $style[] = sprintf('background-image: url(%s); background-size: cover', $img[0]);
  }

  foreach ($atts as $key => $value) {
    if (! isset($css[$key]) || empty($value)) continue;

    $style[] = sprintf($css[$key], $value);
  }

  // Get the tags
  preg_match('/<.*?>/', $output, $tags);

  // Extract style from the parent tag only
  preg_match('/style="(.*?)"/', empty($tags) ? '' : $tags[0], $tagStyle);

  // Prepend it to our style
  if (! empty($tagStyle[1])) {
    array_unshift($style, substr($tagStyle[1], 0, -1));

    return preg_replace('/style="(.*?)"/', sprintf('style="%s"', implode('; ', $style)), $output, 1);
  }

  return preg_replace('/>/', sprintf('style="%s">', implode('; ', $style)), $output, 1);
}, 99, 4);

/**
 * Script
 */
add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) {
  if (empty($atts['custom_js'])) {
    return $output;
  }

  // Generate random custom class to refer to it in our JS.
  $customClass = 'custom-' . mt_rand();

  $output = preg_replace('/class="(.*?)"/', sprintf('class="\1 %s"', $customClass), $output, 1);

  // Decode
  $js = urldecode(base64_decode($atts['custom_js']));

  // Attach script to the element's HTML output.
  $output .= sprintf(
    "<script>(() => {\nconst $0 = document.querySelector('.%s');\n%s\n})()</script>", 
    $customClass, 
    $js
  );

  return $output;
}, 99, 4);

/*
|--------------------------------------------------------------------------
| CSS Class Filters
|--------------------------------------------------------------------------
|
| Modifies shortcode's element CSS class attribute.
|
*/

/**
 * Design options
 */
add_filter(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, function ($classes, $shortcode, $atts) {
  $atts = shortcode_atts([
    'padding_class' => '',
    'margin_class' => '',
    'overlay' => '',
  ], $atts, $shortcode);

  $css = [
    $classes,
    $atts['padding_class'],
    $atts['margin_class'], 
    $atts['overlay'] ? 'has-overlay' : ''
  ];

  return implode(' ', array_filter($css));
}, 99, 3);