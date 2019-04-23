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


// Font Size
wp.customize( 'typography--h4-mobile--font-size', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--h4--font-size',
                value: to,
                screen: 'default'
            });
        });
    });
});


// Line Height
wp.customize( 'typography--h4-mobile--line-height', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--h4--line-height',
                value: to,
                screen: 'default'
            });
        });
    });
});
