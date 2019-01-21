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

  
// Text Color
wp.customize( 'typography--h2--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h2--color',
            selector: 'h2',
            styles:  {
                'color': to 
            },
        });
    });
});


// Font Family
wp.customize( 'typography--h2--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h2--font-family',
            selector: 'h2',
            styles:  {
                'font-family': to 
            },
        });
    });
});


// Font Styles
wp.customize( 'typography--h2--font-styles', function( value ) {
    value.bind( function( to ) {

        var h2Styles = utils.taprootFontStyles(to);

        rootstrap.style({
            id: 'typography--h2--font-styles',
            selector: 'h2',
            styles: h2Styles,
        });
    });
});
