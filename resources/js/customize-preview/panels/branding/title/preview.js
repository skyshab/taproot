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
wp.customize( 'branding--title--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--title--color',
            selector: '.app-header__title',
            styles: {
                color: to
            }
        });
    });
});

// Font Family
wp.customize( 'branding--title--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--title--font-family',
            selector: '.app-header__title',
            styles: {
                'font-family': to,
            }
        });
    });
});

// Font Styles
wp.customize( 'branding--title--font-styles', function( value ) {
    value.bind( function( to ) {
        var titleStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'branding--title--font-styles',
            selector: '.app-header__title',
            styles: titleStyles
        });
    });
});


// Mobile/Default Styles

// Font Size
wp.customize( 'branding--title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--title--font-size',
            value: to,
            screen: 'default'
        });
    });
});

// Line Height
wp.customize( 'branding--title--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--title--line-height',
            value: to,
            screen: 'default'
        });
    });
});

// Hide title
wp.customize( 'branding--title--hide', function( value ) {
    value.bind( function( to ) {
        var titleDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--title--hide',
            selector: '.app-header__title',
            styles: {
                'display': titleDisplay
            },
            screen: 'mobile'
        });
    });
});


// Tablet Styles

// Font Size
wp.customize( 'branding--title--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--title--font-size',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});

// Line Height
wp.customize( 'branding--title--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--title--line-height',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});

// Hide title
wp.customize( 'branding--title--hide--tablet', function( value ) {
    value.bind( function( to ) {
        var titleDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--title--hide--tablet',
            selector: '.app-header__title',
            styles: {
                'display': titleDisplay
            },
            screen: 'tablet'
        });
    });
});


// Desktop Styles

// Font Size
wp.customize( 'branding--title--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--title--font-size',
            value: to,
            screen: 'desktop'
        });
    });
});

// Line Height
wp.customize( 'branding--title--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--title--line-height',
            value: to,
            screen: 'desktop'
        });
    });
});

// Hide title
wp.customize( 'branding--title--hide--desktop', function( value ) {
    value.bind( function( to ) {
        var titleDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--title--hide--desktop',
            selector: '.app-header__title',
            styles: {
                'display': titleDisplay
            },
            screen: 'desktop'
        });
    });
});
