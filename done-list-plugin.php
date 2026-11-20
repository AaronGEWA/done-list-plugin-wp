<?php
/**
 * Plugin Name: Done List Plugin
 * Description: A Plugin to record completed projects
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function done_list_register_type() {
    $args = array(
        'labels' => array(
            'name'          => 'Projects',
            'singular_name' => 'Project',
            'add_new'       => 'Add New Project',
            'add_new_item'  => 'Add New Project'
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor', 'author', 'custom-fields'),
    );

    register_post_type( 'dl_project', $args);
    //Register the taxonomy
    $args = array(
        'labels' => array(
            'name' => 'Status',
            'edit_item' => 'Edit Status',
            'menu_name' => 'Status',
            'update_item' => 'Change Status',
            'add_new_item' => 'Add New Status'
        ),
        'hierarchical'  => true,
        'rewrite'       => array('slug' => 'status'),
        'show_in_rest'  => true
    );
    register_taxonomy('dl_status', 'dl_project', $args);
}

function done_list_add_date_form($keys, $post) {
    if ($post->post_type === 'dl_project') {
        $keys = ['Completion date'];
    }
    return $keys;
}

add_action('init', 'done_list_register_type');
add_filter('postmeta_form_keys', 'done_list_add_date_form', 10, 2);