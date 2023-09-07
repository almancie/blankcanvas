<?php

add_action('acf/include_fields', function() {
  if (! function_exists('acf_add_local_field_group')) {
    return;
  }

  // Header menu item
  acf_add_local_field_group([
    'key' => 'group_64bbe70d093b6',
    'title' => 'Header Menu Item',
    'fields' => [
      [
        'key' => 'field_64bbe70d4a72f',
        'label' => 'Icon',
        'name' => 'menu_item_icon',
        'aria-label' => '',
        'type' => 'text',
        'instructions' => 'Bootstrap Icons (Ver.1.9.1). For available icons click <a target="_blank" href="https://icons.getbootstrap.com/">here</a>.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => [
          'width' => '',
          'class' => '',
          'id' => '',
        ],
        'default_value' => '',
        'maxlength' => '',
        'placeholder' => 'e.g. telephone',
        'prepend' => '',
        'append' => '',
      ],
      [
        'key' => 'field_64bbe985cb5c4',
        'label' => 'Desciption',
        'name' => 'menu_item_desc',
        'aria-label' => '',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => [
          'width' => '',
          'class' => '',
          'id' => '',
        ],
        'default_value' => '',
        'maxlength' => '',
        'rows' => 2,
        'placeholder' => '',
        'new_lines' => 'br',
      ],
    ],
    'location' => [
      [
        [
          'param' => 'nav_menu_item',
          'operator' => '==',
          'value' => 'location/menu-1',
        ],
      ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'field',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ]);
});