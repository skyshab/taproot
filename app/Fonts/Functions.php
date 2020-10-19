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

namespace Taproot\Fonts;

use Taproot\Tools\Mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get Font Family if not set to default
     *
     * @since 2.0.0
     * @param string $font
     * @return string
     */
    public static function get_font_family( $font ) {

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
     * Get Font Choices
     *
     * @since 2.0.0
     * @return array
     */
    public static function get_font_choices() {

        $default_system_fonts = [
            '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif' => 'System Sans-Serif',
            '"Apple Garamond", "Baskerville", "Times New Roman", "Droid Serif", "Times","Source Serif Pro", serif' => 'System Serif',
            '"SF Mono", "Monaco", "Inconsolata", "Fira Mono", "Droid Sans Mono", "Source Code Pro", monospace' => 'System Monospace',
        ];

        $system_font_stacks = apply_filters( 'taproot/system-fonts', $default_system_fonts );

        $font_code = Mod::get( 'taproot-google-fonts' );
        $fonts = explode( "|", $font_code );
        $font_choices = ['default' => 'Default'];

        foreach( $fonts as $font ) {

            if( '' === $font ) continue;

            $font_id = strstr($font, ':', true) ?: $font;
            $font_name = str_replace( '+', ' ', $font_id );
            $font_choices['"' . $font_name . '"'] = $font_name;
        }

        // combine system font stacks with web fonts
        $font_choices = array_merge( $font_choices, $system_font_stacks );

        return $font_choices;
    }

    /**
     * Sanitize Google Fonts
     *
     * Extract font list if full embed code is entered.
     *
     * @since 2.0.0
     * @param string $fonts
     * @return string - Returns a list of fonts in Google Font API format
     */
    public static function sanitize_google_fonts( $fonts ) {
        preg_match('/family=([\s\S]*?)"/', $fonts, $matches);
        return ( $matches ) ? sanitize_text_field( $matches[1] ) : sanitize_text_field( $fonts );
    }

    /**
     * Has Google Fonts?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function has_google_fonts() {
        return ( Mod::get( 'taproot-google-fonts' ) ) ? true : false;
    }

    /**
     * Get Google Fonts URL
     *
     * @since 2.0.0
     * @return string
     */
    public static function get_google_fonts_url() {

        $google_fonts = Mod::get( 'taproot-google-fonts' );

        if( $google_fonts ) {
            return sprintf( '//fonts.googleapis.com/css?family=%s', esc_attr( $google_fonts ) );
        }

        return '';
    }
}
