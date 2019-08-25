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


// Header Image Height
wp.customize( 'header--hero--height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'header--hero--height',
            selector: '.custom-header .app-header:not(.app-header--fixed)',
            styles: {
                "min-height": to
            }
        });
    });
});


// Header Image Height - Tablet
wp.customize( 'header--hero--height--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'header--hero--height--tablet',
            selector: '.custom-header .app-header:not(.app-header--fixed)',
            styles: {
                "min-height": to
            },
            screen: 'tablet-and-up'
        });
    });
});


// Header Image Height - Desktop
wp.customize( 'header--hero--height--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'header--hero--height--desktop',
            selector: '.custom-header .app-header:not(.app-header--fixed)',
            styles: {
                "min-height": to
            },
            screen: 'desktop'
        });
    });
});


// Hero Default Color
wp.customize( 'header--hero--default-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'header--hero--default-color',
            value: to
        });
    });
});


// Hero Default Color Hover
wp.customize( 'header--hero--default-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'header--hero--link-color--hover',
            value: to
        });
    });
});
