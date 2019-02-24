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


// Background Color
wp.customize( 'elements--buttons--background-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--background-color--hover',
            selector: '.taproot-button, .comment-respond__submit, .searchform__submit',
            styles: {
                'background-color': to,
            },
        });        
    });
});

 // Color
 wp.customize( 'elements--buttons---color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--color--hover',
            selector: '.taproot-button, .comment-respond__submit, .searchform__submit',
            styles: {
                'color': to,
            },
        }); 
    });
});


 // Border Color
 wp.customize( 'elements--buttons--border-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--border-color--hover',
            selector: '.taproot-button, .comment-respond__submit',
            styles: {
                'border-color': to,
            },
        }); 
    });
});
