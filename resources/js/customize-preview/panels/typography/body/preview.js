/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


// Text Color
wp.customize( 'typography--body--text-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'typography--body--text-color',
            value: to
        });
    });
});


// Font Family
wp.customize( 'typography--body--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'typography--body--font-family',
            value: to,
            screen: 'default'
        });
    });
});


// Font Size Mobile
wp.customize( 'typography--body--font-size', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--body--font-size',
                value: to,
                screen: 'default'
            });
        });
    });
});


// Line Height Mobile
wp.customize( 'typography--body--line-height', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--body--line-height',
                value: to,
                screen: 'default'
            });
            if( !to.includes('px') ) {
                to += 'em';
            }
            rootstrap.var({
                name: 'typography--body--block-spacing',
                value: to,
                screen: 'default'
            });
        });
    });
});


// Font Size Tablet
wp.customize( 'typography--body--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--body--font-size',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Line Height Tablet
wp.customize( 'typography--body--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--body--line-height',
                value: to,
                screen: 'tablet-and-up'
            });
            if( !to.includes('px') ) {
                to += 'em';
            }
            rootstrap.var({
                name: 'typography--body--block-spacing',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Font Size Desktop
wp.customize( 'typography--body--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--body--font-size',
                value: to,
                screen: 'desktop'
            });
        });
    });
});


// Line Height Desktop
wp.customize( 'typography--body--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--body--line-height',
                value: to,
                screen: 'desktop'
            });
            if( !to.includes('px') ) {
                to += 'em';
            }
            rootstrap.var({
                name: 'typography--body--block-spacing',
                value: to,
                screen: 'desktop'
            });
        });
    });
});
