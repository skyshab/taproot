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


// Logo image
wp.customize( 'branding--logo--image', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--logo--image',
            selector: '.branding',
            styles: {
                'flex-direction': to
            },
            screen: 'mobile'
        });
    });
});


// Logo width
wp.customize( 'branding--logo--width', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--logo--width',
            value: to,
            screen: 'default',
        });
    });
});

// Logo gutter
wp.customize( 'branding--logo--gutter', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--logo--gutter',
            value: to,
            screen: 'default',
        });
    });
});


// Logo width Tablet
wp.customize( 'branding--logo--width--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--logo--width',
            value: to,
            screen: 'tablet-and-up',
        });
    });
});

// Logo gutter Tablet
wp.customize( 'branding--logo--gutter--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--logo--gutter',
            value: to,
            screen: 'tablet-and-up',
        });
    });
});


// Logo width Desktop
wp.customize( 'branding--logo--width--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--logo--width',
            value: to,
            screen: 'desktop',
        });
    });
});

// Logo gutter Desktop
wp.customize( 'branding--logo--gutter--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'branding--logo--gutter',
            value: to,
            screen: 'desktop',
        });
    });
});
