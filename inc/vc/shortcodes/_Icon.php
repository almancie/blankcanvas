<?php

namespace Blankcanvas\Vc\Shortcodes;

class Icon extends \WPBakeryShortCode_Vc_Single_Image {

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

  //   // Title
  //   $html .= sprintf('<h4 class="element-title vc_element_title">%s</h4>', $this->settings('name'));

  //   foreach ($this->settings['params'] as $param) {
  //     $param_value = isset($atts[$param['param_name']]) ? $atts[$param['param_name']] : '';

  //     $html .= $this->singleParamHtmlHolder($param, $param_value);
  //   }

  //   return $html;
  // }

  /**
   * Create backend custom markup
   */
  // public function singleParamHtmlHolder($param, $value)
  // {
  //   $output = '';

  //   list($name, $type, $class, $holder, $adminLabel, $heading) = [
  //     $this->getParamValue($param, 'param_name'),
  //     $this->getParamValue($param, 'type'),
  //     $this->getParamValue($param, 'class'),
  //     $this->getParamValue($param, 'holder'),
  //     $this->getParamValue($param, 'admin_label'),
  //     $this->getParamValue($param, 'heading'),
  //   ];

  //   // If image
  //   if ($name === 'image' && $type === 'attach_image') {

  //     // Input
  //     $output .= sprintf(
  //       '<input type="hidden" class="wpb_vc_param_value %s %s %s" name="%s" value="%s" />', 
  //       $name, $type, $class, $name, $value
  //     );

  //     $img = wpb_getImageBySize([
  //       'attach_id' => (int) preg_replace( '/[^\d]/', '', $value),
  //       'thumb_size' => 'thumbnail',
  //     ]);

  //     // Img
  //     $imgElement = $img 
  //       ? $img['thumbnail']
  //       : $this->buildDefaultImg($name);

  //     // Img exists class
  //     $imgExists = $img && $img['p_img_large'][0] ? ' image-exists' : '';

  //     $icon = $this->settings('icon');

  //     // Icon
  //     $iconElement = sprintf('<span class="icon%s"></span>', $imgExists);

  //     // Placeholder
  //     $placeholderElement = sprintf(
  //       '<span class="vc_element-icon no_image_image%s%s"></span>',
  //       $icon ? ' ' . $icon : '',
  //       $imgExists
  //     );

  //     // Logo (images & icons holder)
  //     $this->setSettings('logo', sprintf('<div class="logo">%s%s%s</div>', $imgElement, $placeholderElement, $iconElement));

  //     // Title
  //     // $output .= sprintf(
  //     //   '<h4 class="wpb_element_title">%s%s</h4>',
  //     //   $this->settings('logo'),
  //     //   $this->settings('name'),
  //     // );

  //     // Title
  //     $titleElement = sprintf('<h4 class="wpb_element_title">%s</h4>', $this->settings('name'));

  //     $output .= $this->settings('logo') . $titleElement;

  //     // $output .= $this->outputTitleTrue($this->settings['name']);
  //   }

  //   // Holder
  //   $output .= $this->buildHolderElement($holder, $name, $type, $class, $value);

  //   // Admin label
  //   if ($adminLabel === true) {
  //     $output .= $this->buildAdminLabelElement($name, $value, $heading);
  //   }

  //   return $output;
  // }

  // /**
  //  * 
  //  */
  // public function getParamValue(array $param, $name)
  // {
  //   return empty($param[$name]) ? '' : $param[$name];
  // }

  // /**
  //  * 
  //  */
  // public function buildDefaultImg($name)
  // {
  //   return sprintf(
  //     '<img
  //       src="%s"
  //       width="150" height="150" 
  //       class="attachment-thumbnail vc_general vc_element-icon" 
  //       data-name="%s" alt="" title="" 
  //       style="display: none;" 
  //     />',
  //     esc_url(vc_asset_url('vc/blank.gif')),
  //     $name
  //   );
  // }

  // /**
  //  * Build holder element
  //  */
  // public function buildHolderElement($holder, $name, $type, $class, $value)
  // {
  //   if ($holder === '' || $holder === 'hidden') {
  //     return '';
  //   }

  //   if ($holder === 'input') {
  //     return sprintf(
  //       '<input readonly="true" class="wpb_vc_param_value %s %s %s" name="%s" value="%s" />',
  //       $name, $type, $class, $name, $value
  //     );
  //   }

  //   if ($holder === 'img') {
  //     return sprintf(
  //       '<img class="wpb_vc_param_value %s %s %s" name="%s" src="%s" />',
  //       $name, $type, $class, $name, esc_url($value)
  //     );
  //   }

  //   if ($holder === 'iframe') {
  //     return sprintf(
  //       '<img class="wpb_vc_param_value %s %s %s" name="%s" src="%s" />',
  //       $name, $type, $class, $name, esc_url($value)
  //     );
  //   }

  //   return sprintf(
  //     '<%s class="wpb_vc_param_value %s %s %s" name="%s">%s</%s>',
  //     $holder, $name, $type, $class, $name, $value, $holder
  //   );
  // }

  // /**
  //  * Build admin label
  //  */
  // public function buildAdminLabelElement($name, $value, $heading)
  // {
  //   return sprintf(
  //     '<span class="vc_admin_label admin_label_%s%s">
  //       <label>%s</label>%s
  //     </span>',
  //     $name, 
  //     ! $value ? ' hidden-label' : '', 
  //     $heading, 
  //     $value
  //   );
  // }

  /**
   * Compile outout tag attributes.
   */
  public function compileAttributes(array $attributes, array $classes, array $shortcodeAtts)
  {
    // Filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG
    $classes = apply_filters(
      VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
      implode(' ', array_filter(array_unique($classes))), 
      $this->settings['base'], 
      $shortcodeAtts
    );

    // Add classes to the list of attributes
    $attributes[] = sprintf('class="%s"', $classes);

    return implode(' ', $attributes);
  }
}