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


// Navbar Show When Fixed
wp.customize( 'nav--navbar-fixed--fixed', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--fixed',
            selector: '.app-header--fixed .menu--navbar',
            styles: { 'display': 'none' },
            screen: 'desktop',
            callback: !to,
        });
    });
});


// Navbar Background Color
wp.customize( 'nav--navbar-fixed--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--background-color',
            selector: '.app-header--fixed .menu--navbar',
            styles: {
                'background-color': to,
            },
            screen: 'desktop'
        });
    });
});


// Menu Link Color
wp.customize( 'nav--navbar-fixed--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--link-color',
            selector: '.app-header--fixed .menu--navbar__link:link, .app-header--fixed .menu--navbar__link:visited',
            styles: {
                'color': to,
            },
            screen: 'desktop'
        });
    });
});


// Menu Link Color Hover
wp.customize( 'nav--navbar-fixed--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--link-color--hover',
            selector: '.app-header--fixed .menu--navbar__link',
            styles: {
                'color': to,
            },
            screen: 'desktop'
        });
    });
});


// Font Family
wp.customize( 'nav--navbar-fixed--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--font-family',
            selector: '.app-header--fixed .menu--navbar__link',
            styles: {
                'font-family': utils.getFontFamily(to)
            },
            screen: 'desktop'
        });
    });
});


// Font Styles
wp.customize( 'nav--navbar-fixed--font-styles', function( value ) {
    value.bind( function( to ) {
        var itemStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'nav--navbar-fixed--font-styles',
            selector: '.app-header--fixed .menu--navbar__link',
            styles: itemStyles,
            screen: 'desktop'
        });
    });
});


// Font Size
wp.customize( 'nav--navbar-fixed--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--font-size',
            selector: '.app-header--fixed .menu--navbar__link',
            styles: {
                'font-size': to,
            },
            screen: 'desktop',
        });
    });
});


// Line Height
wp.customize( 'nav--navbar-fixed--height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--height',
            selector: '.app-header--fixed .menu--navbar__link',
            styles: {
                'line-height': to,
            },
            screen: 'desktop'
        });
    });
});


// Padding
wp.customize( 'nav--navbar-fixed--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--padding',
            selector: '.app-header--fixed .menu--navbar__link',
            styles: {
                'padding-left': to,
                'padding-right': to,
            },
            screen: 'desktop'
        });
    });
});


// Align
wp.customize( 'nav--navbar-fixed--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--align',
            selector: '.app-header--fixed .menu--navbar__items',
            styles: {
                'justify-content': to,
            },
            screen: 'desktop'
        });
    });
});


// Submenu Color
wp.customize( 'nav--navbar-fixed--dropdown--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--dropdown--background-color',
            selector: '.app-header--fixed .menu--navbar__item.has-children  .menu__sub-menu',
            styles: {
                'background-color': to,
                'border-color': to,
            },
            screen: 'desktop'
        });
    });
});


// Submenu Link Color
wp.customize( 'nav--navbar-fixed--dropdown--link--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--dropdown--link--color',
            selector: '.app-header--fixed .menu__sub-menu .menu--navbar__link',
            styles: {
                'color': to,
            },
            screen: 'desktop'
        });
    });
});


// Submenu Link Color
wp.customize( 'nav--navbar-fixed--dropdown--link--color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-fixed--dropdown--link--color--hover',
            selector: '.app-header--fixed .menu__sub-menu .menu--navbar__link:hover',
            styles: {
                'color': to,
            },
            screen: 'desktop'
        });
    });
});
