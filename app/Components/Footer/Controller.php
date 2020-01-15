<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Footer;

use Hybrid\Contracts\Bootable;
use function Taproot\Tools\theme_mod;

/**
 * Handles front end logic
 *
 * @since  2.0.0
 * @access public
 */
class Controller implements Bootable {

    /**
     * Class to handle component actions.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'hybrid/attr/app-footer/class', [ $this, 'footer_classes' ], 100, 2  );
        add_action( 'taproot/footer-widgets', [ $this, 'footer_sidebars' ] );
        add_action( 'taproot/footer-credits', [ $this, 'footer_credits' ] );
        add_action( 'widgets_init', [ $this, 'register_sidebars' ], 5 );
    }

    /**
     *  Add classes to footer
     *
     * @since 2.0.0
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
     * @since 2.0.0
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
     * @since 2.0.0
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
     * @since 2.0.0
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
        for($i = 1; $i <= 4; $i++) {
            register_sidebar( [
                'id'   => "footer-{$i}",
                /* translators: name of each footer widget area */
                'name' => sprintf( esc_html__( 'Footer %s', 'taproot' ), $i )
            ] + $args );
        }
    }

    /**
     * Output Footer Credits
     *
     * We need to run this through kses filter with allwoances for certain html and shortcodes
     *
     * @since 2.0.0
     * @return string
     */
    public function footer_credits() {
        Functions::footer_credits();
    }
}
