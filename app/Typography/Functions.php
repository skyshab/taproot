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

namespace Taproot\Typography;

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
}
