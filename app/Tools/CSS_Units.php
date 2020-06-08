<?php
/**
 * CSS Units
 *
 * This class contains utility functions for handling strings
 * that contain CSS values and units
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Tools;

/**
 * Theme mod class.
 *
 * @since  2.0.0
 * @access public
 */
class CSS_Units {

    /**
     * Convert a string's unit of measurement
     *
     * @since  2.0.0
     * @param string    $string - the string value to convert
     * @param string    $new_unit - the unit to convert to.
     * @return string
     */
    public static function convert_unit( $string, $new_unit = '' ) {

        // if nothing is set, bail
        if( ! $string ) {
            return false;
        }

        // Parse the string into an array of attributes
        $value_array = static::parse_value( $string );

        // The numberic value
        $value = $value_array['value'];

        // The unit of measurement
        $unit = $value_array['unit'];

        // If the string is already the desired unit, return it
        if( $unit === $new_unit ) {
            return $string;
        }

        switch( $unit ) {

            case 'px':

                if( 'em' === $new_unit || 'rem' === $new_unit ) {
                    $new_value = $value / 16;
                }
                else {
                    $new_value = $value;
                }
                break;
            case '%';

                if( 'em' === $new_unit || 'rem' === $new_unit ) {
                    $new_value = $value / 100;
                }
                else {
                    $new_value = $value;
                }
                break;
            case 'rem';

                if( 'px' === $new_unit ) {
                    $new_value = $value * 16;
                }
                elseif( '%' === $new_unit ) {
                    $new_value = $value * 100;
                }
                else {
                    $new_value = $value;
                }
                break;
            case 'em';

                if( 'px' === $new_unit ) {
                    $new_value = $value * 16;
                }
                elseif( '%' === $new_unit ) {
                    $new_value = $value * 100;
                }
                else {
                    $new_value = $value;
                }
                break;
            // case 'vw';

            //     $new_value = $value;
            //     break;
            // case 'vh';

            //     $new_value = $value;
            //     break;
            default;
                $new_value = $value;
        }

        return "{$new_value}{$new_unit}";
    }

    /**
     * Get the numeric value and unit from a string.
     *
     * Utility to convert a string into a numeric value and unit.
     *
     * @since  2.0.0
     * @param string    $string - a string that contains a CSS value
     * @return array
     */
    public static function parse_value( $string ) {

        // Create an empty array
        $value = [];

        // Store the numeric value
        $value['value'] = (float) filter_var( $string, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );

        // Store the unit
        $value['unit'] = str_replace( $value['value'], '', $string );

        return $value;
    }

}