<?php

namespace Blankcanvas;

class PostType
{
  protected $name;

  protected $singular;

  protected $plural;

  protected $settings;

  protected $taxonomies = [];

  public function __construct($name, $singular = null, $plural = null, array $settings = [])
  {
    $this->name = $name;

    $this->singular = $singular;

    $this->plural = $plural;

    $this->settings = $settings;
  }

  public function tax($name, $singular = null, $plural = null, array $settings = []) {
    $this->taxonomies[] = new PostType\Taxonomy($name, $singular ?: $name, $plural ?: $name . 's', $settings, $this);

    return $this;
  }

  function register()
  {
    $singular = $this->singular ?: $this->name;

    $plural = $this->plural ?: $this->name . 's';

    $ucSingular = ucwords($singular);

    $ucPlural = ucwords($plural);

    $labels = [
      "name"                  => _x( "$ucPlural", null, "blankcanvas" ),
      "singular_name"         => _x( "$ucSingular", null, "blankcanvas" ),
      "menu_name"             => _x( "$ucPlural", null, "blankcanvas" ),
      "name_admin_bar"        => _x( "$ucSingular", null, "blankcanvas" ),
      "add_new"               => __( "Add New", "blankcanvas" ),
      "add_new_item"          => __( "Add New $ucSingular", "blankcanvas" ),
      "new_item"              => __( "New $ucSingular", "blankcanvas" ),
      "edit_item"             => __( "Edit $ucSingular", "blankcanvas" ),
      "view_item"             => __( "View $ucSingular", "blankcanvas" ),
      "all_items"             => __( "All $ucPlural", "blankcanvas" ),
      "search_items"          => __( "Search $ucPlural", "blankcanvas" ),
      "parent_item_colon"     => __( "Parent $ucSingular:", "blankcanvas" ),
      "not_found"             => __( "No {$plural} found.", "blankcanvas" ),
      "not_found_in_trash"    => __( "No {$plural} found in Trash.", "blankcanvas" ),
      "featured_image"        => _x( "$ucSingular Cover Image", null, "blankcanvas" ),
      "set_featured_image"    => _x( "Set {$singular} cover image", null, "blankcanvas" ),
      "remove_featured_image" => _x( "Remove {$singular} cover image", null, "blankcanvas" ),
      "use_featured_image"    => _x( "Use as cover image", null, "blankcanvas" ),
      "archives"              => _x( "$ucSingular archives", null, "blankcanvas" ),
      "insert_into_item"      => _x( "Insert into {singular}", null, "blankcanvas" ),
      "uploaded_to_this_item" => _x( "Uploaded to this {singular}", null, "blankcanvas" ),
      "filter_items_list"     => _x( "Filter {$plural} list", null, "blankcanvas" ),
      "items_list_navigation" => _x( "$ucPlural list navigation", null, "blankcanvas" ),
      "items_list"            => _x( "$ucPlural list", null, "blankcanvas" ),
    ];

    $settings = array_merge_recursive([
      "labels"             => $labels,
      "public"             => true,
      "query_var"          => true,
      "rewrite"            => [
        "slug"                  => str_replace(' ', '-', $plural)
      ],
      "capability_type"    => "post",
      "has_archive"        => true,
      "hierarchical"       => true,
      "supports"           => [
        "title", 
        "editor", 
        // "author", 
        "thumbnail", 
        "excerpt", 
        // "comments"
      ]
    ], $this->settings);

    register_post_type($this->name, $settings);

    foreach ($this->taxonomies as $taxonomy) {
      $taxonomy->register();
    }
  }

  public function getName()
  {
    return $this->name;
  }

  public function getTaxonomies()
  {
    return $this->taxonomies;
  }
}