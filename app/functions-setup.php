<?php
/**
 * Theme setup functions.
 *
 * This file holds basic theme setup functions executed on appropriate hooks
 * with some opinionated priorities based on theme dev, particularly working
 * with child theme devs/users, over the years. I've also decided to use
 * anonymous functions to keep these from being easily unhooked. WordPress has
 * an appropriate API for unregistering, removing, or modifying all of the
 * things in this file. Those APIs should be used instead of attempting to use
 * `remove_action()`.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot;

/**
 * Set up theme support.  This is where calls to `add_theme_support()` happen.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/
 * @link   https://developer.wordpress.org/themes/basics/theme-functions/
 * @link   https://developer.wordpress.org/reference/functions/load_theme_textdomain/
 * @link   https://github.com/WordPress/gutenberg/blob/master/docs/extensibility/theme-support.md
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	// Sets the theme content width. This variable is also set in the
	// `resources/scss/settings/_dimensions.scss` file.
	$GLOBALS['content_width'] = 1200;

	// Load theme translations.
	load_theme_textdomain( 'taproot', get_parent_theme_file_path( 'resources/lang' ) );

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// Automatically add feed links to `<head>`.
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	// Add selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Wide and full alignment. The styles for alignment is housed in the
	// `resources/scss/utilities/_alignment.scss` file.
	add_theme_support( 'align-wide' );

	// Outputs HTML5 markup for core features.
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form'
	] );

	// Add custom logo support.
	add_theme_support( 'custom-logo', [
		'width'       => null,
		'height'      => null,
		'flex-width'  => null,
		'flex-height' => false,
		'header-text' => ''
	] );


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

}, 5 );

/**
 * Adds support for the custom background feature. This is in its own function
 * hooked to `after_setup_theme` so that we can give it a later priority.  This
 * is so that child themes can more easily overwrite this feature.  Note that
 * overwriting the background should be done *before* rather than after.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'custom-background', [
		'default-image'          => '',
		'default-preset'         => 'default',
		'default-position-x'     => 'left',
		'default-position-y'     => 'top',
		'default-size'           => 'auto',
		'default-repeat'         => 'repeat',
		'default-attachment'     => 'scroll',
		'default-color'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	] );

}, 15 );

/**
 * Adds support for the custom header feature. This is in its own function
 * hooked to `after_setup_theme` so that we can give it a later priority.  This
 * is so that child themes can more easily overwrite this feature.  Note that
 * overwriting the header should be done *before* rather than after.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'custom-header', [
		'default-image'          => get_parent_theme_file_uri( '/dist/images/header.jpg' ),
		'random-default'         => false,
		'width'                  => 2000,
		'height'                 => 1200,
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

	register_default_headers([
		'default-image' => [
			'url'           => '%s/dist/images/header.jpg',
			'thumbnail_url' => '%s/dist/images/header.jpg',
			'description'   => __( 'Default Header Image', 'taproot' ),
        ],
    ]);

}, 15 );


/**
 * Add the "medium large" image size in the list of sizes to choose from.
 * We are returning the entire list here to be able to output in a logical order.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
add_filter( 'image_size_names_choose', function( $sizes ) {
    $new_sizes = [
        'thumbnail' => __( 'Thumbnail', 'taproot' ),
        'medium' => __( 'Medium', 'taproot' ),
        'medium_large' => __( 'Medium Large', 'taproot' ),
        'large' => __( 'Large', 'taproot' ),
        'full' => __( 'Full', 'taproot' ),
    ];
    return array_merge( $new_sizes, $sizes );
});


/**
 * Clear the Rootstrap Customizer Cache after update
 *
 * @since  1.4.0
 * @access public
 * @return void
 */
add_action( 'upgrader_process_complete', function() {
   remove_theme_mod( 'rootstrap-theme-mods' );
});
