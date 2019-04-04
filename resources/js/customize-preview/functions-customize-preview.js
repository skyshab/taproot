/**
 * Utility functions for use in customize preview js.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


// build font style from our font style control values
export function taprootFontStyles( value ) {
    var fontStyles = value.split( '|' ),
        styles = {},
        $ = jQuery.noConflict();

    if ( 0 <= $.inArray( 'bold', fontStyles ) ) {
        styles['font-weight'] = 'bold';
    }

    if ( 0 <= $.inArray( 'italic', fontStyles ) ) {
        styles['font-style'] = 'italic';
    }

    if ( 0 <= $.inArray( 'underline', fontStyles ) ) {
        styles['text-decoration'] = 'underline';
    }

    if ( 0 <= $.inArray( 'uppercase', fontStyles ) ) {
        styles['text-transform'] = 'uppercase';

    } else if ( 0 <= $.inArray( 'capitalize', fontStyles ) ) {
        styles['text-transform'] = 'capitalize';
    }

    return styles;
};


// Get mobile screen from setting value
export function getMobileScreen( screen = 'default' ) {
    return ( 'never' === screen ) ? false : screen;
}


// Get Desktop screen from mobile setting value
export function getDesktopScreen( screen = 'default' ) {

    const screens = {
        'never': 'default',
        'mobile': 'tablet-and-up',
        'tablet-and-under': 'desktop',
        'always': false
    };

    return ( screens[screen] ) ? screens[screen] : false;
}
