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


// Link Color
wp.customize( 'posts--nav--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'posts--nav--color',
            selector: '.postnav__link a:link, .postnav__link a:visited',
            styles: {
                color: to,
            }
        });
    });
});


// Link Color Hover
wp.customize( 'posts--nav--color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'posts--nav--color--hover',
            selector: '.postnav__link a:hover',
            styles: {
                color: to,
            }
        });
    });
});


// Link Size
wp.customize( 'posts--nav--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'posts--nav--font-size',
            value: to
        });
    });
});
