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

namespace Taproot;

/**
 * Set up base theme support.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

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

}, 5 );

/**
 * Remove default block styles
 *
 * @since  2.0.0
 * @access public
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {

    // Disable core block styles
    wp_dequeue_style( 'wp-block-library' );
});

/**
 * Changes the theme template path to the `views` folder to the theme root.
 *
 * @since  2.0.0
 * @access public
 * @return string
 */
add_filter( 'hybrid/template/path', function() { return 'views'; } );

/**
 * Add custom theme templates.
 *
 * @since  2.0.0
 * @access public
 * @return void
 */
add_action( 'hybrid/templates/register', function( $templates ) {
    $templates->add('templates/builder.php',        ['label' => __('Page Builder Template', 'taproot')]);
    $templates->add('templates/blank.php',          ['label' => __('Blank Template', 'taproot')]);
    $templates->add('templates/blocks.php',         ['label' => __('Block Editor Template', 'taproot')]);
});
