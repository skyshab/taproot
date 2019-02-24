<?php
/**
 * Template Classes class.
 *
 * This file contains the logic that determines output of template classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Breadcrumbs;

use Hybrid\Contracts\Bootable;
use Hybrid\Breadcrumbs\Trail as Trail;
use function Taproot\Template\Icons\get as icon;
use function Rootstrap\get_theme_mod;


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
    function breadcrumbs_home_icon( $html ) {
        if( !get_theme_mod( 'elements--breadcrumbs--home-icon', null, true ) ) return $html;
        return str_replace('<span itemprop="name">Home</span>', icon('home'), $html );
    }


    /**
     * Render breadcrumbs
     *
     * @since 1.0.0
     * @param string    $html
     * @return string
     */
    function render( $args ) {
        if( !get_theme_mod( 'elements--breadcrumbs--enable', null, true ) ) return;
        Trail::display();
    }    

}
