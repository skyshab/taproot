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


// Single Title Color
wp.customize( 'pages--title--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'pages--title--color',
            selector: '.entry__title--page',
            styles: { color: to }
        });
    });
});

// Single Title Font Size
wp.customize( 'pages--title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'pages--title--font-size',
            value: to
        });
    });
});

// Font Styles
wp.customize( 'pages--title--font-styles', function( value ) {
    value.bind( function( to ) {
        var headingsStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'pages--title--font-styles',
            selector: '.entry__title--page',
            styles: headingsStyles
        });
    });
});


// Font Size
wp.customize( 'pages--title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'pages--title--font-size',
            value: to,
            screen: 'default'
        });
    });
});

// Line Height
wp.customize( 'pages--title--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'pages--title--line-height',
            value: to,
            screen: 'default'
        });
    });
});



// Font Size Tablet
wp.customize( 'pages--title--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'pages--title--font-size',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});

// Line Height Tablet
wp.customize( 'pages--title--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'pages--title--line-height',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});


// Font Size Desktop
wp.customize( 'pages--title--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'pages--title--font-size',
            value: to,
            screen: 'desktop'
        });
    });
});

// Line Height Desktop
wp.customize( 'pages--title--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'pages--title--line-height',
            value: to,
            screen: 'desktop'
        });
    });
});
