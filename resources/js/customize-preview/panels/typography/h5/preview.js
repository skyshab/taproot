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

import * as utils from '../../../functions-customize-preview.js';


// Text Color
wp.customize( 'typography--h5--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h5--color',
            selector: 'h5',
            styles: {
                'color': to
            }
        });
    });
});


// Font Family
wp.customize( 'typography--h5--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h5--font-family',
            selector: 'h5',
            styles: {
                'font-family': to
            }
        });
    });
});


// Font Styles
wp.customize( 'typography--h5--font-styles', function( value ) {
    value.bind( function( to ) {

        var h5Styles = utils.taprootFontStyles(to);

        rootstrap.style({
            id: 'typography--h5--font-styles',
            selector: 'h5',
            styles: h5Styles
        });
    });
});


// Font Size Mobile
wp.customize( 'typography--h5--font-size', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--h5--font-size',
                value: to,
                screen: 'default'
            });
        });
    });
});


// Line Height Mobile
wp.customize( 'typography--h5--line-height', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--h5--line-height',
                value: to,
                screen: 'default'
            });
        });
    });
});

// Font Size Tablet
wp.customize( 'typography--h5--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--h5--font-size',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Line Height Tablet
wp.customize( 'typography--h5--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--h5--line-height',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Font Size Desktop
wp.customize( 'typography--h5--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--h5--font-size',
                value: to,
                screen: 'desktop'
            });
        });
    });
});


// Line Height Desktop
wp.customize( 'typography--h5--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--h5--line-height',
                value: to,
                screen: 'desktop'
            });
        });
    });
});
