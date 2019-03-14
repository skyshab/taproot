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


// Header Background Color
wp.customize( 'header--styles-fixed--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'header--styles-fixed--background-color',
            selector: '.app-header--fixed',
            styles: {
                'background-color': to
            },
            screen: 'desktop'
        });
    });
});
