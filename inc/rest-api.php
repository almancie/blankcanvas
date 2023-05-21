<?php

/*
|--------------------------------------------------------------------------
| Wordpress Rest API
|--------------------------------------------------------------------------
|
| Register custom end points
|
*/

// add_action('rest_api_init', function () {
//     register_rest_field('disclosure', 'meta', [
//         'get_callback' => function ($object) {
//             $meta = get_post_meta($object['id']);

//             $meta['documents'] = get_field('disclosure_document', $object['id']);

//             return $meta;
//         }
//     ]);

//     register_rest_route('blankcanvas/v1', '/breadcrumb/(?P<id>)', [
//         'methods'  => 'GET',
//         'callback' =>  function($data) {
//             return blankcanvas_get_menu_based_breadcrumb(urldecode($data->get_param('id')));
//         },
//         'args' => [
//             'id'
//         ]
//     ]);

//     register_rest_route('blankcanvas/v1', '/menu/(?P<id>\d+)', [
//         'methods'  => 'GET',
//         'callback' =>  function($data) {
//             //return wp_get_nav_menu_items($data->get_param('id'));
//         },
//         'args' => [
//             'id'
//         ]
//     ]);
// });