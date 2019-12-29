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

namespace Taproot\Editor;

use Hybrid\Contracts\Bootable;

use Rootstrap\Styles\Styles;
use Taproot\Tools\Mod;
use function Taproot\Tools\asset;

/**
 * Handles block editor functionality
 *
 * @since  1.0.0
 * @access public
 */
class Editor implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'enqueue_block_editor_assets', [ $this, 'assets' ] );
        add_action( 'init', [ $this, 'register_post_meta' ] );
        add_action( 'after_setup_theme', [ $this, 'setup' ], 5 );
    }

    /**
     *  Enqueue Editor Assets
     *
     * @since 1.0.0
     * @return void
     */
    public function assets() {

        // Enqueue theme editor styles.
        wp_enqueue_style( 'taproot-editor', asset( 'css/editor.css' ), null, null );

        // add our custom styles and vars
        wp_add_inline_style( 'taproot-editor', $this->editor_styles() );

        // Unregister core block and theme styles.
        wp_deregister_style( 'wp-block-library' );
        wp_deregister_style( 'wp-block-library-theme' );

        // Re-register core block and theme styles with an empty string.
        // This is necessary to get styles set up correctly.
        wp_register_style( 'wp-block-library', '' );
        wp_register_style( 'wp-block-library-theme', '' );

        // Google Fonts
        if( $google_fonts = Mod::get( 'taproot-google-fonts' ) ) {
            $google_link = sprintf( '//fonts.googleapis.com/css?family=%s', esc_attr( $google_fonts ) );
            wp_enqueue_style('taproot-google-fonts', esc_url( $google_link ) );
        }

        // Register Sidebar Panel Scripts
        wp_enqueue_script(
            'taproot-editor-sidebar-js',
            asset( 'js/editor.js' ),
            array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-editor' ),
        false, true);

        wp_add_inline_script( 'taproot-editor-sidebar-js', $this->editorData() );
    }

    /**
     * Get styles and vars for editor
     *
     * @since 1.0.0
     * @return string - Returns CSS string
     */
    public function editor_styles() {

        $styles = new Styles();

        // add screen
        $styles->addScreen( 'editor-tablet', [
            'min' => '768px'
        ]);

        // add screen
        $styles->addScreen( 'editor-desktop', [
            'min' => '960px'
        ]);

        // Action to add editor styles
        do_action( 'taproot\editor\styles', $styles );

        // Add internal styles
        $this->styles($styles);

        // generate and return CSS
        return $styles->getStyles();
    }

    /**
     * Get default header image data
     *
     * @since 1.3.0
     * @return string - Returns string
     */
    public function editorData() {

        $header_image = Mod::get( 'header_image', get_parent_theme_file_uri('/dist/images/header.jpg') );

        if ('remove-header' === $header_image ) {
            $header_image = false;
        }

        $data = [
            "headerImage"               => $header_image,
            "headerOverlayColor"        => Mod::get( 'header--hero--overlay-color' ),
            "headerOverlayOpacity"      => Mod::get( 'header--hero--overlay-opacity' ),
            "headerHeroDefaultColor"    => Mod::get( 'header--hero--default-color', Mod::get( 'header--default-color' ) ),
            "headerHeroHoverColor"      => Mod::get( 'header--hero--default-color--hover' ),
        ];

        $data = apply_filters('taproot/editor-data', $data);

        return sprintf( 'var taprootEditorData = %s;', wp_json_encode($data) );
    }

    /**
     * Register post meta fields for the editor sidebar
     *
     * @since 1.0.0
     * @return void
     */
    public function register_post_meta() {

        register_meta( 'post', 'taproot_page_layout', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taproot_post_title_display', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taproot_custom_header_image_type', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taproot_custom_header_image', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taprooot_hero_overlay_type', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taprooot_hero_overlay_color', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taprooot_hero_overlay_color_name', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taprooot_hero_overlay_opacity', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'number',
        ]);

        register_meta( 'post', 'taprooot_hero_default_color', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taprooot_hero_default_hover_color', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', 'taprooot_hero_height', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'number',
        ]);
    }

    /**
     * Get Singular styles
     *
     * @since 1.4.0
     */
    public function styles( $styles ) {

        // Custom Property: Default Hero Header Color
        $styles->customProperty([
            'name' => 'header--hero--default-color',
            'value' => get_post_meta( get_the_ID(), 'taprooot_hero_default_color', true ),
        ]);

        // Custom Property: Default Hero Header Link Hover Color
        $styles->customProperty([
            'name' => 'header--hero--link-color--hover',
            'value' => get_post_meta( get_the_ID(), 'taprooot_hero_default_hover_color', true ),
        ]);
    }

    /**
     * Setup
     *
     * @since 1.4.0
     */
    public function setup() {

        // Editor color palette. These colors are also defined in the
        // `resources/scss/settings/_colors.scss` file.
        add_theme_support( 'editor-color-palette', [
            [
                'name'  => __( 'Text Color', 'taproot' ),
                'slug'  => 'theme-text',
                'color' => get_theme_mod( 'typography--body--text-color', '#8c8c8c' )
            ],
            [
                'name'  => __( 'Accent Color', 'taproot' ),
                'slug'  => 'theme-accent',
                'color' => get_theme_mod( 'colors--theme--accent', '#00a0d1' )
            ],
            [
                'name'  => __( 'Meta Light', 'taproot' ),
                'slug'  => 'theme-meta-light',
                'color' => get_theme_mod( 'colors--theme--meta-light', '#f4f4f4' )
            ],
            [
                'name'  => __( 'Meta Medium', 'taproot' ),
                'slug'  => 'theme-meta-medium',
                'color' => get_theme_mod( 'colors--theme--meta-medium', '#d8d8d8' )
            ],
            [
                'name'  => __( 'Meta Dark', 'taproot' ),
                'slug'  => 'theme-meta-dark',
                'color' => get_theme_mod( 'colors--theme--meta-dark', '#a5a5a5' )
            ]
        ]);

        // Editor block font sizes. These font sizes are also defined in the
        // `resources/scss/settings/_fonts.scss` file.
        add_theme_support( 'editor-font-sizes', [
            [
                'name'      => __( 'Small', 'taproot' ),
                'shortName' => __( 'S', 'taproot' ),
                'size'      => 14,
                'slug'      => 'small'
            ],
            [
                'name'      => __( 'Regular', 'taproot' ),
                'shortName' => __( 'M', 'taproot' ),
                'size'      => 16,
                'slug'      => 'regular'
            ],
            [
                'name'      => __( 'Large', 'taproot' ),
                'shortName' => __( 'L', 'taproot' ),
                'size'      => 23,
                'slug'      => 'large'
            ],
            [
                'name'      => __( 'Larger', 'taproot' ),
                'shortName' => __( 'XL', 'taproot' ),
                'size'      => 32,
                'slug'      => 'larger'
            ]
        ] );
    }
}