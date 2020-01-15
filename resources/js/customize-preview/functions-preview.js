/**
 * Utility functions for use in customize preview js.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

// Build font style from our font style control values.
function taprootFontStyles( value ) {
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
}

// Get font family.
// Adds quotes if needed. Checks if "default" is set, and returns unset if so.
function getFontFamily( font ) {

    if( 'default' === font || !font ) {
        return 'unset';
    }
    else if( font.includes('"') ) {
        return font;
    }
    else {
        return '"' + font + '"';
    }
}

// Get mobile screen from setting value.
function getMobileScreen( screen = 'default' ) {
    return ( 'never' === screen ) ? false : screen;
}

// Get Desktop screen from mobile setting value.
function getDesktopScreen( screen = 'default' ) {

    var screens = {
        'never': 'default',
        'mobile': 'tablet-and-up',
        'tablet-and-under': 'desktop',
        'always': false
    };

    return ( screens[screen] ) ? screens[screen] : false;
}

// Calculate padding from a width.
function getPaddingFromWidth( width, unit = false ) {

    width = width.replace(/[^0-9]/g,'');
    var padding = (100 - width) / 2;

    if( unit ) {
        padding += unit;
    }

    return padding;
}

// Maybe convert unitless value to em?
function maybeConvertToEm( value ) {

    // If nothing is set, bail
    if( ! value ) {
        return false;
    }

    // If a unit is set, return value
    if( value.includes('px') || value.includes('%') || value.includes('em') ) {
        return value;
    }

    // Otherwise, add 'em'
    else {
        return value + 'em';
    }
}
