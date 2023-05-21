<?php

namespace Blankcanvas\Vc\Shortcodes;

class AccordionItem extends \WPBakeryShortCode_Vc_Tta_Section {

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
    return 'accordion_item';
  }
}