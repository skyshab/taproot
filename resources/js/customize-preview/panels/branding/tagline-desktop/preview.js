/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


// Font Size
wp.customize( 'branding--tagline-desktop--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--font-size',
            value: to,
            screen: 'desktop'
        });
    });
});

// Line Height
wp.customize( 'branding--tagline-desktop--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--line-height',
            value: to,
            screen: 'desktop'
        });
    });
});

// Gutter
wp.customize( 'branding--tagline-desktop--gutter', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--gutter',
            value: to,
            screen: 'desktop'
        });
    });
});


// Hide tagline
wp.customize( 'branding--tagline-desktop--hide-tagline', function( value ) {
    value.bind( function( to ) {
        var taglineDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--tagline-desktop--hide-tagline',
            selector: '.app-header__description',
            styles: {
                'display': taglineDisplay
            },
            screen: 'desktop'
        });

        // title styles - center title
        var titleStyles = ( to )
            ? {
                'grid-row-end': 'span 2',
                'align-self': 'center',
            }
            : {
                'grid-row-end': '2',
                'align-self': 'end',
            };

        rootstrap.style({
            id: 'branding--tagline-desktop--hide-tagline--title',
            selector: '.app-header__title',
            styles: titleStyles,
            screen: 'desktop'
        });
    });
});
