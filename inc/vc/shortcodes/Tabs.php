<?php

namespace Blankcanvas\Vc\Shortcodes;

class Tabs extends \WPBakeryShortCode_Vc_Tta_Tabs {

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
    return 'tabs';
  }
}