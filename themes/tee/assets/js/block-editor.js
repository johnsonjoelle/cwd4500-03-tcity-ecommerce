// * Quote Blocks
// Add style
wp.blocks.registerBlockStyle( 'core/quote', {
    name: 'fancy-quote',
    label: 'Fancy Quote',
} );

// Unregister Style
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );
} );