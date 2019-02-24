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


// Single Title Color
wp.customize( 'pages--title--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'pages--title--color',
            selector: '.entry__title--page',
            styles: { color: to },
        });
    });
});


// Single Title Font Size
wp.customize( 'pages--title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'pages--title--font-size',
            value: to,
        });
    });
});


// Font Styles
wp.customize( 'pages--title--font-styles', function( value ) {
    value.bind( function( to ) {
        var headingsStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'pages--title--font-styles',
            selector: '.entry__title--page',
            styles: headingsStyles,
        });
    });
});
