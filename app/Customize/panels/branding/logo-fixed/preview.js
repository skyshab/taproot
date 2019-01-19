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
wp.customize( 'nav--logo-fixed--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--logo-fixed--hide',
            selector: '.app-header--fixed  .app-header__logo-link',
            styles: { 'display': 'none' },
            screen: 'desktop',
            callback: to,          
        });
    });
});


// Logo width
wp.customize( 'branding--logo-fixed--width', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--logo-fixed--width',
            screen: 'desktop',
            selector: '.app-header--fixed  .app-header__logo-link',
            styles: {
                'width': to
            },
        });
    });
});


// Logo gutter
wp.customize( 'branding--logo-fixed--gutter', function( value ) {
    value.bind( function( to ) {
        var layout = wp.customize.instance('branding--layout-desktop--layout').get();
        var styles = {};
        if( 'horizontal' === layout ) { 
            styles['margin'] = (to) ? `0 ${to} 0 0` : false;
        }
        else {
            styles['margin'] = (to) ? `0 0 ${to} 0` : false;
        }        rootstrap.style({
            id: 'branding--logo-fixed--gutter',
            screen: 'desktop',
            selector: '.app-header--fixed  .app-header__logo-link',
            styles: styles,
        });
    });
});
