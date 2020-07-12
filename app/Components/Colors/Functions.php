<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Colors;

use Taproot\Tools\Mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Converts a HEX value to RGB.
     *
     * @param string $color The original color, in 3 or 6 digit hexadecimal form.
     * @return string rgb value
     */
    public static function hex2rgb( $color ) {

        $color = trim( $color, '#' );

        if ( strlen( $color ) === 3 ) {
            $r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
            $g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
            $b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
        } elseif ( strlen( $color ) === 6 ) {
            $r = hexdec( substr( $color, 0, 2 ) );
            $g = hexdec( substr( $color, 2, 2 ) );
            $b = hexdec( substr( $color, 4, 2 ) );
        } else {
            return $color;
        }

        return sprintf( 'rgb(%s, %s, %s)', $r, $g, $b );
    }

    /**
     * Get theme color
     *
     * @param string $color - color name
     * @return string color
     */
    public static function get_theme_color( $color_name ) {

        $theme_colors = [
            'text' =>               Mod::get( 'colors--text', '#8c8c8c' ),
            'accent' =>             Mod::get( 'colors--accent', '#00a0d1' ),
            'accent-contrast' =>    Mod::get( 'colors--accent-contrast', '#ffffff' ),
            'meta-light' =>         Mod::get( 'colors--meta-light', '#f4f4f4' ),
            'meta-medium' =>        Mod::get( 'colors--meta-medium', '#d8d8d8' ),
            'meta-dark' =>          Mod::get( 'colors--meta-dark', '#a5a5a5' )
        ];

        if( isset( $theme_colors[$color_name] ) ) {
            return $theme_colors[$color_name];
        }

        return '';
    }
}
