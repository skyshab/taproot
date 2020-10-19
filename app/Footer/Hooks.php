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

namespace Taproot\Footer;

use Hybrid\Contracts\Bootable;
use function Hybrid\app;

/**
 * Handles front end logic
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Class to handle component actions.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'widgets_init',                 [ $this, 'register_sidebars' ], 5 );
        add_filter( 'hybrid/attr/app-footer/class', [ $this, 'footer_classes' ], 100, 2  );
        add_action( 'taproot/footer-widgets',       [ $this, 'footer_sidebars' ] );
        add_action( 'taproot/footer-credits',       [ $this, 'footer_credits' ] );
        add_action( 'customize_register', [ $this, 'customize_register' ], PHP_INT_MAX );
    }

    /**
     * Register footer sidebars.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function register_sidebars() {

        $args = [
            'before_widget' => '<section id="%1$s" class="widget app-footer__widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="app-footer__widget__title">',
            'after_title'   => '</h3>'
        ];

        // Register the 4 footer sidebars
        for( $i = 1; $i <= 4; $i++ ) {
            register_sidebar( [
                'id'   => "footer-{$i}",
                /* translators: name of each footer widget area */
                'name' => sprintf( esc_html__( 'Footer %s', 'taproot' ), $i )
            ] + $args );
        }
    }

    /**
     *  Add classes to footer
     *
     * @since 2.0.0
     * @return void
     */
    public function footer_classes( $classes, $context ) {

        if( app('footer/functions')->has_fixed_footer() ) {
            $classes[] = 'app-footer--has-fixed';
        }

        return $classes;
    }

    /**
     *  Get Footer Sidebars
     *
     * @since 2.0.0
     * @return void
     */
    public function footer_sidebars() {
        app('footer/template')->the_footer_sidebars();
    }

    /**
     * Output Footer Credits
     *
     * @since 2.0.0
     * @return void
     */
    public function footer_credits() {
        app('footer/template')->the_footer_credits();
    }

    /**
     * Customize Register
     *
     * @since  2.0.0
     * @access public
     * @param object $manager
     * @return void
     */
    public function customize_register( $manager ) {

        // make footer sidebars appear in the customizer last
        if( $manager->get_section( 'sidebar-widgets-footer-1' ) ) {
            $manager->get_section( 'sidebar-widgets-footer-1' )->priority = 500;
        }

        if( $manager->get_section( 'sidebar-widgets-footer-2' ) ) {
            $manager->get_section( 'sidebar-widgets-footer-2' )->priority = 510;
        }

        if( $manager->get_section( 'sidebar-widgets-footer-3' ) ) {
            $manager->get_section( 'sidebar-widgets-footer-3' )->priority = 520;
        }

        if( $manager->get_section( 'sidebar-widgets-footer-4' ) ) {
            $manager->get_section( 'sidebar-widgets-footer-4' )->priority = 530;
        }
    }
}
