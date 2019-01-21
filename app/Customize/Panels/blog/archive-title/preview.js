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


// Blog Title Color
wp.customize( 'blog--archive-title--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--archive-title--color',
            selector: '.entry__title--archive',
            styles: { color: to }
        });
    });
});


// Blog Title Color: Hover
wp.customize( 'blog--archive-title--color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--archive-title--color--hover',
            selector: '.entry__title--archive:hover',
            styles: { color: to }
        });
    });
});


// Blog Title Font Size
wp.customize( 'blog--archive-title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--archive-title--font-size',
            selector: '.entry__title--archive',
            styles: { 'font-size': to }
        });        
    });
});


// Font Styles
wp.customize( 'blog--archive-title--font-styles', function( value ) {
    value.bind( function( to ) {
        var headingsStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'blog--archive-title--font-styles',
            selector: '.entry__title--archive',
            styles: headingsStyles,
        });
    });
});
