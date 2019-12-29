<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Typography;

use Taproot\Tools\Mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get Font Styles
     *
     * @since 2.0.0
     *
     * @param array $styles
     * @return string
     */
    public static function get_font_styles( $id ) {

        $styles_array = Mod::get( $id );

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
     * Maybe convert to em?
     *
     * Utility to convert unitless values to em.
     * Used to define block spacing that maintains vertical rhythm.
     *
     * @since  2.0.0
     * @param string    $value - the value to maybe convert
     * @return string
     */
    public static function maybe_convert_to_em( $value = false ) {

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
}
