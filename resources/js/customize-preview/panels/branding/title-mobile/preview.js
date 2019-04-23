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


// Font Size
wp.customize( 'branding--title-mobile--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--title--font-size',
            value: to,
            screen: 'default'
        });
    });
});

// Line Height
wp.customize( 'branding--title-mobile--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--title--line-height',
            value: to,
            screen: 'default'
        });
    });
});


// Hide title
wp.customize( 'branding--title-mobile--hide-title', function( value ) {
    value.bind( function( to ) {
        var titleDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--title-mobile--hide-title',
            selector: '.app-header__title',
            styles: {
                'display': titleDisplay
            },
            screen: 'mobile'
        });
    });
});
