<?php

namespace Blankcanvas\Vc\Shortcodes;

class Accordion extends \WPBakeryShortCode_Vc_Tta_Accordion {

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
    return 'accordion';
  }
}