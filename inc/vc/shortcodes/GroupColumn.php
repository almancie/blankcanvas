<?php

namespace Blankcanvas\Vc\Shortcodes;

class GroupColumn extends \WPBakeryShortCode_Vc_Column {

  /**
   * Create instance
   */
  public function __construct($settings) {
    $settings['controls'] = ['add'];

    parent::__construct($settings);
  }
}