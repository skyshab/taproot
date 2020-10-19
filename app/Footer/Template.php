<?php
/**
 * Footer Template Tags.
 *
 * This class contains helper functions for use in footer templates and settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Footer;

use function Hybrid\app;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Get the footer credits
     *
     * Run this through kses filter with allwoances for certain html and shortcodes
     *
     * @since 2.0.0
     * @return string
     */
    public static function get_the_footer_credits() {

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

        return wp_kses( app('footer/functions')->get_the_footer_credits(), $allowed );
    }

    /**
     * Print the footer credits
     *
     * @since 2.0.0
     * @return string
     */
    public static function the_footer_credits() {
        echo static::get_the_footer_credits();
    }

    /**
     *  Get Footer Sidebars
     *
     * @since 2.0.0
     * @return void
     */
    public function the_footer_sidebars() {

        if( app('footer/functions')->has_active_footer_sidebars() ): ?>
           <div class="app-footer__widgets">
        <?php endif; ?>

        <?php foreach( app('footer/functions')->get_the_footer_sidebars() as $sidebar => $name ): ?>
            <?php if( is_active_sidebar( $sidebar ) && function_exists( 'dynamic_sidebar' ) ): ?>

                <aside id="<?php echo esc_attr( $sidebar ) ?>" class="app-footer__sidebar <?php echo esc_attr( $sidebar ) ?>" role="complementary">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </aside>

            <?php endif; ?>
        <?php endforeach ?>

        <?php if( app('footer/functions')->has_active_footer_sidebars() ): ?>
            </div>
        <?php endif;
    }
}
