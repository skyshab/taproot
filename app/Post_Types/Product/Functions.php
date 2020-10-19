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

namespace Taproot\Post_Types\Product;

use Taproot\Tools\Mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get shop page id
     *
     * @since 2.0.0
     * @access public
     * @return int
     */
    public function get_shop_id() {

        if ( function_exists( 'wc_get_page_id' ) ) {
            return wc_get_page_id( 'shop' );
        }

        return 0;
    }

    /**
     * Should we add cart widget to menu?
     *
     * @since 2.0.0
     * @access public
     * @return bool
     */
    public function display_the_cart_widget( $menu = false ) {

        // Check if menu was passed in
        if( ! $menu ) {
            return false;
        }

        $locations = Mod::get( 'product--cart--widget--menu-location' );

        if( ! is_array( $locations ) ) {
            $locations = explode( ',', $locations );
        }

        // If menu wasn't passed in, don't show
        if( ! in_array( $menu, $locations ) ) {
            return false;
        }

        // Always show on shop pages.
        if( is_shop() ) {
            return true;
        }
        // Never show on cart page.
        elseif( is_cart() ) {
            return false;
        }

        global $woocommerce;
        $count = $woocommerce->cart->cart_contents_count;

        return ( $count >= 1 ) ? true : false;
    }
}
