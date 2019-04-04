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


// Meta Color
wp.customize( 'posts--meta--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'posts--meta--color',
            value: to
        });
    });
});


// Meta Icon Color
wp.customize( 'posts--meta--icon--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'posts--meta--icon--color',
            value: to
        });
    });
});


// Meta Font Size
wp.customize( 'posts--meta--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'posts--meta--font-size',
            value: to
        });
    });
});
