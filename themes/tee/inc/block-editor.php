<?php
/**
 * Functions which enhance the theme by hooking into the block editor
 *
 * @package Salted_Tee
 */

function tee_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'block-editor-script',
        get_template_directory_uri() . '/assets/js/block-editor.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
        filemtime( get_template_directory() . '/assets/js/block-editor.js', )
    );
}
add_action( 'enqueue_block_editor_assets', 'tee_enqueue_block_editor_assets' );


function tee_enqueue_block_assets() {
    wp_enqueue_style( 
        'block-editor-style',
        get_template_directory_uri() . '/assets/css/block-editor.css'
    );
}
add_action( 'enqueue_block_assets', 'tee_enqueue_block_assets' );