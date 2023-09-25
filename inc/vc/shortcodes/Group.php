<?php

namespace Blankcanvas\Vc\Shortcodes;

class Group extends \WPBakeryShortCodesContainer {

  /**
   * Create instance
   */
  public function __construct($settings) {
    // $settings['controls'] = [
    //   'move', 
    //   'toggle', 
    //   'edit', 
    //   'clone', 
    //   'delete'
    // ];

    parent::__construct($settings);
  }

  /**
   * 
   */
  // public function getLayoutsControl() {
  //   return '';
  // }
}