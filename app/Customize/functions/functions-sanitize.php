<?php
/**
 * Sanitization functions for customizer controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/**
 * Sanitize Google Fonts
 * 
 * Extract font list if full embed code is entered.
 *
 * @since 1.0.0
 * 
 * @param string $fonts
 * @return string - Returns a list of fonts in Google Font API format
 */
function sanitize_google_fonts( $fonts ) {
    preg_match('/family=([\s\S]*?)"/', $fonts, $matches);
    return ( $matches ) ? sanitize_text_field( $matches[1] ) : sanitize_text_field( $fonts );
}


/**
 * Sanitize checkbox value
 *
 * @since 1.0.0
 * 
 * @param string $input
 * @return int 1 if checked, empty string if not
 */
function taproot_sanitize_checkbox( $input ){
    return ( $input == 1 ) ? 1 : '';
}


/**
 * Sanitize numeric range slider value
 *
 * @since 1.0.0
 * 
 * @param mixed $input
 * @return int
 */    
function taproot_sanitize_range_slider_value( $input ) {
    return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
}


/**
 * Sanitize enable mobile bar checkbox value
 *
 * @since 1.0.0
 * 
 * @param string $input
 * @return int 1 if checked, empty string if not
 */
function taproot_sanitize_enable_mobilebar_mobile_checkbox( $input ) {
    return ( $input == 1 || 'stacked' == et_get_option( 'taproot_branding_layout_mobile', 'stacked' ) ) ? 1 : '';
}


/**
 * Sanitize color value
 *
 * @since 1.0.0
 * 
 * @param string $color
 * @return string
 */
function taproot_sanitize_color_value( $color ) {
    // Trim whitespace
    $color = str_replace( ' ', '', $color );

    // Hex
    if( 1 === preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
        return $color;

    // RGB
    elseif( 'rgb(' === substr( $color, 0, 4 ) ) {

        sscanf( $color, 'rgb(%d,%d,%d)', $red, $green, $blue );

        if( ( $red >= 0 && $red <= 255 ) &&
            ( $green >= 0 && $green <= 255 ) &&
            ( $blue >= 0 && $blue <= 255 )
        ){
            return "rgb({$red},{$green},{$blue})";
        }
    }

    // RGBA
    elseif( 'rgba(' === substr( $color, 0, 5 ) ) {

        sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

        if( ( $red >= 0 && $red <= 255 ) &&
            ( $green >= 0 && $green <= 255 ) &&
            ( $blue >= 0 && $blue <= 255 ) &&
            ( $alpha >= 0 ) && 
            ( $alpha <= 1 )
        ) {
            return "rgba({$red},{$green},{$blue},{$alpha})";
        }
    }

    // nothing matched
    return '';
} 
