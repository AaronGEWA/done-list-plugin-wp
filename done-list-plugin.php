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

function dl_add_date_box() {
    $screen = 'dl_project';
    add_meta_box(
        'dl_date_box_id',
        'Abschlussdatum',
        'dl_make_date_form',
        $screen
    );
}

function dl_make_date_form( $post ) {
    ?>
    <label for="date_field">Abschlussdatum:</label>
    <input type="date" name="dl_date" id="date_field">
    <?php
}

function dl_save_project_data($post_id) {
    //Validate Data
    if(defined($_POST['dl_date']) && defined($_POST['dl_status'])) {
        echo('Echo');
    }
}

add_action('init', 'done_list_register_type');
add_action('add_meta_boxes', 'dl_add_date_box');
add_action('save_post', 'dl_save_project_data');