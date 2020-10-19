<?php
/**
 * Post Type Product Template Functions.
 *
 * This class contains helper functions for use in post type templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Post_Types\Product;

use function Hybrid\app;

/**
 * Template functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Get the markup for the header cart element.
     *
     * @since 2.0.0
     * @access public
     * @return string
     */
    public static function get_header_cart_markup( $menu_location = 'header' ) {

        global $woocommerce;
        $link = $woocommerce->cart->get_cart_url();
        $icon = app('icons')->render( ['icon' => 'shopping-cart'] );
        $count_html = static::get_cart_count();
        $cart_widget_text = apply_filters( 'taproot/cart-widget-text', __('Cart', 'taproot') );
        $text = sprintf( '<span class="cart-widget-text">%s</span>', $cart_widget_text );
        $inner = sprintf( '%s<div class="cart-widget-wrapper">%s %s</div>', $text, $icon, $count_html );
        $a = sprintf('<a class="menu__link menu--theme__link menu menu--%s__link" href="%s">%s</a>', esc_attr( $menu_location ), esc_url( $link ), $inner );
        return sprintf( '<li class="menu__item menu__item--cart-widget menu--%s__item">%s</li>', esc_attr( $menu_location ), $a );
    }

    /**
     * Get the markup for cart count.
     *
     * @since 2.0.0
     * @access public
     * @return string
     */
    public static function get_cart_count() {

        global $woocommerce;
        $count = $woocommerce->cart->cart_contents_count;
        $classes = 'cart-count';

        if( $count === 0 ) {
            $classes .= ' cart-is-empty';
        }

        return sprintf( '<span class="%s">%s</span>', $classes, $count );
    }
}
