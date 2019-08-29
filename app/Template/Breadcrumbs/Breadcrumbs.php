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
        add_filter( 'taproot/breadcrumbs/supported-post-types', [ $this, 'supported_post_types' ] );
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
     * Add post type support for breadcrumbs
     *
     * @since 1.4.0
     * @return array
     */
    public function supported_post_types($post_types) {

        if( theme_mod( 'posts--breadcrumbs--enable', true ) ) {
            $post_types[] = 'post';
        }

        if( theme_mod( 'pages--breadcrumbs--enable', true ) ) {
            $post_types[] = 'page';
        }

        return $post_types;
    }

}
