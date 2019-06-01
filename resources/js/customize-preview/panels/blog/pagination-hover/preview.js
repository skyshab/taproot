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




// Blog Pagination Color Hover
wp.customize( 'blog--pagination-hover--link--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'blog--pagination-hover--link--color',
            value: to
        });
    });
});



// Blog Pagination Background Color Hover
wp.customize( 'blog--pagination-hover--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'blog--pagination-hover--background-color',
            value: to
        });
    });
});


// Blog Pagination Numbers Color Hover
wp.customize( 'blog--pagination-hover--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'blog--pagination-hover--color',
            value: to
        });
    });
});
