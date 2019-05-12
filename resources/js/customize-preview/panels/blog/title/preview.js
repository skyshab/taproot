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


// Blog Title Color
wp.customize( 'blog--title--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--title--color',
            selector: '.archive-header__title',
            styles: { color: to }
        });
    });
});

// Font Styles
wp.customize( 'blog--title--font-styles', function( value ) {
    value.bind( function( to ) {
        var styles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'blog--title--font-styles',
            selector: '.archive-header__title',
            styles: styles
        });
    });
});


// Font Size
wp.customize( 'blog--title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'blog--title--font-size',
            value: to,
            screen: 'default'
        });
    });
});

// Line Height
wp.customize( 'blog--title--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'blog--title--line-height',
            value: to,
            screen: 'default'
        });
    });
});


// Font Size Tablet
wp.customize( 'blog--title--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'blog--title--font-size',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});

// Line Height Tablet
wp.customize( 'blog--title--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'blog--title--line-height',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});


// Font Size Desktop
wp.customize( 'blog--title--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'blog--title--font-size',
            value: to,
            screen: 'desktop'
        });
    });
});

// Line Height Desktop
wp.customize( 'blog--title--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'blog--title--line-height',
            value: to,
            screen: 'desktop'
        });
    });
});

