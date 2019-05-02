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


// Text Color
wp.customize( 'typography--body--text-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'typography--body--text-color',
            value: to
        });
    });
});


// Font Family
wp.customize( 'typography--body--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'typography--body--font-family',
            value: to,
            screen: 'default'
        });
    });
});
