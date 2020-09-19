<?php
/**
 * Footer Template Tags.
 *
 * This class contains helper functions for use in footer templates and settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Footer;

use Taproot\Tools\Mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get the footer credits
     *
     * @since 2.0.0
     * @return string
     */
    public static function get_the_footer_credits() {
        return Mod::get( 'footer--bottom-bar--content');
    }

    /**
     *  Is fixed footer enabled?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function has_fixed_footer() {
        return Mod::get( 'footer--is-fixed' );
    }

    /**
     *  Get Array of Footer Sidebars
     *
     * @since 2.0.0
     * @return array - Returns an array of footer sidebar ids and Names
     */
    public static function get_the_footer_sidebars() {

        $footer_sidebars = array(
            'footer-1' => 'Footer Sidebar 1',
            'footer-2' => 'Footer Sidebar 2',
            'footer-3' => 'Footer Sidebar 3',
            'footer-4' => 'Footer Sidebar 4'
        );

        return apply_filters( 'taproot/footer-sidebars/list', $footer_sidebars );
    }

    /**
     *  Has Active Footer Sidebars?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function has_active_footer_sidebars() {

        $has_footer_sidebars = false;

        foreach ( static::get_the_footer_sidebars() as $sidebar => $name ) {
            if( is_active_sidebar( $sidebar ) ) {
                $has_footer_sidebars = true;
                break;
            }
        }

        return ( $has_footer_sidebars ) ? true : false;
    }
}
