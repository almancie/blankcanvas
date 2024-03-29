<?php

namespace Blankcanvas\Vc\Shortcodes;

class RowInnerInner extends \WPBakeryShortCode_Vc_Row_Inner {

  /**
   * Create instance
   */
  public function __construct($settings) {
    parent::__construct($settings);
  }

  /**
   * Create row layout options
   */
  public function getLayoutsControl() {
    $vc_row_layouts = [
      [
        'cells' => '11',
        'mask' => '12',
        'title' => '1/1',
        'icon_class' => '1-1',
      ],
      [
        'cells' => '12_12',
        'mask' => '26',
        'title' => '1/2 + 1/2',
        'icon_class' => '1-2_1-2',
      ], 
      [
        'cells' => '23_13',
        'mask' => '29',
        'title' => '2/3 + 1/3',
        'icon_class' => '2-3_1-3',
      ], 
      [
        'cells' => '13_13_13',
        'mask' => '312',
        'title' => '1/3 + 1/3 + 1/3',
        'icon_class' => '1-3_1-3_1-3',
      ], 
      [
        'cells' => '14_14_14_14',
        'mask' => '420',
        'title' => '1/4 + 1/4 + 1/4 + 1/4',
        'icon_class' => '1-4_1-4_1-4_1-4',
      ],
      [
        'cells' => '14_34',
        'mask' => '212',
        'title' => '1/4 + 3/4',
        'icon_class' => '1-4_3-4',
      ], 
      [
        'cells' => '14_12_14',
        'mask' => '313',
        'title' => '1/4 + 1/2 + 1/4',
        'icon_class' => '1-4_1-2_1-4',
      ], 
    ]; 

    $controls_layout = '<span class="vc_row_layouts vc_control">';

    foreach ( $vc_row_layouts as $layout ) {
      $controls_layout .= '<a class="vc_control-set-column set_columns" data-cells="' . $layout['cells'] . '" data-cells-mask="' . $layout['mask'] . '" title="' . $layout['title'] . '"><i class="vc-composer-icon vc-c-icon-' . $layout['icon_class'] . '"></i></a> ';
    }

    $controls_layout .= '<br/><a class="vc_control-set-column set_columns custom_columns" data-cells="custom" data-cells-mask="custom" title="' . esc_attr__( 'Custom layout', 'js_composer' ) . '">' . esc_html__( 'Custom', 'js_composer' ) . '</a> ';

    $controls_layout .= '</span>';

    return $controls_layout;
  }
}