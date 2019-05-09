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


// Font Size Mobile
wp.customize( 'typography--sidebar--font-size', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--sidebar--font-size',
                value: to,
                screen: 'default'
            });
        });
    });
});


// Line Height Mobile
wp.customize( 'typography--sidebar--line-height', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--sidebar--line-height',
                value: to,
                screen: 'default'
            });
            if( !to.includes('px') ) {
                to += 'em';
            }
            rootstrap.var({
                name: 'typography--sidebar--block-spacing',
                value: to,
                screen: 'default'
            });
        });
    });
});


// Font Size Tablet
wp.customize( 'typography--sidebar--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--sidebar--font-size',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Line Height Tablet
wp.customize( 'typography--sidebar--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--sidebar--line-height',
                value: to,
                screen: 'tablet-and-up'
            });
            if( !to.includes('px') ) {
                to += 'em';
            }
            rootstrap.var({
                name: 'typography--sidebar--block-spacing',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Font Size Desktop
wp.customize( 'typography--sidebar--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--sidebar--font-size',
                value: to,
                screen: 'desktop'
            });
        });
    });
});


// Line Height Desktop
wp.customize( 'typography--sidebar--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--sidebar--line-height',
                value: to,
                screen: 'desktop'
            });
            if( !to.includes('px') ) {
                to += 'em';
            }
            rootstrap.var({
                name: 'typography--sidebar--block-spacing',
                value: to,
                screen: 'desktop'
            });
        });
    });
});
