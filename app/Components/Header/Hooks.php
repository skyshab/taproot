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

namespace Taproot\Components\Header;

use Hybrid\Contracts\Bootable;
use Taproot\Tools\Mod;
use function Hybrid\app;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'after_setup_theme',                    [ $this, 'add_theme_support' ], 15 );
        add_filter( 'hybrid/attr/app-header/class',         [ $this, 'header_classes' ], 10, 2 );
        add_filter( 'hybrid/site/title',                    [ $this, 'site_title' ] );
        add_filter( 'hybrid/site/description',              [ $this, 'site_description' ] );
        add_filter( 'taproot/editor-data',                  [ $this, 'editor_data' ] );
        add_filter( 'hybrid/view/header/content/hierarchy', [ $this, 'header_content_display' ] );
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
            'default-image'          => app('header/functions')->get_default_custom_header_url(),
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
        if( app('header/functions')->has_fixed_header() ) {

            // Get the fixed header type
            $fixed_type = app('header/functions')->get_fixed_header_type();

            // Don't do sticky headers on custom header pages
            if( app('header/functions')->has_header_image_url() && 'sticky' === $fixed_type ) {
                $classes[] = 'app-header--static';
            }
            else {
                $classes[] = 'app-header--has-fixed';
                $classes[] = 'app-header--static';
                $classes[] = sprintf( 'fixed-type--%s', $fixed_type );
            }
        }

        // Header layout mobile
        if( 'vertical' === app('header/functions')->get_header_layout( 'mobile' ) ) {
            $classes[] = 'app-header--mobile--vertical';
        }
        else {
            $classes[] = 'app-header--mobile--horizontal';

        }

        // Header layout tablet
        if( 'vertical' === app('header/functions')->get_header_layout( 'tablet' ) ) {
            $classes[] = 'app-header--tablet--vertical';
        }
        else {
            $classes[] = 'app-header--tablet--horizontal';
        }

        // Header layout desktop
        if( 'vertical' === app('header/functions')->get_header_layout( 'desktop' ) ) {
            $classes[] = 'app-header--desktop--vertical';
        }
        else {
            $classes[] = 'app-header--desktop--horizontal';
        }

        // Topnav
        if ( has_nav_menu( 'top' ) ) {
            $classes[] = 'app-header--has-topnav';
        }

        // Custom header
        if( app('header/functions')->has_custom_header() ) {
            $classes[] = 'app-header--has-custom-header';
        }

        // Custom header
        if( app('header/functions')->has_header_image_url() ) {
            $classes[] = 'app-header--has-header-image';
        }

        // Add the type in the customize preview, even if there isn't a current image.
        // This allows populating the "default" image where needed.
        if( is_customize_preview() || app('header/functions')->has_header_image_url() ) {

            // If header type, add class
            if( $header_type = app('header/functions')->get_header_image_type() ) {
                $classes[] = sprintf( 'app-header--has-header-image--%s', $header_type );
            }

            // If overlay type, add class
            if( $overlay_type = app('header/functions')->get_overlay_type() ) {
                $classes[] = sprintf( 'app-header--has-overlay--%s', $overlay_type );
            }
        }

        return $classes;
    }

    /**
     * Hide Header Content if we're not showing the title.
     *
     * @since 2.0.0
     * @param string
     * @return string
     */
    public function header_content_display( $hierarchy ) {

        if( ! app('header/functions')->has_header_content() ) {
            return [];
        }

        return $hierarchy;
    }

    /**
     * Display Site Title filter
     *
     * @since 2.0.0
     * @param string    $title
     * @return string
     */
    public function site_title( $title ) {
        return ( app('header/functions')->display_site_title() ) ? $title : false;
    }

    /**
     * Display Site Tagline filter
     *
     * @since 2.0.0
     * @param string    $tagline
     * @return string
     */
    public function site_description( $description ) {
        return ( app('header/functions')->display_site_tagline() ) ? $description : false;
    }

    /**
     * Add Editor data.
     *
     * @since 2.0.0
     * @param array     $data
     * @return array
     */
    public function editor_data( $data = [] ) {

        $header_image = Mod::get( 'header_image', app('header/functions')->get_default_custom_header_url() );

        if('remove-header' === $header_image ) {
            $header_image = false;
        }

        global $post;

        $newData = [
            "headerImage"               => $header_image,
            "headerOverlayColor"        => app('header/functions')->get_overlay_color_by_id( $post->ID ),
            "headerOverlayOpacity"      => app('header/functions')->get_overlay_opacity_by_id( $post->ID ),
            "headerDefaultColor"        => app('header/functions')->get_custom_header_text_color(),
        ];

        return array_merge( $data, $newData );
    }
}
