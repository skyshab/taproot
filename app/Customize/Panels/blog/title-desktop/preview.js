/**
 * Customize controls preview scripts. 
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


// Font Size
wp.customize( 'blog--title-desktop--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'blog--title--font-size',
            value: to,
            screen: 'desktop'
        });
    });
});


// Line Height
wp.customize( 'blog--title-desktop--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'blog--title--line-height',
            value: to,
            screen: 'desktop'
        });
    });
});
