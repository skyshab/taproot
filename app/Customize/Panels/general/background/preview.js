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


// background color
wp.customize( 'general--background--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'general--background--background-color',
            selector: 'html',
            styles:  {
                'background-color': to
            },            
        });
    });
});
