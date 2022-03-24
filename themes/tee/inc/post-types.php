<?php
/**
 * Functions which enhance the theme by creating custom post types
 * 
 * @package Salted_Tee
 */

function tee_post_types() {
    $labels = array(
        'name'                  => _x( 'Designs', 'Post type general name', 'tee' ),
        'singular_name'         => _x( 'Design', 'Post type singular name', 'tee' ),
        'menu_name'             => _x( 'Designs', 'Admin Menu text', 'tee' ),
        'name_admin_bar'        => _x( 'Design', 'Add New on Toolbar', 'tee' ),
        'add_new'               => __( 'Add New', 'tee' ),
        'add_new_item'          => __( 'Add New design', 'tee' ),
        'new_item'              => __( 'New design', 'tee' ),
        'edit_item'             => __( 'Edit design', 'tee' ),
        'view_item'             => __( 'View design', 'tee' ),
        'all_items'             => __( 'All designs', 'tee' ),
        'search_items'          => __( 'Search designs', 'tee' ),
        'parent_item_colon'     => __( 'Parent designs:', 'tee' ),
        'not_found'             => __( 'No designs found.', 'tee' ),
        'not_found_in_trash'    => __( 'No designs found in Trash.', 'tee' ),
        'featured_image'        => _x( 'Design Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'tee' ),
        'set_featured_image'    => _x( 'Set design image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'tee' ),
        'remove_featured_image' => _x( 'Remove design image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'tee' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'tee' ),
        'archives'              => _x( 'Design archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'tee' ),
        'insert_into_item'      => _x( 'Insert into design', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'tee' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this design', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'tee' ),
        'filter_items_list'     => _x( 'Filter designs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'tee' ),
        'items_list_navigation' => _x( 'Designs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'tee' ),
        'items_list'            => _x( 'Designs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'tee' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Design custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'design' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
    );
    
    register_post_type( 'tee_design', $args );
}
add_action( 'init', 'tee_post_types' );