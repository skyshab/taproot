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


 // Background Color
 wp.customize( 'colors--sidebar--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--sidebar--background-color',
            value: to
        });
    });
});

 // Text Color
 wp.customize( 'colors--sidebar--text-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--sidebar--text-color',
            value: to
        });
    });
});

 // Accent Color
 wp.customize( 'colors--sidebar--accent-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--sidebar--accent-color',
            value: to
        });
    });
});

 // Link Color
 wp.customize( 'colors--sidebar--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--sidebar--link-color',
            value: to
        });
    });
});

 // Link Color Hover
 wp.customize( 'colors--sidebar--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--sidebar--link-color--hover',
            value: to
        });
    });
});
