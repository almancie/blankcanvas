<?php

namespace Blankcanvas\PostType;

class Taxonomy
{
  protected $name;

  protected $singular;

  protected $plural;

  protected $settings;

  protected $postType;

  public function __construct($name, $singular, $plural, array $settings = [], $postType)
  {
    $this->name = $name;

    $this->singular = $singular;

    $this->plural = $plural;

    $this->settings = $settings;

    $this->postType = $postType;
  }

  public function register()
  {
    $singular = $this->singular ?: $this->name;

    $plural = $this->plural ?: $this->name . 's';

    $ucSingular = ucwords($singular);

    $ucPlural = ucwords($plural);

    $labels = [
      "name"                       => _x("{$ucPlural}", null, "blankcanvas"),
      "singular_name"              => _x("{$ucSingular}", null, "blankcanvas"),
      "search_items"               => __("Search {$ucPlural}", "blankcanvas"),
      "popular_items"              => __("Popular {$ucPlural}", "blankcanvas"),
      "all_items"                  => __("All {$ucPlural}", "blankcanvas"),
      "parent_item"                => null,
      "parent_item_colon"          => null,
      "edit_item"                  => __("Edit {$ucSingular}", "blankcanvas"),
      "update_item"                => __("Update {$ucSingular}", "blankcanvas"),
      "add_new_item"               => __("Add New {$ucSingular}", "blankcanvas"),
      "new_item_name"              => __("New {$ucSingular} Name", "blankcanvas"),
      "separate_items_with_commas" => __("Separate {$ucPlural} with commas", "blankcanvas"),
      "add_or_remove_items"        => __("Add or remove {$plural}", "blankcanvas"),
      "choose_from_most_used"      => __("Choose from the most used {$plural}", "blankcanvas"),
      "not_found"                  => __("No {$plural} found.", "blankcanvas"),
      "menu_name"                  => __("{$ucPlural}", "blankcanvas"),
    ];

    $settings = array_merge_recursive([
      "labels"                => $labels,
      "rewrite"               => [
        "slug"                       => $this->name,
      ],
      "update_count_callback" => "_update_post_term_count",
      "hierarchical"          => true,
      "public"                => true,
    ], $this->settings);

    register_taxonomy($this->name, $this->postType->getName(), $settings);
  }
}