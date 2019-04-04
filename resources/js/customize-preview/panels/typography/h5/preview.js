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


// Text Color
wp.customize( 'typography--h5--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h5--color',
            selector: 'h5',
            styles: {
                'color': to
            }
        });
    });
});


// Font Family
wp.customize( 'typography--h5--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h5--font-family',
            selector: 'h5',
            styles: {
                'font-family': to
            }
        });
    });
});


// Font Styles
wp.customize( 'typography--h5--font-styles', function( value ) {
    value.bind( function( to ) {

        var h5Styles = utils.taprootFontStyles(to);

        rootstrap.style({
            id: 'typography--h5--font-styles',
            selector: 'h5',
            styles: h5Styles
        });
    });
});
