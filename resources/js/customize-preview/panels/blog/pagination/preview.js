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



// Blog Pagination Size
wp.customize( 'blog--pagination--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--pagination--font-size',
            selector: '.pagination__item',
            styles: { 'font-size': to }
        });
    });
});


// Blog Pagination Spacing
wp.customize( 'blog--pagination--spacing', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--pagination--spacing',
            selector: '.pagination__item',
            styles: {
                'margin-left': to,
                'margin-right': to,
            }
        });
    });
});


// Blog Pagination Spacing
wp.customize( 'blog--pagination--rounded', function( value ) {
    value.bind( function( to ) {
        if( to ) {
            $('.pagination__items').addClass('pagination__items--rounded');
        }
        else {
            $('.pagination__items').removeClass('pagination__items--rounded');
        }
    });
});


// Blog Pagination Link Color
wp.customize( 'blog--pagination--link--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--pagination--font-size',
            selector: '.pagination__item--prev .pagination__anchor, .pagination__item--next .pagination__anchor',
            styles: { 'color': to }
        });
    });
});


// Blog Pagination Background Color
wp.customize( 'blog--pagination--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--pagination--background-color',
            selector: '.pagination__item--prev .pagination__anchor, .pagination__item--next .pagination__anchor',
            styles: { 'background-color': to }
        });
    });
});


// Blog Pagination Numbers Color
wp.customize( 'blog--pagination--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--pagination--color',
            selector: '.pagination__item--number .pagination__anchor, .pagination__item--dots .pagination__anchor',
            styles: { 'color': to }
        });
    });
});

