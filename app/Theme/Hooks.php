<?php
/**
 * Theme setup actions.
 *
 * This file holds basic theme setup functions executed on appropriate hooks.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Theme;

use Hybrid\Contracts\Bootable;
use Hybrid\App;
use function Taproot\Tools\asset;

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
        add_action( 'after_setup_theme',    [ $this, 'after_setup_theme' ], 5 );
        add_action( 'wp_enqueue_scripts',   [ $this, 'wp_enqueue_scripts' ] );
        add_filter( 'hybrid/template/path', [ $this, 'views_path' ] );
        add_action( 'init',                 [ $this, 'archive_description_fix' ] );
    }

    /**
     * Set up base theme support.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function after_setup_theme() {

        // Sets the theme content width. Also defined in `resources/scss/settings/_dimensions.scss` file.
        $GLOBALS['content_width'] = 1200;

        // Load theme translations
        load_theme_textdomain( 'taproot', get_parent_theme_file_path( 'resources/lang' ) );

        // Automatically add the `<title>` tag
        add_theme_support( 'title-tag' );

        // Automatically add feed links to `<head>`
        add_theme_support( 'automatic-feed-links' );

        // Add selective refresh for widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Enable wide and full alignment
        add_theme_support( 'align-wide' );

        // Outputs HTML5 markup for core features
        add_theme_support( 'html5', [
            'caption',
            'comment-form',
            'comment-list',
            'gallery',
            'search-form'
        ]);
    }

    /**
     * Remove default block styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function wp_enqueue_scripts() {

        // Dequeue the default block styles.
        wp_dequeue_style( 'wp-block-library' );

        // Get the theme styles handle
        $handle = App::resolve( 'styles/handle' );

        // Enqueue theme styles.
        wp_enqueue_style( $handle, asset( 'css/theme.css' ), null, null );

        // Enqueue theme scripts.
        wp_enqueue_script( 'taproot-app', asset( 'js/app.js' ), null, null, true );
    }

    /**
     * Define the views folder path.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function views_path() {
        return 'views';
    }

    /**
     * Hybrid archive description fix.
     *
     * This is a temporary fix until patched in Hybrid Core.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function archive_description_fix() {

        // Define the filter
        $filter = 'hybrid/archive/description';

        // Remove original filter
        remove_filter( $filter, 'wpautop', 30 );

        // Add new filter
        add_filter( $filter, 'do_blocks', 25 );
    }
}
