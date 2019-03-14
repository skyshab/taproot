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

