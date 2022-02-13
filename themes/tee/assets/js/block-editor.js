// * Quote Blocks
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );
} );

// * Table Blocks
wp.blocks.registerBlockStyle( 'core/table', {
    name: 'redheader-table',
    label: 'Red Header',
} );
wp.blocks.registerBlockStyle( 'core/table', {
    name: 'blueheader-table',
    label: 'Blue Header',
} );
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/table', 'stripes' );
} );

// * Image Blocks
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
} );

// * Media & Text Blocks
wp.blocks.registerBlockStyle( 'core/media-text', {
    name: 'border-left-meditxt',
    label: 'Border Text Left',
} );

// * Button Blocks
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
} );

// * Column Blocks
wp.blocks.registerBlockStyle( 'core/column', {
    name: 'blue-column',
    label: 'Blue Border Left',
} );
wp.blocks.registerBlockStyle( 'core/column', {
    name: 'red-column',
    label: 'Red Border Left',
} );
