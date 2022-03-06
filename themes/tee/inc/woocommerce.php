<?php
/**
 * Functions which enhance the theme by hooking into woocommerce
 *
 * @package Salted_Tee
 */

//  Allow block editor for single product pages
function tee_use_block_editor_for_post_type( $use_block_editor, $post_type ) {
    if ( 'product'=== $post_type ) {
        $use_block_editor = true;
    }
    return $use_block_editor;
}
add_filter( 'use_block_editor_for_post_type', 'tee_use_block_editor_for_post_type', 10, 2 );

// Disable the default styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
// Add Product Title
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 4 );
// Add File Sumbission option
function tee_template_submit_file() {
    echo '<p>this is where the file submit btn goes</p>';
}
add_action( 'woocommerce_single_variation', 'tee_template_submit_file', 4 );
