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
use function Taproot\Customize\theme_mod;
use function Hybrid\View\render;
use function Hybrid\Post\render_title;
use function Hybrid\Post\render_date;
use function Taproot\Template\Icons\location as icon;
use function Taproot\Template\render_author;
use function wp_get_attachment_image_src as get_featured_url;
use function get_post_thumbnail_id as featured_id;
use function Taproot\Template\get_custom_header_type;
use function Taproot\Template\dimRatioToClass;
use function Taproot\Template\get_overlay;

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
        add_filter( 'theme_mod_header_image', [ $this, 'custom_header' ], 100 );
        add_action( 'taproot/header/additional-content', [ $this, 'additional_content' ] );
        add_filter( 'theme_mod_header--hero--overlay-color', [ $this, 'hero_overlay_color' ], 100 );
        add_filter( 'theme_mod_header--hero--overlay-opacity', [ $this, 'hero_overlay_opacity' ], 100 );
        add_filter( 'get_header_image_tag', [ $this, 'add_overlay' ], 100 );
    }


    /**
     *  Add classes to header
     *
     * @since 1.0.0
     * @return void
     */
    public function header_classes( $classes, $context) {

        // fixed header - don't do sticky headers on custom header pages
        if( theme_mod( 'header--styles-fixed--fixed', true ) ) {
            $fixed_type = theme_mod( 'header--styles-fixed--type', true );

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
        if( theme_mod( 'header--styles--fullwidth' ) )
            $classes[] = 'app-header--fullwidth';
        else
            $classes[] = 'app-header--standard-width';

        // branding mobile
        if( theme_mod( 'branding--layout', true ) === 'vertical' )
            $classes[] = 'app-header--mobile--vertical';
        else
            $classes[] = 'app-header--mobile--horizontal';

        // branding tablet
        if( theme_mod( 'branding--layout--tablet', true ) === 'vertical' )
            $classes[] = 'app-header--tablet--vertical';
        else
            $classes[] = 'app-header--tablet--horizontal';

        // branding desktop
        if( theme_mod( 'branding--layout--desktop', true ) === 'vertical' )
            $classes[] = 'app-header--desktop--vertical';
        else
            $classes[] = 'app-header--desktop--horizontal';

        // boxed layout
        if( theme_mod( 'layout--boxed--enable' ) )
            $classes[] = 'boxed-layout';

        // if has topnav
        if ( has_nav_menu( 'top' ) )
            $classes[] = 'app-header--has-topnav';

        // if has custom header image
        if( $this->hasCustomHeader() )
            $classes[] = 'app-header--has-custom-header';

        return $classes;
    }


    /**
     * Filter for Custom Header Image display
     *
     * Only display header image on front page
     *
     * @since 1.0.0
     * @return string
     */
    public function custom_header( $value = false ) {


        // Customizer uses this filter to get the current set image
        if ( is_admin() ) {
            return $value;
        }

        // Default homepage
        if ( is_front_page() && is_home() ) {
            return $value;
        }

        // Single posts pages and custom post types
        if( is_singular() ) {

            $header_image_type = get_custom_header_type();

            if( 'none' === $header_image_type ) {
                return false;
            }
            elseif( 'featured' === $header_image_type ) {
                return get_featured_url( featured_id( get_the_ID() ), 'full', false )[0];
            }
            elseif( 'custom' === $header_image_type ) {
                return get_post_meta( get_the_ID(), 'taproot_custom_header_image', true );
            }
            elseif( $value ) {
                return $value;
            }

            return false;
        }
    }


    /**
     * Does the page have a custom header?
     *
     * @since 1.0.0
     * @return void
     */
    public function hasCustomHeader() {

        $custom_header = theme_mod('header_image', true);
        if('remove-header' === $custom_header) {
            $custom_header = false;
        }

        return ($custom_header && '' !== $custom_header) ? true : false;
    }


    /**
     * Filter for custom header overlay display
     *
     *
     * @since 1.0.0
     * @param string
     * @return string
     */
    public function hero_overlay_color( $value ) {

        // Customizer uses this filter to get the current set image
        if ( is_admin() ) {
            return $value;
        }

        // Default homepage
        if ( is_front_page() && is_home() ) {
            return $value;
        }

        // Single posts pages and custom post types
        if( is_singular() ) {
            $post_id = get_the_ID();
            $overlay_color_type =  get_post_meta( $post_id, 'taprooot_hero_overlay_type', true );

            if('custom' === $overlay_color_type) {
                return get_post_meta( $post_id, 'taprooot_hero_overlay_color', true );
            }
            elseif('none' === $overlay_color_type) {
                return null;
            }
        }

        return $value;
    }


    /**
     * Filter for custom header overlay display
     *
     *
     * @since 1.0.0
     * @param string
     * @return string
     */
    public function hero_overlay_opacity( $value ) {

        // Customizer uses this filter to get the current set image
        if ( is_admin() ) {
            return $value;
        }

        // Default homepage
        if ( is_front_page() && is_home() ) {
            return $value;
        }

        // Single posts pages and custom post types
        if( is_singular() ) {
            $post_id = get_the_ID();
            $overlay_color_type =  get_post_meta( $post_id, 'taprooot_hero_overlay_type', true );

            if('custom' === $overlay_color_type) {
                return get_post_meta( $post_id, 'taprooot_hero_overlay_opacity', true );
            }
            elseif('none' === $overlay_color_type) {
                return null;
            }
        }

        return $value;
    }


    /**
     * Filter for custom header overlay display
     *
     *
     * @since 1.0.0
     * @param string
     * @return string
     */
    public function add_overlay( $html ) {
        return $html . get_overlay();
    }


    /**
     * Add Additional Header Content
     *
     * @since 1.0.0
     * @param string
     * @return string
     */
    public function additional_content() {

        $display = get_post_meta( get_the_ID(), 'taproot_post_title_display', true );
        if( 'header' !== $display || !is_singular() ) return;

        $post_type = get_post_type( get_the_ID() );

        // open container
        $header_additional_content = '<div class="additional-header-content__container container">';

        $header_additional_content .= render_title([
            'class' => sprintf('additional-header-content__title additional-header-content__title--%s has-text-align-center', $post_type)
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

        //close container
        $header_additional_content .=  '</div>';

        echo $header_additional_content;
    }

}
