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
use function Taproot\Tools\get_the_single_id;
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
        add_action( 'taproot/header/content', [ $this, 'hero_content' ] );
        add_filter( 'get_header_image_tag', [ $this, 'add_overlay' ], 100 );
        add_filter( 'taproot/editor-data', [ $this, 'editor_data' ] );
        add_filter( 'taproot/featured-image/display', [ $this, 'featured_image_display' ], 10, 2 );
        add_filter( 'taproot/entry/title', [ $this, 'post_title_display' ] );
        add_filter( 'hybrid/view/entry/byline/hierarchy', [ $this, 'post_byline_display' ] );
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
            if( app( 'header/template' )->has_custom_header_url() && 'sticky' === $fixed_type ) {
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

        // Custom header
        if( app( 'header/template' )->has_custom_header() ) {
            $classes[] = 'app-header--has-custom-header';
        }

        // Custom header
        if( app( 'header/template' )->has_custom_header_url() ) {
            $classes[] = 'app-header--has-custom-header-image';
        }

        // Add the type in the customize preview, even if there isn't a current image.
        // This allows populating the "default" image where needed.
        if( is_customize_preview() || app( 'header/template' )->has_custom_header_url() ) {

            // If header type, add class
            if( $header_type = app( 'header/template' )->get_custom_header_type() ) {
                $classes[] = sprintf( 'app-header--has-custom-header--%s', $header_type );
            }
        }

        return $classes;
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

        if ( is_front_page() && is_home() ) {

            $html .= app('header/template')->get_custom_header_overlay();
        }

        return $html;
    }

    /**
     * Add Additional Header Content
     *
     * @since 2.0.0
     * @param string
     * @return string
     */
    public function hero_content() {

        if( ! app('header/template')->has_custom_header_title() ) {
            return;
        }

        \Hybrid\View\display( 'partials/app-header-hero' );
    }

    /**
     * Post byline display.
     *
     * Don't display post byline if we are showing it in the header.
     *
     * @since 2.0.0
     * @param array
     * @return array.
     */
    public function post_byline_display( $hierarchy ) {

        $post_id = get_the_single_id();

        if( $post_id ) {

            // Get the title display option.
            $display = get_post_meta( $post_id, 'taproot_post_title_display', true );

            // Are we showing the post title in the header or hiding it?
            if( 'header' === $display  || 'hide' === $display ) {
                return [];
            }
        }

        // Otherwise, display the post header as per the hierarchy
        return $hierarchy;
    }


    /**
     * Featured Image display.
     *
     * Don't display featured image if we are showing it in the header.
     *
     * @since 2.0.0
     * @param array
     * @return array.
     */
    public function featured_image_display( $display, $type ) {

        if( is_singular() ) {
            if( 'featured' === app('header/template')->get_custom_header_type() && 'header' !== $type ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Post title and meta display.
     *
     * Don't display post title and meta if we are showing them in the header.
     *
     * @since 2.0.0
     * @param array
     * @return array
     */
    public function post_title_display( $markup ) {

        $post_id = get_the_single_id();

        if( $post_id ) {

            // Get the title display option.
            $display = get_post_meta( $post_id, 'taproot_post_title_display', true );

            // Are we showing the post title in the header or hiding it?
            if( 'header' === $display  || 'hide' === $display ) {
                return '';
            }
        }

        // Otherwise, display the post header item
        return $markup;
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
