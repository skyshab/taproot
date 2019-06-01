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


//  Footer Background Color
wp.customize( 'footer--styles--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--styles--background-color',
            selector: '.app-footer',
            styles: {
                'background-color': to
            }
        });
    });
});


// Footer Default Color
wp.customize( 'footer--styles--default-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--styles--default-color',
            selector: '.app-footer, .app-footer a',
            styles: {
                'color': to
            }
        });
    });
});


// Footer Default Hover Color
wp.customize( 'footer--styles--default-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--styles--default-color--hover',
            selector: '.app-footer a:hover',
            styles: {
                'color': to
            }
        });
    });
});


// Padding
wp.customize( 'footer--styles--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--padding',
            value: to,
            screen: 'default',
        });
    });
});


// Padding Tablet
wp.customize( 'footer--styles--padding--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--padding',
            value: to,
            screen: 'tablet-and-up',
        });
    });
});


// Padding Desktop
wp.customize( 'footer--styles--padding--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--padding',
            value: to,
            screen: 'desktop',
        });
    });
});


// Fullwidth
wp.customize( 'footer--styles--fullwidth', function( value ) {
    value.bind( function( to ) {
        if( to ) {
            $('.app-footer').removeClass('app-footer--standard-width').addClass('app-footer--fullwidth');
        }
        else {
            $('.app-footer').removeClass('app-footer--fullwidth').addClass('app-footer--standard-width');
        }
    });
});