<?php

/*
|--------------------------------------------------------------------------
| Uploads URL
|--------------------------------------------------------------------------
|
| Generates uploads URL
|
*/

// add_shortcode('uploads', fn () => wp_get_upload_dir()['baseurl']);

/*
|--------------------------------------------------------------------------
| Shared Attributes
|--------------------------------------------------------------------------
|
| Shared attributes amongst multiple shortcodes.
|
*/

// $sharedAtts = [

//   // Transition
//   'transition' => '',
//   'transition_custom_timing' => '',
//   'transition_duration' => '',
//   'transition_delay' => '',

//   // Custom CSS
//   'custom_css' => '',

//   // Extra design options
//   // 'border_width' => '',
//   // 'border_color' => '',
//   // 'border_custom_color' => '',
//   // 'border_radius' => '',
//   // 'box_shadow' => '',
// ];

/*
|--------------------------------------------------------------------------
| Shortcodes
|--------------------------------------------------------------------------
|
| Adds custom theme shortcodes.
|
*/

// $shortcodes = [
//   'section',
//   'row',
//   // 'column',
// ];

// foreach ($shortcodes as $shortcode) {
//   add_shortcode($shortcode, function($atts, $content) use ($shortcode) {
//     $output = include THEME_DIR . sprintf('/inc/shortcodes/templates/%s.php', $shortcode);

//     // Filter: 'vc_shortcode_content_filter_after'
//     return apply_filters(
//       'vc_shortcode_content_filter_after', 
//       $output,         // Shortcode html output
//       $shortcode,      // Shortcode name
//       $atts,           // Shortcode attributes
//       $content         // Shortcode content
//     );
//   });
// }

// /*
// |--------------------------------------------------------------------------
// | Column
// |--------------------------------------------------------------------------
// |
// | 
// |
// */

// // add_shortcode('blankcanvas_column', function($atts, $content) use ($sharedAtts) {
// //   return 'test';

// //   // Prepare defaults
// //   // $atts = shortcode_atts(array_merge([
// //   //   'text' => '',
// //   //   'style' => '',
// //   //   'color' => 'color-1',
// //   //   'link' => '',
// //   // ], $sharedAtts), $atts, 'blankcanvas_button');

// //   // extract($atts);

// //   // return apply_filters(
// //   //   'vc_shortcode_content_filter_after', 
// //   //   sprintf(
// //   //     '<a href="%1$s" class="blankcanvas-button btn btn-%2$s%3$s">%4$s</a>', 
// //   //     $link, $style, $color, $text
// //   //   ),
// //   //   'blankcanvas_button',
// //   //   $atts,
// //   //   $content
// //   // );
// // });

// /*
// |--------------------------------------------------------------------------
// | Button
// |--------------------------------------------------------------------------
// |
// | Adds a button component built on Bootstrap (5).
// |
// */

// add_shortcode('blankcanvas_button', function($atts, $content) use ($sharedAtts) {

//   // Prepare defaults
//   $atts = shortcode_atts(array_merge([
//     'text' => '',
//     'style' => '',
//     'color' => 'color-1',
//     'link' => '',
//   ], $sharedAtts), $atts, 'blankcanvas_button');

//   extract($atts);

//   if (function_exists('vc_build_link')) {
//     $link = vc_build_link($link)['url'];
//   }

//   return apply_filters(
//     'vc_shortcode_content_filter_after', 
//     sprintf(
//       '<a href="%1$s" class="blankcanvas-button btn btn-%2$s%3$s">%4$s</a>', 
//       $link, $style, $color, $text
//     ),
//     'blankcanvas_button',
//     $atts,
//     $content
//   );
// });

// /*
// |--------------------------------------------------------------------------
// | Icon
// |--------------------------------------------------------------------------
// |
// | Adds icon component built on Bootstrap Icons.
// |
// */

// add_shortcode('blankcanvas_icon', function($atts, $content) use ($sharedAtts) {

//   // Prepare defaults
//   $atts = shortcode_atts(array_merge([
//     'name' => '',
//     'size' => 'md',
//     'class' => '',
//     'css' => ''
//   ], $sharedAtts), $atts, 'blankcanvas_icon');

//   extract($atts);

//   // $vcCustomClass = vc_shortcode_custom_css_class($css);

//   // if (str_contains($vcCustomClass, 'border-')) {
//   //   $vcCustomClass .= " border-color: var(--border-color)";
//   // }

//   // $class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts);

//   $css = preg_replace('/(.*){(.*)}/', '\2', $css, 1);

