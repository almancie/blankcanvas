<?php

namespace Blankcanvas\Vc\Shortcodes;

class Group extends \WPBakeryShortCode_Vc_Row {

  /**
   * Create instance
   */
  public function __construct($settings) {
    $settings['controls'] = [
      'move', 
      'toggle', 
      'edit', 
      'clone', 
      'delete'
    ];

    parent::__construct($settings);
  }

  /**
   * 
   */
  // public function getLayoutsControl() {
  //   return '';
  // }
}