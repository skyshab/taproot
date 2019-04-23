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

namespace Taproot\Template\Body;

use Hybrid\Contracts\Bootable;
use function Rootstrap\get_theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Body implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'body_class', [ $this, 'body_classes' ] );
    }


    /**
     *  Add classes to body
     *
     * @since 1.0.0
     * @return void
     */
    public function body_classes( $classes ) {

        // add class for boxed layout
        if( get_theme_mod('layout--boxed--enable') ) {
            $classes[] = 'boxed-layout';
        }

        return $classes;
    }

}
