<?php

namespace Blankcanvas\Vc\Shortcodes;

class Panel extends \WPBakeryShortCode_Vc_Tta_Section {

  /**
   * Create instance
   */
  public function __construct($settings)
  {
    parent::__construct($settings);
  }

  /**
   * Get file name
   */
  public function getFileName ()
  {
    return 'panel';
  }
}