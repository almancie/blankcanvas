<?php

namespace Blankcanvas\Vc\Shortcodes;

class Glide extends \WPBakeryShortCode_Vc_Row {

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