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
  if (! str_starts_with($class, 'WPBakeryShortCode_Vc_')) return;

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
  if (! str_starts_with($class, 'Blankcanvas\Vc\Shortcode')) return;

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
  'vc_section',         // Had to override it to avoid issues
  'vc_row',             // Had to override it to avoid issues
  'vc_column',          // Had to override it to avoid issues
  'vc_row_inner',       // Had to override it to avoid issues
  'vc_column_inner',    // Had to override it to avoid issues
  'row_inner_inner', 
  'column_inner_inner',
  'tabs', 
  'panel', 
  'accordion', 
  'accordion_item', 
  'image', 
  'text',
  'button',
  'glide',
  'html',
  'glide_slide',
  'lottie_player',
  'video_player'
  // 'bootstrap_icon', 
  // 'advanced_list',
  // 'advanced_list_item',
  // 'group',
  // 'group_column',
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
| CSS Classes
|--------------------------------------------------------------------------
|
| Modifies shortcode's HTML output to add Class
|
*/

add_filter(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, function ($classes, $shortcode, $atts) {
  $options = [
    'overlay_color' => 'has-overlay',
    'border' => 'border',
  ];

  foreach ($options as $name => $value) {
    if (empty($atts[$name])) continue;

    $classes .= ' ' . $value;
  }

  return trim($classes);
}, 99, 3);

/*
|--------------------------------------------------------------------------
| Style Attribute
|--------------------------------------------------------------------------
|
| Modifies shortcode's HTML output to add style.
|
*/

$style = [];

/**
 * Background image
 */
add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) use (&$style) {
  if (empty($atts['background_image'])) return $output;

  $img = wp_get_attachment_image_src($atts['background_image'], 'full');

  if (is_array($img)) {
    $style[] = sprintf('background-image: url(%s); background-size: cover; background-position: center;', $img[0]);
  }

  return $output;
}, 99, 4);

/**
 * Design options
 */
add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) use (&$style) { 
  $options = [
    'background_color'          => 'background-color: %s',
    'custom_background_color'   => 'background-color: %s',
    'gradient_background_color' => 'background: %s',
    'overlay_color'             => '--overlay-color: %s',
    'custom_overlay_color'      => '--overlay-color: %s',
    'overlay_opacity'           => '--overlay-opacity: %s',
    'text_color'                => 'color: %s',
    'border_color'              => '--border-color: %s',
    'border_size'               => '--border-width: %s',
  ];
 
  foreach ($options as $name => $value) {
    if (empty($atts[$name])) continue;

    if ($atts[$name] === 'custom') continue;

    $style[] = sprintf($value, $atts[$name]);
  }

  return $output;
}, 99, 4);

/**
 * Spacing
 */
add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) use (&$style) { 
  $options = [
    'padding_top'    => 'padding-top: %s',
    'padding_bottom' => 'padding-bottom: %s',
    'padding_start'  => 'padding-inline-start: %s',
    'padding_end'    => 'padding-inline-end: %s',
    'margin_top'     => 'margin-top: %s',
    'margin_bottom'  => 'margin-bottom: %s',
    'margin_start'   => 'margin-inline-start: %s',
    'margin_end'     => 'margin-inline-end: %s',
  ];
 
  foreach ($options as $name => $value) {
    if (empty($atts[$name])) continue;

    $style[] = sprintf($value, $atts[$name]);
  }

  return $output;
}, 99, 4);

/**
 * Custom CSS
 */
add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) use (&$style) {  
  if (! empty($atts['custom_css'])) {

    // Decode
    $customCss = urldecode(base64_decode($atts['custom_css']));

    $style[] = $customCss;
  }

  return $output;
}, 99, 4);

/**
 * Style
 */
add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) use (&$style) {
  if (empty($style)) return $output;

  // Get the HTML tags from output
  preg_match('/<.*?>/', $output, $tags);

  // Extract style from the root tag only
  preg_match('/style="(.*?)"/', empty($tags) ? '' : $tags[0], $tagStyle);
  
  // Append our style to the element style if exists
  // $tagStyle = (empty($tagStyle[1]) ? '' : substr($tagStyle[1], 0, -1)) . implode('; ', $style);
  $tagStyle = (empty($tagStyle[1]) ? '' : $tagStyle[1]) . ' ' . implode('; ', $style);

  // Reset style for next element
  $style = [];

  return preg_replace('/(style=".*")?>/', 
    sprintf('style="%s">', wp_strip_all_tags($tagStyle, true)), 
    $output, 
    1
  );
}, 99, 4);

/*
|--------------------------------------------------------------------------
| Data Attributes
|--------------------------------------------------------------------------
|
| Modifies shortcode's HTML output to add data attbiutes.
|
*/

add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) {
  $dataAtts = empty($atts['attributes']) 
    ? [] 
    : explode(',', $atts['attributes']);

  $transitionAtts = shortcode_atts([
    'transition' => '',
    'transition_duration' => '',
    'transition_delay' => '',
    'transition_anchor' => '',
  ], $atts, $shortcode);

  foreach ($transitionAtts as $name => $value) {
    if (! $value) continue;

    $dataAtts[] = sprintf('data-%s="%s"', str_replace('_', '-', $name), $value);
  }

  return empty($dataAtts) 
    ? $output 
    : preg_replace('/>/', sprintf(' %s>', implode(' ', $dataAtts)), $output, 1);
}, 99, 4);

/*
|--------------------------------------------------------------------------
| Script
|--------------------------------------------------------------------------
|
| Modifies shortcode's HTML output to append script.
|
*/

add_filter('vc_shortcode_content_filter_after', function ($output, $shortcode, $atts, $content) {
  if (empty($atts['custom_js'])) return $output;

  // Generate random custom class to refer to it in our JS.
  $class = sprintf('custom-%s', mt_rand());

  $output = preg_replace('/class="(.*?)"/', sprintf('class="\1 %s"', $class), $output, 1);

  // Decode
  $js = urldecode(base64_decode($atts['custom_js']));

  // Attach script to the element's HTML output.
  $output .= sprintf(
    "<script>(() => {\nconst $0 = document.querySelector('.%s');\n%s\n})()</script>", 
    $class, 
    $js
  );

  return $output;
}, 99, 4);