//   $output = sprintf(
//     '<i class="blankcanvas-icon blankcanvas-icon-%s bi-%s%s wpb_content_element" style="%s"></i>', 
//     $size, $name, $class ? ' ' . $class : '', $css
//   );

//   return apply_filters(
//     'vc_shortcode_content_filter_after', 
//     $output,
//     'blankcanvas_icon',
//     $atts,
//     $content
//   );
// });

// /*
// |--------------------------------------------------------------------------
// | Image
// |--------------------------------------------------------------------------
// |
// | Adds icon component built on Bootstrap Icons.
// |
// */

// add_shortcode('blankcanvas_image', function($atts, $content) use ($sharedAtts) {

//   // Prepare defaults
//   $atts = shortcode_atts(array_merge([
//     'image' => '',
//     'img_size' => 'thumbnail',
//   ], $sharedAtts), $atts, 'blankcanvas_image');

//   extract($atts);

//   $output = sprintf(
//     '<img src="%s" class="attachment-%s" />', 
//     wp_get_attachment_image_url($image, $img_size),
//     $img_size
//   );

//   return apply_filters(
//     'vc_shortcode_content_filter_after', 
//     $output,
//     'blankcanvas_image',
//     $atts,
//     $content
//   );
// });

// /*
// |--------------------------------------------------------------------------
// | Tabs
// |--------------------------------------------------------------------------
// |
// | Adds a tabs component built on Bootstrap (5).
// |
// */

// add_shortcode('blankcanvas_tabs', function($atts, $content) use ($sharedAtts) {

//   // Prepare defaults
//   $atts = shortcode_atts(array_merge([
//     'active_section' => '1',
//     'alignment' => '',
//     'style' => 'tabs',
//     'el_class' => '',
//     'nav_items_class' => '',
//     'nav_btn_class' => '',
//     'nav_tab_class' => '',
//   ], $sharedAtts), $atts, 'blankcanvas_tabs');

//   extract($atts);

//   // Replaces WPBakery section shortcode tag with our own.
//   $content = preg_replace('/vc_tta_section/', 'blankcanvas_tab', $content);

//   // Get section list
//   $content = preg_split('/(?=\[blankcanvas_tab)/', $content, -1, PREG_SPLIT_NO_EMPTY);

//   $navTabs = [];

//   foreach ($content as $key => &$tab) {
//     $active = ($key + 1 == $active_section);

//     // Get optional atts
//     $tabOptionalAtts = sprintf('%s%s', $active ? ' active="true"' : '', $nav_tab_class ? sprintf(' nav_tab_class="%s"', $nav_tab_class) : '');

//     // Attach optional atts to child
//     $tab = str_replace('[blankcanvas_tab', sprintf('[blankcanvas_tab%s', $tabOptionalAtts), $tab);

//     $matches = [];

//     // Get the shortcode without the content inside.
//     preg_match('/(\[blankcanvas_tab (.*?)\])/', $tab, $matches);

//     // Convert shortcode attributes into assoc array.
//     $sectionAtts = shortcode_parse_atts($matches[2]);

//     // Prepare defaults
//     $sectionAtts = shortcode_atts([
//       'title' => '',
//       'tab_id' => '',
//       'active' => 'false',
//     ], $sectionAtts, 'blankcanvas_tabs');

//     $navTabs[] = sprintf(
//       '<li class="nav-item">
//         <button class="nav-link%s%s" id="tab-%s" data-bs-toggle="tab" data-bs-target="#tab-%s-pane" type="button" role="tab" aria-controls="#tab-%s" aria-selected=="%s">%s</button>
//       </li>', 
//       $active ? ' active' : '', $nav_btn_class ? ' '.$nav_btn_class : '', $sectionAtts['tab_id'], $sectionAtts['tab_id'], $sectionAtts['tab_id'], $active, $sectionAtts['title']
//     );
//   }

//   $content = implode('', $content);

//   $content = wpb_js_remove_wpautop($content, true);

//   $output = apply_filters(
//     'vc_shortcode_content_filter_after',
//     sprintf('<div class="blankcanvas-tabs%s wpb_content_element">', $el_class ? ' '.$el_class : ''),
//     'blankcanvas_tabs',
//     $atts,
//     $content
//   );

//   $output .= sprintf(
//     '<ul class="nav%s%s%s" role="tablist">', 
//     $atts['style'] ? ' nav-'.$atts['style'] : '', 
//     $atts['alignment'] ? ' justify-content-'.$atts['alignment'] : '', 
//     $nav_items_class ? ' '.$nav_items_class : ''
//   );

//   $output .= implode('', $navTabs);
//   $output .= '</ul>';
//   $output .= '<div class="tab-content">';
//   $output .= $content;
//   $output .= '</div>';
//   $output .= '</div>';

