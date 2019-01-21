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
wp.customize( 'blog--title--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'blog--title--color',
            selector: '.archive-header__title',
            styles: { color: to },
        });
    });
});

// Font Styles
wp.customize( 'blog--title--font-styles', function( value ) {
    value.bind( function( to ) {
        var styles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'blog--title--font-styles',
            selector: '.archive-header__title',
            styles: styles,
        });
    });
});
