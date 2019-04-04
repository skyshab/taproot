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
wp.customize( 'branding--tagline-tablet--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--font-size',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});

// Line Height
wp.customize( 'branding--tagline-tablet--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--line-height',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});

// Gutter
wp.customize( 'branding--tagline-tablet--gutter', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--gutter',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});


// Hide tagline
wp.customize( 'branding--tagline-tablet--hide-tagline', function( value ) {
    value.bind( function( to ) {
        var taglineDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--tagline-tablet--hide-tagline',
            selector: '.app-header__description',
            styles: {
                'display': taglineDisplay
            },
            screen: 'tablet'
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
            id: 'branding--tagline-tablet--hide-tagline--title',
            selector: '.app-header__title',
            styles: titleStyles,
            screen: 'tablet'
        });
    });
});
