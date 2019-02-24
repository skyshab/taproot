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


// Bottom Bar Background Color
wp.customize( 'footer--bottom-bar--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--bottom-bar--background-color',
            selector: '.bottom-bar',
            styles:  {
                'background-color': to
            },
        });
    });
});


//Bottom Bar Default Color
wp.customize( 'footer--bottom-bar--default-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--bottom-bar--default-color',
            selector: '.app-footer, .app-footer a',
            styles:  {
                'color': to
            },
        });
    });
});


//Bottom Bar Default Hover Color
wp.customize( 'footer--bottom-bar--default-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--bottom-bar--default-color--hover',
            selector: '.app-footer a:hover',
            styles:  {
                'color': to
            },
        });
    });
});
