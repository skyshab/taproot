<?php
/**
 * Utility functions for customize controls and styles
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize;


/**
 * Utility function for building a path string
 *
 * @since  1.0.0
 * @param string    $item
 * @return string
 */
function path( ...$item ) {
    return join( '/', $item );
}


/**
 * Is boxed layout activated?
 *
 * @since  1.0.0
 * @return bool
 */
function is_boxed_layout() {
    return ( get_theme_mod( 'layout--boxed--enable' ) ) ? true : false;
}


/**
 * Get a screen from breakpoint data
 *
 * @since 1.0.0
 *
 * @param string $bp
 * @param bool $mobile
 * @return string
 */
function get_screen_from_bp( $bp = 'bp-t', $mobile = true ) {

    $mobile_screens_array = [
        'bp-none' => false,
        'bp-m' => 'mobile',
        'bp-t' => 'tablet-and-under',
        'bp-always' => 'default'
    ];

    $screens_array = [
        'bp-none' => 'default',
        'bp-m' => 'tablet-and-up',
        'bp-t' => 'desktop',
        'bp-always' => false
    ];

    $screens = ( $mobile ) ? $mobile_screens_array : $screens_array;

    return ( isset($screens[$bp]) && $screens[$bp] ) ? $screens[$bp] : false;
}


/**
 * Get mobile screen from setting
 *
 * @since 1.0.0
 *
 * @param string $screen
 * @return string
 */
function get_mobile_screen( $screen = 'default' ) {
    return ( 'never' === $screen ) ? false : $screen;
}

/**
 * Get mobile screen from setting
 *
 * @since 1.0.0
 *
 * @param string $screen
 * @return string
 */
function get_desktop_screen( $screen = 'default' ) {

    $screens_array = [
        'never' => 'default',
        'mobile' => 'tablet-and-up',
        'tablet-and-under' => 'desktop',
        'always' => false,
    ];

    return ( isset( $screens_array[$screen] ) ) ? $screens_array[$screen] : false;
}


/**
 * Get Font Styles
 *
 * @since 1.0.0
 *
 * @param array $styles
 * @return string
 */
function get_font_styles( $id ) {

    $styles_array = get_theme_mod( $id, false );
    if( !$styles_array ) return false;
    $styles_array = explode( '|', $styles_array );
    $styles = [];

    // Font weight
    if( in_array( 'bold', $styles_array ) ) {
        $styles['font-weight'] = 'bold';
    }

    // Font style
    if( in_array( 'italic', $styles_array ) ) {
        $styles['font-style'] = 'italic';
    }

    // Underline
    if( in_array( 'underline', $styles_array ) ) {
        $styles['text-decoration'] = 'underline';
    }

    // Uppercase
    if( in_array( 'uppercase', $styles_array ) ) {
        $styles['text-transform'] = 'uppercase';
    }

    // Capitalize
    elseif( in_array( 'capitalize', $styles_array ) ) {
        $styles['text-transform'] = 'capitalize';
    }

    return $styles;
}


/**
 * Get Font Family if not set to default
 *
 * @since 1.0.0
 *
 * @param string $font
 * @return string
 */
function get_font_family( $font ) {

    if( 'default' === $font || !$font ) {
        return false;
    }
    elseif( strpos( $font, '"') !== false ) {
        return $font;
    }
    else {
        return sprintf( '"%s"', $font );
    }
}


/**
 * Maybe convert to em?
 *
 * Utility to convert unitless values to em.
 * Used to define block spacing that maintains vertical rhythm.
 *
 * @since  1.0.0
 * @param string    $value - the value to maybe convert
 * @return string
 */
function maybe_convert_to_em( $value = false ) {

    // if nothing is set, bail
    if( !$value ) return false;

    // if px, %, or ems unit is used, return value
    if( strpos($value, 'px') !== false || strpos($value, '%') !== false || strpos($value, 'em') !== false ) {
        return $value;
    }

    // otherwise, make sure there's no unit, and add 'em'
    else {
        return sprintf( '%sem',  (float) filter_var( $value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ) );
    }
}



/**
 * Get Layout breakpoint
 *
 * Utility to calculate the width when containers reach their full size
 *
 * @since  1.1.0
 * @return int
 */
function get_full_layout_width() {

    $max_width = \Rootstrap\get_theme_mod( 'layout--container--max-width', null, true );
    $max_width_int = (int) filter_var($max_width, FILTER_SANITIZE_NUMBER_INT);

    if( is_boxed_layout() ) {
        $layout_padding = \Rootstrap\get_theme_mod('layout--boxed--outer-padding', null, true);
    } else {
        $site_width = get_layout_width('desktop', 'vw');
        $layout_padding = get_padding_from_width( $site_width, 'vw' );
    }

    $layout_padding_int = (int) filter_var($layout_padding, FILTER_SANITIZE_NUMBER_INT);

    $width = false;

    if(strpos($layout_padding, 'vw') !== false) {
        $percentage = (100 - (2 * $layout_padding_int) ) / 100;
        $width = $max_width_int / $percentage;
    }
    elseif(strpos($layout_padding, 'px') !== false) {
        $width = $max_width_int + (2 * $layout_padding_int);
    }

    if( $width <= 1025 ) {
        return 1025;
    }

    return round($width);
}


/**
 * Get Full Layout Padding
 *
 * Utility to calculate the padding in px when a layout reaches its max width
 *
 * @since  1.1.0
 * @return string
 */
function get_full_layout_padding() {
    $portion = (1 - get_layout_width('desktop') ) / 2;
    $width = (int) get_full_layout_width();
    return $portion * $width . 'px';
}


/**
 * Get Layout Width
 *
 * Utility to get container layout width and format in vw, %, or as a decimal
 *
 * @since  1.1.0
 * @return string
 */
function get_layout_width( $screen = 'mobile', $unit = 'decimal' ) {
    $width = \Rootstrap\get_theme_mod( sprintf('layout--container-%s--width', $screen), null, true );
    $width_int = (int) filter_var($width, FILTER_SANITIZE_NUMBER_INT);

    if( 'decimal' === $unit ) {
        return $width_int / 100;
    }

    return $width_int . $unit;
}


/**
 * Get Padding from Width
 *
 * Utility to calculate side padding values
 * from a width defined in vw or %.
 *
 * @since  1.1.0
 * @param mixed $width - the width in vw, %, or unitless value
 * @param string $unit - unit to add to the returned string
 * @return string
 */
function get_padding_from_width( $width, $unit = false ) {

    $width_int = (int) filter_var($width, FILTER_SANITIZE_NUMBER_INT);
    if(!$width_int) return '';

    $padding = (100 - $width_int) / 2;

    if($unit) {
        $padding .= $unit;
    }

    return $padding;
}



/**
 * Get Palette Color From Slug
 *
 * Utility to get a registered theme color from the color slug name.
 *
 * @since  1.0.0
 * @return string
 */
function get_palette_color( $slug ) {

    $colors = current( (array) get_theme_support( 'editor-color-palette' ) );

    foreach( $colors as $color => $args ) {
        if( $slug === $args['slug'] ) {
            return $args['color'];
        }
    }

    return false;
}
