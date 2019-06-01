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


 // Accent Color
 wp.customize( 'colors--theme--accent', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--theme--accent',
            value: to
        });
    });
});

 // Accent Contrast Color
 wp.customize( 'colors--theme--accent-contrast', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--theme--accent-contrast',
            value: to
        });
    });
});


 // Meta Color - Light
 wp.customize( 'colors--theme--meta-light', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--theme--meta-light',
            value: to
        });
    });
});

 // Meta Color - Medium
 wp.customize( 'colors--theme--meta-medium', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--theme--meta-medium',
            value: to
        });
    });
});

 // Meta Color - Dark
 wp.customize( 'colors--theme--meta-dark', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'colors--theme--meta-dark',
            value: to
        });
    });
});
