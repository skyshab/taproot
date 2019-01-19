/**
 * Customize controls preview scripts. 
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


// Hide When Fixed?
wp.customize( 'nav--tagline-fixed--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--tagline-fixed--hide',
            selector: '.app-header--fixed .app-header__description',
            styles: { 'display': 'none' },
            screen: 'desktop',
            callback: to,          
        });
    });
});

// Font Size
wp.customize( 'branding--tagline-fixed--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--tagline-fixed--font-size',
            selector: '.app-header--fixed .app-header__description',
            styles:  {
                'font-size': to
            },
            screen: 'desktop'
        });
    });
});

// Line Height
wp.customize( 'branding--tagline-fixed--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--tagline-fixed--line-height',
            selector: '.app-header--fixed .app-header__description',
            styles:  {
                'line-height': to
            },
            screen: 'desktop'
        });
    });
});

// Gutter
wp.customize( 'branding--tagline-fixed--gutter', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--tagline-fixed--gutter',
            selector: '.app-header--fixed .app-header__description',
            styles:  {
                'margin-top': to
            },
            screen: 'desktop'
        });
    });
});
