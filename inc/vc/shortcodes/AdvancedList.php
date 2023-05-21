<?php

namespace Blankcanvas\Vc\Shortcodes;

class AdvancedList extends \WPBakeryShortCode_Vc_Row_Inner {

  /**
   * Create instance
   */
  public function __construct($settings)
  {
    parent::__construct($settings);
  }

  /**
   * 
   */
  public function getLayoutsControl() {
    return '';
  }
}