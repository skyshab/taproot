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

namespace Taproot\Components\Woocommerce;

use Hybrid\Contracts\Bootable;

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
        add_filter( 'taproot/breadcrumbs/home/label',       [ $this, 'breadcrumbs_home_label' ], 10, 2 );
        add_filter( 'taproot/breadcrumbs/home/url',         [ $this, 'breadcrumbs_home_url' ], 10, 2 );
    }

    /**
     * Breadcrumbs home label.
     *
     * Change the "home" label
     *
     * @since 2.0.0
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
     * @return string
     */
    public function breadcrumbs_home_url( $url, $post ) {

        if( 'product' === $post->post_type ) {
            return get_permalink( woocommerce_get_page_id( 'shop' ) );
        }

        return $url;
    }
}
