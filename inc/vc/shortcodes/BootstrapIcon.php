<?php

namespace Blankcanvas\Vc\Shortcodes;

class BootstrapIcon extends \WPBakeryShortCode {

  /**
   * Create instance
   */
  public function __construct($settings)
  {
    parent::__construct($settings);
  }

  /**
   * Create parameters HTML
   */
  // public function paramsHtmlHolders($atts)
  // {
  //   if (! isset($this->settings['params']) || ! is_array($this->settings['params'])) {
  //     return '';
  //   }

  //   $html = '';

  //   $icon = sprintf(
  //     '<img
  //       src="%s"
  //       width="150" height="150" 
  //       class="attachment-thumbnail vc_general vc_element-icon" 
  //       data-name="icon_name" alt="" title="" 
  //     />',
  //     esc_url(vc_asset_url('vc/blank.gif')),
  //   );

  //   $img = '<span class="no_image_image vc_element-icon icon-wpb-single-image"></span>';

  //   // Title
  //   $html .= sprintf('<h4 class="wpb_element_title">%s%s%s</h4>', $this->settings('name'), $icon, $img);

  //   foreach ($this->settings['params'] as $param) {
  //     $param_value = isset($atts[$param['param_name']]) ? $atts[$param['param_name']] : '';

  //     $html .= $this->singleParamHtmlHolder($param, $param_value);
  //   }

  //   return $html;
  // }

  /**
   * Compile outout tag attributes.
   */
  // public function compileAttributes(array $attributes, array $classes, array $shortcodeAtts)
  // {
  //   // Filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG
  //   $classes = apply_filters(
  //     VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
  //     implode(' ', array_filter(array_unique($classes))), 
  //     $this->settings['base'], 
  //     $shortcodeAtts
  //   );

  //   // Add classes to the list of attributes
  //   $attributes[] = sprintf('class="%s"', $classes);

  //   return implode(' ', $attributes);
  // }
}