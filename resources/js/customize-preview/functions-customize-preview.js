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
    var font_styles = value.split( '|' ),
        styles = {},
        $ = jQuery.noConflict();

    if( $.inArray( 'bold', font_styles ) >= 0 ) {
        styles['font-weight'] = 'bold';
    } 

    if( $.inArray( 'italic', font_styles ) >= 0 ) {
        styles['font-style'] = 'italic';
    } 
    
    if( $.inArray( 'underline', font_styles ) >= 0 ) {
        styles['text-decoration'] = 'underline';
    } 

    if( $.inArray( 'uppercase', font_styles ) >= 0 ) {
        styles['text-transform'] = 'uppercase';

    } else if( $.inArray( 'capitalize', font_styles ) >= 0 ) {
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
        'never' : 'default',
        'mobile' : 'tablet-and-up',
        'tablet-and-under' : 'desktop',
        'always' : false,
    };

    return ( screens[screen] ) ? screens[screen] : false;
} 
