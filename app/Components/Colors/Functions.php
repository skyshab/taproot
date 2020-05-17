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
}
