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

namespace Taproot\Template\Sidebar;

use Hybrid\Contracts\Bootable;
use function Taproot\Template\get_layout;
use function Taproot\Customize\theme_mod;

/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Sidebar implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

        add_filter( 'hybrid/view/sidebar/hierarchy', [ $this, 'display' ] );
        add_filter( 'hybrid/attr/sidebar/class', [ $this, 'classes' ] );
        add_action( 'widgets_init', [ $this, 'widgets_init' ], 5 );
    }


    /**
     * Register sidebars.
     *
     * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
     * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function widgets_init() {

        $args = [
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget__title">',
            'after_title'   => '</h3>'
        ];

        register_sidebar( [
            'id'   => 'primary',
            'name' => esc_html_x( 'Primary', 'sidebar', 'taproot' )
        ] + $args );


        $footer_args = [
            'before_widget' => '<section id="%1$s" class="widget app-footer__widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="app-footer__widget__title">',
            'after_title'   => '</h3>'
        ];

        // Register the 4 footer sidebars
        for($i = 1; $i <= 4; $i++) {
            register_sidebar( [
                'id'   => "footer-{$i}",
                /* translators: name of each footer widget area */
                'name' => sprintf( esc_html__( 'Footer %s', 'taproot' ), $i )
            ] + $footer_args );
        }

    }



    /**
     *  Display Sidebar?
     *
     * @since 1.0.0
     * @return void
     */
    public function display( $hierarchy ) {

        // if not a sidebar page, return empty array
        if( 'full' ===  get_layout() )
            return [];

        // otherwise, carry on
        return $hierarchy;
    }


    /**
     *  Sidebar Classes
     *
     * @since 1.0.0
     * @return void
     */
    public function classes( $classes ) {

        if( get_layout() !== 'full' )
            $classes[] = sprintf( 'sidebar--%s', get_layout() );

        if( theme_mod( 'layout--boxed--enable' ) )
            $classes[] = 'boxed-layout';
        else
            $classes[] = 'fullscreen-layout';

        return $classes;
    }

}
