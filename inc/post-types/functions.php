<?php

/*
|--------------------------------------------------------------------------
| Classes
|--------------------------------------------------------------------------
|
| Includes utility classes to be used for post types registration
|
*/

require THEME_DIR . '/inc/post-types/classes/Taxonomy.php';

require THEME_DIR . '/inc/post-types/classes/PostType.php';

require THEME_DIR . '/inc/post-types/classes/PostTypeManager.php';

/*
|--------------------------------------------------------------------------
| Custom Post Types & Taxonomies Registration
|--------------------------------------------------------------------------
|
| Registers custom post types.
|
*/

// $manager = new Blankcanvas\PostTypeManager();

// $manager->add('event')
//   ->tax('event-category', 'category', 'categories')
//   ->tax('event-location', 'location', 'locations');

// // Register all post types and their taxonomies.
// $manager->registerAll();