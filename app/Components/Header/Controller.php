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

namespace Taproot\Components\Header;

use Hybrid\Contracts\Bootable;
use Taproot\Tools\Mod;
use function Hybrid\app;
use function Hybrid\View\render;
use function wp_get_attachment_image_src as get_featured_url;
use function get_post_thumbnail_id as featured_id;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Controller implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'after_setup_theme', [ $this, 'add_theme_support' ], 15 );
        add_filter( 'hybrid/attr/app-header/class', [ $this, 'header_classes' ], 10, 2 );
        add_filter( 'hybrid/site/title', [ $this, 'site_title' ]  );
        add_filter( 'hybrid/site/description', [ $this, 'site_description' ]  );
        add_action( 'taproot/header/additional-content', [ $this, 'additional_content' ] );
        add_filter( 'theme_mod_header_image', [ $this, 'custom_header' ], 100 );
        add_filter( 'theme_mod_header--hero--overlay-color', [ $this, 'hero_overlay_color' ], 100 );
        add_filter( 'theme_mod_header--hero--overlay-opacity', [ $this, 'hero_overlay_opacity' ], 100 );
        add_filter( 'get_header_image_tag', [ $this, 'add_overlay' ], 100 );
        add_filter( 'taproot/editor-data', [ $this, 'editor_data' ] );
    }

    /**
     * Adds support for the custom header features.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function add_theme_support() {

        // Add custom logo support.
        add_theme_support( 'custom-logo', [
            'width'       => null,
            'height'      => null,
            'flex-width'  => null,
            'flex-height' => false,
            'header-text' => ''
        ] );

        // Add custom header support
        add_theme_support( 'custom-header', [
            'default-image'          => get_parent_theme_file_uri( '/dist/images/header.jpg' ),
            'random-default'         => false,
            'width'                  => 1920,
            'height'                 => 1080,
            'flex-height'            => true,
            'flex-width'             => true,
            'default-text-color'     => '',
            'header-text'            => true,
            'uploads'                => true,
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
            'video'                  => false,
            'video-active-callback'  => 'is_front_page'
        ] );

        // Register default header image
        register_default_headers([
            'default-image' => [
                'url'           => '%s/dist/images/header.jpg',
                'thumbnail_url' => '%s/dist/images/header.jpg',
                'description'   => __( 'Default Header Image', 'taproot' ),
            ],
        ]);
    }

    /**
     * Add classes to header
     *
     * @since 2.0.0
     * @return void
     */
    public function header_classes( $classes, $context) {

        // Fixed header
        if( Mod::get( 'header--fixed--is-fixed' ) ) {

            // Get the fixed header type
            $fixed_type = Mod::get( 'header--fixed--fixed-type' );

            // Don't do sticky headers on custom header pages
            if( $this->hasCustomHeader() && 'sticky' === $fixed_type ) {
                $classes[] = 'app-header--static';
            }
            else {
                $classes[] = 'app-header--has-fixed';
                $classes[] = 'app-header--static';
                $classes[] = sprintf( 'fixed-type--%s', $fixed_type );
            }
        }

        // Fullwidth header
        if( Mod::get( 'header--styles--fullwidth' ) ) {
            $classes[] = 'app-header--fullwidth';
        }
        else {
            $classes[] = 'app-header--standard-width';
        }

        // Header layout mobile
        if( 'vertical' === Mod::get( 'header--layout' ) ) {
            $classes[] = 'app-header--mobile--vertical';
        }
        else {
            $classes[] = 'app-header--mobile--horizontal';

        }

        // Header layout tablet
        if( 'vertical' === Mod::get( 'header--layout--tablet' ) ) {
            $classes[] = 'app-header--tablet--vertical';
        }
        else {
            $classes[] = 'app-header--tablet--horizontal';
        }

        // Header layout desktop
        if( 'vertical' === Mod::get( 'header--layout--desktop' ) ) {
            $classes[] = 'app-header--desktop--vertical';
        }
        else {
            $classes[] = 'app-header--desktop--horizontal';
        }

        // Boxed layout
        if( Mod::get( 'layout--boxed--enable' ) ) {
            $classes[] = 'boxed-layout';
        }

        // Topnav
        if ( has_nav_menu( 'top' ) ) {
            $classes[] = 'app-header--has-topnav';
        }

        // Custom header image
        if( $this->hasCustomHeader() ) {
            $classes[] = 'app-header--has-custom-header';
        }

        return $classes;
    }

    /**
     * Filter for Custom Header Image display
     *
     * Only display header image on front page
     *
     * @since 2.0.0
     * @return string
     */
    public function custom_header( $value = false ) {

        // Single posts pages and custom post types
        if( is_singular() ) {

            // Get hero type
            $header_image_type = app( 'header/template' )->get_custom_header_type();

            // No hero image
            if( 'none' === $header_image_type ) {
                return false;
            }

            // Featured image for hero
            elseif( 'featured' === $header_image_type ) {
                return get_featured_url( featured_id( get_the_ID() ), 'full', false )[0];
            }

            // Custom hero image
            elseif( 'custom' === $header_image_type ) {
                return get_post_meta( get_the_ID(), 'taproot_custom_header_image', true );
            }

            // Default hero image
            elseif( $value ) {
                return $value;
            }

            return false;
        }

        // Return the hero image value
        return $value;
    }

    /**
     * Does the page have a custom header?
     *
     * @since 2.0.0
     * @return void
     */
    public function hasCustomHeader() {

        // Get the custom header
        $custom_header = Mod::get( 'header_image', TRUE );

        // If string 'remove-header' return false.
        // This keyword is used by core.
        if( 'remove-header' === $custom_header ) {
            $custom_header = false;
        }

        // Is there a custom header or not
        return ( $custom_header ) ? true : false;
    }

    /**
     * Filter for custom header overlay color
     *
     *
     * @since 2.0.0
     * @param string
     * @return string
     */
    public function hero_overlay_color( $value ) {

        // Default homepage
        if ( is_front_page() && is_home() ) {
            return $value;
        }

        // Single posts pages and custom post types
        if( is_singular() ) {

            // Get the post id
            $post_id = get_the_ID();

            // Get the overlay type
            $overlay_color_type = get_post_meta( $post_id, 'taprooot_hero_overlay_type', true );

            // If custom overlay is set on the post, return the color value
            if( 'custom' === $overlay_color_type ) {
                return get_post_meta( $post_id, 'taprooot_hero_overlay_color', true );
            }

            // If no overlay option, return null
            elseif( 'none' === $overlay_color_type ) {
                return null;
            }
        }

        // Return the overlay color value
        return $value;
    }

    /**
     * Filter for custom header overlay display
     *
     *
     * @since 2.0.0
     * @param string
     * @return string
     */
    public function hero_overlay_opacity( $value ) {

        // Default homepage
        if ( is_front_page() && is_home() ) {
            return $value;
        }

        // Single posts pages and custom post types
        if( is_singular() ) {

            // Get the post id
            $post_id = get_the_ID();

            // Get the overlay type
            $overlay_color_type = get_post_meta( $post_id, 'taprooot_hero_overlay_type', true );

            // Custom overlay
            if( 'custom' === $overlay_color_type ) {
                return get_post_meta( $post_id, 'taprooot_hero_overlay_opacity', true );
            }

            // No overlay
            elseif( 'none' === $overlay_color_type ) {
                return null;
            }
        }

        return $value;
    }

    /**
     * Filter for custom header overlay display
     *
     *
     * @since 2.0.0
     * @param string
     * @return string
     */
    public function add_overlay( $html ) {
        return $html . app('header/template')->get_overlay();
    }

    /**
     * Add Additional Header Content
     *
     * @since 2.0.0
     * @param string
     * @return string
     */
    public function additional_content() {

        // Get single post setting
        $display = get_post_meta( get_the_ID(), 'taproot_post_title_display', true );

        // If the post is not set to display title in hero or if not singular, bail.
        if( 'header' !== $display || ! is_singular() ) return;

        \Hybrid\View\display( 'partials/custom-header-content' );
    }

    /**
     * Display Site Title filter
     *
     * @since 2.0.0
     * @param string    $title
     * @return string
     */
    public function site_title( $title ) {
        return ( Mod::get( 'header--title--enable' ) ) ? $title : false;
    }

    /**
     * Display Site Tagline filter
     *
     * @since 2.0.0
     * @param string    $tagline
     * @return string
     */
    public function site_description( $description ) {
        return ( Mod::get( 'header--tagline--enable' ) ) ? $description : false;
    }

    /**
     * Add Editor data.
     *
     * @since 2.0.0
     * @param array     $data
     * @return array
     */
    public function editor_data( $data = [] ) {

        $header_image = Mod::get( 'header_image', get_parent_theme_file_uri('/dist/images/header.jpg') );

        if ('remove-header' === $header_image ) {
            $header_image = false;
        }

        $newData = [
            "headerImage"               => $header_image,
            "headerOverlayColor"        => Mod::get( 'header--hero--overlay-color' ),
            "headerOverlayOpacity"      => Mod::get( 'header--hero--overlay-opacity' ),
            "headerHeroDefaultColor"    => Mod::get( 'header--hero--text-color', Mod::get( 'header--text-color' ) ),
            "headerHeroHoverColor"      => Mod::get( 'header--hero--link-color--hover', Mod::get( 'header--hero--text-color', Mod::get( 'header--text-color' ) ) ),
        ];

        return array_merge( $data, $newData );
    }
}
