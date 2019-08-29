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


// Var: Background Color
wp.customize( 'nav--footer--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer--background-color',
            selector: '.menu--footer',
            styles: {
                'background-color': to
            }
        });
    });
});


// Font Styles
wp.customize( 'nav--footer--font-styles', function( value ) {
    value.bind( function( to ) {
        var itemStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'nav--footer--font-styles',
            selector: '.menu--footer__link',
            styles: itemStyles
        });
    });
});


// Menu Link Color
wp.customize( 'nav--footer--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer--link-color',
            selector: '.menu--footer__link:link, .menu--footer__link:visited',
            styles: {
                color: to
            }
        });
    });
});

// Menu Link Color
wp.customize( 'nav--footer--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer--link-color--hover',
            selector: '.menu--footer__link:hover',
            styles: {
                color: to
            }
        });
    });
});


// Font Family
wp.customize( 'nav--footer--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer--font-family',
            selector: '.menu--footer__link',
            styles: {
                'font-family': utils.getFontFamily(to)
            }
        });
    });
});


// Footer Nav Position
wp.customize( 'nav--footer--position', function( value ) {
    value.bind( function( to ) {
        var order = ( 'before' === to ) ? '1' : '3';
        rootstrap.style({
            id: 'nav--footer--position',
            selector: '.menu--footer',
            styles: {
                'order': order,
            }
        });
    });
});


//  Var: Link Font Size
wp.customize( 'nav--footer--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'nav--footer--font-size',
            value: to,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
        });
    });
});


//  Var: Link Line Height
wp.customize( 'nav--footer--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'nav--footer--line-height',
            value: to,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
        });
    });
});


// Padding
wp.customize( 'nav--footer--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer--padding',
            selector: '.menu--footer__link',
            styles: {
                'padding-left': to,
                'padding-right': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
        });
    });
});


// Align
wp.customize( 'nav--footer--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer--align',
            selector: '.menu--footer__items',
            styles: {
                'justify-content': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
        });
    });
});


// Footer Nav hide
wp.customize( 'nav--footer--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer--hide',
            selector: '.menu--footer',
            styles: { 'display': 'none' },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
            callback: to,
        });
    });
});
