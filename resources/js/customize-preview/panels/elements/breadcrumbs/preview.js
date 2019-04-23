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


//  Breadcrumbs Color
wp.customize( 'elements--breadcrumbs--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--breadcrumbs--color',
            selector: '.breadcrumbs__crumb',
            styles: {
                'color': to
            }
        });
    });
});


//  Breadcrumbs Color Hover
wp.customize( 'elements--breadcrumbs--color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--breadcrumbs--color--hover',
            selector: '.breadcrumbs__crumb a:hover',
            styles: {
                'color': to
            }
        });
    });
});


//  Breadcrumbs Font Size
wp.customize( 'elements--breadcrumbs--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--breadcrumbs--font-size',
            selector: '.breadcrumbs',
            styles: {
                'font-size': to
            }
        });
    });
});


//  Breadcrumbs Align
wp.customize( 'elements--breadcrumbs--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--breadcrumbs--align',
            selector: '.breadcrumbs__trail',
            styles: {
                'justify-content': to
            }
        });
    });
});

