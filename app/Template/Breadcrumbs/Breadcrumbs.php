<?php
/**
 * Template Classes class.
 *
 * This file contains the logic that determines output of template classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Breadcrumbs;

use Hybrid\Contracts\Bootable;
use Hybrid\Breadcrumbs\Trail as Trail;
use function Taproot\Template\Icons\get as icon;
use function Taproot\Customize\theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Breadcrumbs implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'hybrid/breadcrumbs/trail', [ $this, 'breadcrumbs_home_icon' ] );
        add_action( 'taproot/template/breadcrumbs', [ $this, 'render' ] );
    }


    /**
     * Add breadcrumbs home icon
     *
     * @since 1.0.0
     * @param string    $html
     * @return string
     */
    public function breadcrumbs_home_icon( $html ) {
        if( !theme_mod( 'elements--breadcrumbs--home-icon', true ) ) return $html;
        return str_replace('<span itemprop="name">Home</span>', icon('home'), $html );
    }


    /**
     * Get post types that support breadcrumbs
     *
     * @since 1.3.0
     * @return array
     */
    public function supported_post_types() {

        $supported_types = [];

        if( theme_mod( 'posts--breadcrumbs--enable', true ) ) {
            $supported_types[] = 'post';
        }

        if( theme_mod( 'pages--breadcrumbs--enable', true ) ) {
            $supported_types[] = 'page';
        }

        return apply_filters('taproot/breadcrumbs/supported-post-types', $supported_types );
    }


    /**
     * Render breadcrumbs
     *
     * @since 1.0.0
     * @param string    $html
     * @return string
     */
    public function render( $args ) {

        // check if breadcrumbs are enabled
        if( !theme_mod( 'elements--breadcrumbs--enable', true ) ) return;

        // check if current post type supports breadcrumbs
        if( !in_array( get_post_type(), $this->supported_post_types() ) ) return;

        // render the breadcrumbs
        Trail::display();
    }

}
