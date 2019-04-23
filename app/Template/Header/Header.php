<?php
/**
 * Header Template class
 *
 * This file contains callbacks for hooks within the site header.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Header;

use Hybrid\Contracts\Bootable;
use function Rootstrap\get_theme_mod;
use function Hybrid\View\render;
use function Hybrid\Post\render_title;
use function Hybrid\Post\render_date;
use function Hybrid\Carbon\Image\render as get_featured_img;
use function Taproot\Template\Icons\location as icon;
use function Taproot\Template\render_author;


use function wp_get_attachment_image_src as get_featured_url;
use function get_post_thumbnail_id as featured_id;

/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Header implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'hybrid/attr/app-header/class', [ $this, 'header_classes' ], 10, 2 );
        add_filter( 'theme_mod_header_image', [ $this, 'custom_header' ] );
        add_filter( 'taproot/header/additional-content', [ $this, 'additional_content' ] );
    }


    /**
     *  Add classes to header
     *
     * @since 1.0.0
     * @return void
     */
    public function header_classes( $classes, $context) {

        // fixed header - don't do sticky headers on custom header pages
        if( get_theme_mod( 'header--styles-fixed--fixed', null, true ) ) {
            $fixed_type = get_theme_mod( 'header--styles-fixed--type', null, true );

            if( $this->hasCustomHeader() && 'sticky' === $fixed_type ) {
                $classes[] = 'app-header--static';
            }
            else {
                $classes[] = 'app-header--has-fixed';
                $classes[] = 'app-header--static';
                $classes[] = sprintf( 'fixed-type--%s', $fixed_type );
            }
        }

        // fullwidth header
        if( get_theme_mod( 'header--styles--fullwidth' ) )
            $classes[] = 'app-header--fullwidth';
        else
            $classes[] = 'app-header--standard-width';

        // branding mobile
        if( get_theme_mod( 'branding--layout-mobile--layout', null, true ) === 'vertical' )
            $classes[] = 'app-header--mobile--vertical';
        else
            $classes[] = 'app-header--mobile--horizontal';

        // branding tablet
        if( get_theme_mod( 'branding--layout-tablet--layout', null, true ) === 'vertical' )
            $classes[] = 'app-header--tablet--vertical';
        else
            $classes[] = 'app-header--tablet--horizontal';

        // branding desktop
        if( get_theme_mod( 'branding--layout-desktop--layout', null, true ) === 'vertical' )
            $classes[] = 'app-header--desktop--vertical';
        else
            $classes[] = 'app-header--desktop--horizontal';

        // boxed layout
        if( get_theme_mod( 'layout--boxed--enable' ) )
            $classes[] = 'boxed-layout';

        return $classes;
    }


    /**
     * Filter for Custom Header Image display
     *
     * Only display header image on front page
     *
     * @since 1.0.0
     * @return void
     */
    public function custom_header( $value ) {
        $post_custom_header = get_post_meta( get_the_ID(), '_taproot_custom_header_image', true );
        $use_featured = get_post_meta( get_the_ID(), '_taproot_use_featured_image_for_header', true );

        if( is_front_page() || is_admin() ) {
            return $value;
        }
        elseif( is_singular() ) {
            if( $use_featured && '' !== $use_featured ) {
                return get_featured_url( featured_id( get_the_ID() ), 'full', false )[0];
            }
            elseif( $post_custom_header ) {
                return $post_custom_header;
            }
        }
    }


    /**
     * Does the page have a custom header?
     *
     * @since 1.0.0
     * @return void
     */
    public function hasCustomHeader() {
        $post_custom_header = get_post_meta( get_the_ID(), '_taproot_custom_header_image', true );
        if( $post_custom_header ) {
            return true;
        }
        elseif( get_theme_mod('header_image') && get_theme_mod('header_image') !== 'remove-header' ) {
            return true;
        }
        return false;
    }


    /**
     * Add Additional Header Content
     *
     * @since 1.0.0
     * @param string
     * @return string
     */
    public function additional_content( $content ) {

        $display = get_post_meta( get_the_ID(), '_taproot_post_title_display', true );
        if( 'header' !== $display || !is_singular() ) return $content;

        $post_type = get_post_type( get_the_ID() );

        $header_additional_content = render_title([
            'class' => sprintf('additional-header-content__title additional-header-content__title--%s', $post_type)
        ]);

        if( is_single() ) {
            $header_additional_content .=  '<p class="additional-header-content__meta">';
                $header_additional_content .= render_author([
                    'class' => sprintf('additional-header-content__author additional-header-content__author--%s', $post_type),
                    'before' => icon( 'author', ['icon' => 'user'] )
                ]);
                $header_additional_content .= render_date([
                    'class' => sprintf('additional-header-content__published additional-header-content__published--%s', $post_type),
                    'before' => icon( 'date', ['icon' => 'calendar'] )
                ]);
            $header_additional_content .=  '</p>';
        }

        return $header_additional_content;
    }

}
