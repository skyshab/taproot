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
            'taproot-editor',
            asset( 'js/editor.js' ),
            array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-editor' ),
        false, true);

        wp_add_inline_script( 'taproot-editor', $this->editorData() );
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
        do_action( 'taproot/editor/styles', $styles );

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

        $data = apply_filters( 'taproot/editor-data', [] );
        return sprintf( 'var taprootEditorData = %s;', wp_json_encode( $data ) );
    }

    /**
     * Register post meta fields for the editor sidebar
     *
     * @since 1.0.0
     * @return void
     */
    public function register_post_meta() {

        register_meta( 'post', '_taproot_page_layout', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', '_taproot_post_title_hide', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'number',
            'default' => 1
        ]);

        register_meta( 'post', '_taproot_post_featured_image_hide', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'number',
        ]);

        register_meta( 'post', '_taproot_post_content_layout', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', '_taproot_disable_main_top_padding', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'number',
        ]);

        register_meta( 'post', '_taproot_disable_main_bottom_padding', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'number',
        ]);

        register_meta( 'post', '_taproot_header_image_type', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', '_taproot_header_image', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', '_taproot_header_overlay_type', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', '_taproot_header_overlay_color', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', '_taproot_header_overlay_color_name', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', '_taproot_header_overlay_opacity', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'number',
        ]);

        register_meta( 'post', '_taproot_header_text_color', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ]);

        register_meta( 'post', '_taproot_header_height', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'number',
        ]);

        register_meta( 'post', '_taproot_header_display_title', [
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

        // Custom Property: Default Header Image Header Color
        $styles->customProperty([
            'name' => 'header--image--text-color',
            'value' => get_post_meta( get_the_ID(), '_taproot_header_text_color', true ),
        ]);
    }

    /**
     * Setup
     *
     * @since 1.4.0
     */
    public function setup() {

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