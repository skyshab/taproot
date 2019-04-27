<?php
/**
 * Blog Template class
 *
 * This file contains callbacks for hooks within the blog pages.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Main;

use Hybrid\Contracts\Bootable;
use function Taproot\Template\get_layout;
use function Taproot\Customize\theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Main implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'hybrid/attr/app-main', [ $this, 'attr' ] );
        add_filter( 'hybrid/attr/app-main/class', [ $this, 'classes' ] );
    }


    /**
     *  Main ID
     *
     * @since 1.0.0
     * @return void
     */
    public function attr( $attr ) {

        $attr['id'] = "main";

        return $attr;
    }


    /**
     *  Main Classes
     *
     * @since 1.0.0
     * @return void
     */
    public function classes( $classes ) {

        if( 'full' ===  get_layout() )
            $classes[] = 'app-main--full';
        else
            $classes[] = sprintf( ' app-main--sidebar-%s', get_layout() );

        if( theme_mod( 'layout--boxed--enable' ) )
            $classes[] = 'boxed-layout';
        else
            $classes[] = 'fullscreen-layout';

        return $classes;
    }

}
