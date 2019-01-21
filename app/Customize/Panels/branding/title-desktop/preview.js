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



// Font Size
wp.customize( 'branding--title-desktop--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--title--font-size',
            value: to,
            screen: 'desktop'
        });
    });
});

// Line Height
wp.customize( 'branding--title-desktop--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--title--line-height',
            value: to,
            screen: 'desktop'
        });
    });
});


// Hide title
wp.customize( 'branding--title-desktop--hide-title', function( value ) {
    value.bind( function( to ) {
        var titleDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--title-desktop--hide-title',
            selector: '.app-header__title',
            styles:  {
                'display': titleDisplay
            },
            screen: 'desktop'
        });
    });
});
