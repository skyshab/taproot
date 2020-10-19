<?php
/**
 * Hooks class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Post_Types\Product;

use Hybrid\Contracts\Bootable;
use function Hybrid\app;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'after_setup_theme',                    [ $this, 'add_theme_support' ] );
        add_filter( 'woocommerce_template_path',            [ $this, 'template_path' ] );
        add_filter( 'init',                                 [ $this, 'remove_wc_breadcrumbs' ] );
        add_filter( 'get_the_archive_title',                [ $this, 'get_the_archive_title' ] );
        add_filter( 'get_the_archive_description',          [ $this, 'get_the_archive_description' ] );
        add_filter( 'taproot/breadcrumbs/home/label',       [ $this, 'breadcrumbs_home_label' ], 10, 2 );
        add_filter( 'taproot/breadcrumbs/home/url',         [ $this, 'breadcrumbs_home_url' ], 10, 2 );
        add_action( 'enqueue_block_editor_assets',          [ $this, 'remove_theme_settings' ], 100 );
        add_filter( 'woocommerce_add_to_cart_fragments',    [ $this, 'add_to_cart_fragment' ] );
        add_filter( 'wp_nav_menu_items',                    [ $this, 'add_menu_widget' ], 10, 2 );
    }

    /**
     * Add theme support for Woocommerce
     *
     * @since 2.0.0
     * @return void
     */
    public function add_theme_support() {
        add_theme_support( 'woocommerce' );
    }

    /**
     * Filters the path to the `woocommerce` template parts folder.  This filter
     * moves that folder to `views/woocommerce`.
     *
     * @since  2.0.0
     * @access public
     * @param  string  $path
     * @return string
     */
    public function template_path( $path ) {
        return "/views/{$path}";
    }

    /**
     * Remove Woocommerce breadcrumbs.
     *
     * We'll use our own.
     *
     * @since 2.0.0
     * @return void
     */
    public function remove_wc_breadcrumbs() {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    }

    /**
     * Fixes the archive title on the product archive.
     *
     * @since  2.0.0
     * @access public
     * @param  string  $title
     * @return string
     */
    public function get_the_archive_title( $title ) {

        if ( is_post_type_archive( 'product' ) && function_exists( 'woocommerce_page_title' ) ) {
            $title = woocommerce_page_title( false );
        }

        return $title;
    }

    /**
     * Fixes the archive description on the product archive.
     *
     * @since  2.0.0
     * @access public
     * @param  string  $desc
     * @return string
     */
    public function get_the_archive_description( $desc ) {

        if( is_post_type_archive( 'product' ) && function_exists( 'woocommerce_product_archive_description' ) ) {

            $shop = app('post-type/product/functions')->get_shop_id();

            if( $shop ) {
                $desc = get_post_field( 'post_content', $shop, 'raw' );
            }
        }

        return $desc;
    }

    /**
     * Breadcrumbs home label.
     *
     * Change the "home" label
     *
     * @since 2.0.0
     * @access public
     * @return string
     */
    public function breadcrumbs_home_label( $label, $post ) {

        if( 'product' === $post->post_type ) {
            return get_the_title( woocommerce_get_page_id( 'shop' ) );
        }

        return $label;
    }

    /**
     * Breadcrumbs home label.
     *
     * Change the "home" label
     *
     * @since 2.0.0
     * @access public
     * @return string
     */
    public function breadcrumbs_home_url( $url, $post ) {

        if( 'product' === $post->post_type ) {
            return get_permalink( woocommerce_get_page_id( 'shop' ) );
        }

        return $url;
    }

    /**
     * Remove theme settings on the shop page.
     *
     * @since 2.0.0
     * @access public
     * @return void
     */
    public function remove_theme_settings() {

        global $post;

        // If we're on the shop admin page, remove the script.
        if( app('post-type/product/functions')->get_shop_id() === $post->ID ) {
            wp_dequeue_script( 'taproot-editor' );
        }
    }

    /**
     * Refresh the header cart element when adding to cart.
     *
     * @since 2.0.0
     * @access public
     * @param array $fragments
     * @return array
     */
    public function add_to_cart_fragment( $fragments ) {
        $fragments['.cart-count'] = app('post-type/product/template')->get_cart_count();
        return $fragments;
    }

    /**
     * Add cart widget to nav menus.
     *
     * @since 2.0.0
     * @access public
     * @param string $items
     * @param string $args
     * @return string
     */
    public function add_menu_widget( $items, $args ) {

        $location = $args->theme_location;

        if( app('post-type/product/functions')->display_the_cart_widget( $location ) ) {
            $items .= app('post-type/product/template')->get_header_cart_markup( $location );
        }

        return $items;
    }
}
