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
wp.customize( 'typography--sidebar-tablet--font-size', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--sidebar--font-size',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Line Height
wp.customize( 'typography--sidebar-tablet--line-height', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.var({
                name: 'typography--sidebar--line-height',
                value: to,
                screen: 'tablet-and-up'
            });
            if( !to.includes('px') ) {
                to += 'em';
            }
            rootstrap.var({
                name: 'typography--sidebar--block-spacing',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});
