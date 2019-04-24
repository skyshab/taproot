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
wp.customize( 'header--image--height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'header--image--height',
            selector: '.custom-header .app-header:not(.app-header--fixed)',
            styles: {
                height: to
            }
        });
    });
});

// Header Image Max Height
wp.customize( 'header--image--max-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'header--image--max-height',
            selector: '.custom-header .app-header:not(.app-header--fixed)',
            styles: {
                'max-height': to
            }
        });
    });
})

// Header Image Min Height
wp.customize( 'header--image--min-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'header--image--min-height',
            selector: '.custom-header .app-header:not(.app-header--fixed)',
            styles: {
                'min-height': to
            }
        });
    });
})