//   return $output;
// });

// /*
// |--------------------------------------------------------------------------
// | Tab Section
// |--------------------------------------------------------------------------
// |
// | Adds a tab section built on Bootstrap (5).
// |
// */

// add_shortcode('blankcanvas_tab', function($atts, $content) {
//   $content = wpb_js_remove_wpautop($content, true);

//   $atts = shortcode_atts([
//     'tab_id' => '',
//     'active' => 'false',
//     'nav_tab_class' => ''
//   ], $atts, 'blankcanvas_tab');

//   extract($atts);

//   return sprintf('<div class="tab-pane fade%s%s" id="tab-%s-pane"  role="tabpanel" tabindex="0">%s</div>', $active === 'true' ? ' show active' : '', $nav_tab_class ? ' '.$nav_tab_class : '', $tab_id, $content);
// });

// /*
// |--------------------------------------------------------------------------
// | Accordion
// |--------------------------------------------------------------------------
// |
// | Adds accordion component built on Bootstrap (5).
// |
// */

// add_shortcode('blankcanvas_accordion', function($atts, $content) use ($sharedAtts) {

//   // Prepare defaults
//   $atts = shortcode_atts(array_merge([
//     'active_section' => '1',
//     'alignment' => '',
//     'el_class' => '',
//     'section_title_tag' => 'p',
//     'flush' => false,
//     'title_class' => '',
//     'body_class' => '',
//   ], $sharedAtts), $atts, 'blankcanvas_accordion');

//   extract($atts);

//   // Replaces WPBakery section shortcode tag with our own.
//   $content = preg_replace('/vc_tta_section/', 'blankcanvas_accordion_item', $content);

//   $content = preg_split('/(?=\[blankcanvas_accordion_item)/', $content, -1, PREG_SPLIT_NO_EMPTY);

//   foreach ($content as $key => &$section) {
//     $active = ($key + 1 == $active_section);

//     // Get section atts
//     $sectionAtts = sprintf(
//       'active="%s" section_title_tag="%s" flush="%s" title_class="%s" body_class="%s"',
//       $active, $section_title_tag, $flush, $title_class, $body_class
//     );

//     // Pass section atts from parent to child
//     $section = str_replace('[blankcanvas_accordion_item', sprintf('[blankcanvas_accordion_item %s', $sectionAtts), $section);
//   }

//   $content = implode('', $content);

//   $content = wpb_js_remove_wpautop($content, true);

//   $output = apply_filters(
//     'vc_shortcode_content_filter_after',
//     sprintf(
//       '<div class="blankcanvas-accordion accordion%s%s wpb_content_element">%s</div>', 
//       $flush ? ' accordion-flush' : '', $el_class ? ' '.$el_class : '', $content
//     ),
//     'blankcanvas_accordion',
//     $atts,
//     $content,
//   );

//   return $output;
// });

// /*
// |--------------------------------------------------------------------------
// | Accordion Section
// |--------------------------------------------------------------------------
// |
// | Adds accordion section built on Bootstrap (5).
// |
// */
// add_shortcode('blankcanvas_accordion_item', function($atts, $content) {
//   $content = wpb_js_remove_wpautop($content, true);

//   $atts = shortcode_atts([
//     'title' => '',
//     'tab_id' => '',
//     'active' => false,
//     'section_title_tag' => 'p',
//     'flush' => false,
//     'title_class' => '',
//     'body_class' => '',
//   ], $atts, 'blankcanvas_accordion');

//   extract($atts);

//   $tab_id = 'panel-'.$tab_id;

//   $output = '<div class="accordion-item">';
//   $output .= sprintf(
//     '<%s class="accordion-header" aria-labelledby="heading-%s">', 
//     $section_title_tag, $tab_id
//   );
//   $output .= sprintf(
//     '<button class="accordion-button%s%s" type="button" data-bs-toggle="collapse" data-bs-target="#%s" aria-expanded="%s" aria-controls="%s" style="font-size: inherit;">%s</button>', 
//     $active ? '' : ' collapsed', $title_class ? ' ' . $title_class : '', $tab_id, $active, $tab_id, $title
//   );
//   $output .= sprintf('</%s>', $section_title_tag);
//   $output .= sprintf(
//     '<div id="%s" class="accordion-collapse collapse%s" aria-labelledby="heading-%s"><div class="accordion-body%s">%s</div></div>',
//     $tab_id, $active ? ' show' : '', $tab_id, $body_class ? ' ' . $body_class : '', $content
//   );
//   $output .= '</div>';

//   return $output;
// });