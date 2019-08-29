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

namespace Taproot\Template\Singular;

use Hybrid\Contracts\Bootable;
use function Taproot\Customize\theme_mod;
use function Taproot\Template\get_custom_header_type;
use Rootstrap\Styles\Styles;
use function Rootstrap\Screens\screens;

/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Singular implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'post_class', [ $this, 'entry_classes' ]  );
        add_filter( 'hybrid/view/entry/header/hierarchy', [ $this, 'post_header_display' ] );
        add_filter( 'taproot/template/featured-image/display', [ $this, 'featured_image_display' ], 10, 2 );
        add_filter( 'rootstrap/styles/singular', [ $this, 'styles'] );
    }


    /**
     *  Add classes to posts
     *
     * @since 1.0.0
     * @return void
     */
    public function entry_classes( $classes ) {

        if ( is_singular() ) {
            $classes[] = 'entry--single';
        }

        return $classes;
    }



    /**
     * Post title and meta display.
     *
     * Don't display post title and meta if we are showing them in the header.
     *
     * @since 1.0.0
     * @param array
     * @return array.
     */
    public function post_header_display( $hierarchy ) {
        $display = get_post_meta( get_the_ID(), 'taproot_post_title_display', true );
        if( 'header' === $display  || 'hide' === $display ) {
            return [];
        }

        return $hierarchy;
    }


    /**
     * Featured Image display.
     *
     * Don't display featured image if we are showing it in the header.
     *
     * @since 1.0.0
     * @param array
     * @return array.
     */
    public function featured_image_display( $display, $type ) {
        if( is_singular() ) {

            if( 'featured' === get_custom_header_type() && 'header' !== $type ) {
                return false;
            }
        }
        return true;
    }



    /**
     * Get Singular styles
     *
     * @since 1.4.0
     */
    public function styles( $styles ) {

        // Custom Property: Default Hero Header Color
        $styles->custom_property([
            'name' => 'header--hero--default-color',
            'value' => get_post_meta( get_the_ID(), 'taprooot_hero_default_color', true ),
        ]);

        // Custom Property: Default Hero Header Link Hover Color
        $styles->custom_property([
            'name' => 'header--hero--link-color--hover',
            'value' => get_post_meta( get_the_ID(), 'taprooot_hero_default_hover_color', true ),
        ]);

        return $styles;
    }

}
