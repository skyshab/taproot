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

namespace Taproot\Template\Footer;

use Hybrid\Contracts\Bootable;
use function Taproot\Customize\theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Footer implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'hybrid/attr/app-footer/class', [ $this, 'footer_classes' ], 100, 2  );
        add_action( 'taproot/footer-widgets', [ $this, 'footer_sidebars' ] );
        add_action( 'taproot/footer-credits', [ $this, 'footer_credits' ] );
    }


    /**
     *  Add classes to footer
     *
     * @since 1.0.0
     * @return void
     */
    public function footer_classes( $classes, $context ) {

        if( theme_mod( 'footer--styles--fixed' ) ) {
            $classes[] = 'app-footer--has-fixed';
            $classes[] = 'app-footer--fixed';
        }

        if( theme_mod( 'footer--styles--fullwidth' ) ) {
            $classes[] = 'app-footer--fullwidth';
        } else {
            $classes[] = 'app-footer--standard-width';
        }

        if( theme_mod( 'layout--boxed--enable' ) ) {
            $classes[] = 'boxed-layout';
        }

        return $classes;
    }


    /**
     *  Get Array of Footer Sidebars
     *
     * @since 1.0.0
     * @return array - Returns an array of footer sidebar ids and Names
     */
    public function get_footer_sidebars() {

        $footer_sidebars = array(
            'footer-1' => 'Footer Sidebar 1',
            'footer-2' => 'Footer Sidebar 2',
            'footer-3' => 'Footer Sidebar 3',
            'footer-4' => 'Footer Sidebar 4'
        );

        return apply_filters( 'taproot/footer-sidebars/list', $footer_sidebars );
    }


    /**
     *  Has Active Footer Sidebars?
     *
     * @since 1.0.0
     * @return bool
     */
    public function has_active_footer_sidebars() {

        $has_footer_sidebars = false;

        foreach ( $this->get_footer_sidebars() as $sidebar => $name ) {
            if( is_active_sidebar( $sidebar ) ) {
                $has_footer_sidebars = true;
                break;
            }
        }

        return ( $has_footer_sidebars ) ? true : false;
    }


    /**
     *  Get Footer Sidebars
     *
     * @since 1.0.0
     * @return void
     */
    public function footer_sidebars() {

        if( $this->has_active_footer_sidebars() ): ?>
           <div class="app-footer__widgets">
        <?php endif; ?>

        <?php foreach ( $this->get_footer_sidebars() as $sidebar => $name ): ?>
            <?php if( is_active_sidebar( $sidebar ) && function_exists( 'dynamic_sidebar' ) ): ?>

                <aside id="<?php echo esc_attr( $sidebar ) ?>" class="app-footer__sidebar <?php echo esc_attr( $sidebar ) ?>" role="complementary">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </aside>

            <?php endif; ?>
        <?php endforeach ?>

        <?php if( $this->has_active_footer_sidebars() ): ?>
            </div>
        <?php endif;
    }


    /**
     * Output Footer Credits
     *
     * We need to run this through kses filter with allwoances for certain html and shortcodes
     *
     * @since 1.0.0
     * @return string
     */
    public function footer_credits() {

        // define allowed html
        $allowed = [
            'a' => [
                'href' => [],
                'title' => [],
                'class' => []
            ],
            'br' => [],
            'em' => [],
            'strong' => [],
            'i' => [
                'class' => []
            ]
        ];

        echo wp_kses( theme_mod( 'footer--bottom-bar--content', true ), $allowed );
    }

}
