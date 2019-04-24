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


 // Hide When Fixed?
wp.customize( 'nav--title-fixed--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--title-fixed--hide',
            selector: '.app-header--fixed .app-header__title',
            styles: { 'display': 'none' },
            screen: 'desktop',
            callback: to,
        });
    });
});

// Font Size
wp.customize( 'branding--title-fixed--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--title-fixed--font-size',
            selector: '.app-header--fixed .app-header__title',
            styles: {
                'font-size': to
            },
            screen: 'desktop'
        });
    });
});

// Line Height
wp.customize( 'branding--title-fixed--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--title-fixed--line-height',
            selector: '.app-header--fixed .app-header__title',
            styles: {
                'line-height': to
            },
            screen: 'desktop'
        });
    });
});
