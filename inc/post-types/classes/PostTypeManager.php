<?php

namespace Blankcanvas;

class PostTypeManager
{
  protected $postTypes = [];

  public function Add($name, $singular = null, $plural = null, array $settings = [])
  {
    $postType = new PostType($name, $singular, $plural, $settings);

    $this->postTypes[] = $postType;

    return $postType;
  }

  function registerAll()
  {
    foreach ($this->postTypes as $postType) {
      $postType->register();
    }
  }
}