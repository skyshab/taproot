<?php
/**
 * Section setup.
 *
 * This file adds the section, settings and controls to the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\color;
use function Taproot\Customize\range;


# =======================================================
# Move Existing Section
# =======================================================


// Move header image control to header styles section
// and provide a description for the header image control.
// We're hiding the default control description with CSS.
if( $manager->get_section( 'header_image' ) ) {
	$manager->get_section( 'header_image' )->panel = 'header';
    $manager->get_section( 'header_image' )->priority = 500;
    $manager->get_section( 'header_image' )->description = esc_html__('Choose a custom header image for the homepage. If using a static homepage, the page settings will be used instead.', 'taproot');
}


# =======================================================
# Add Settings & Controls
# =======================================================


// Update the transform property
if( $manager->get_setting( 'header_image' ) ) {
    $manager->get_setting( 'header_image' )->transport = 'postMessage';
    $manager->get_setting( 'header_image_data' )->transport = 'postMessage';
}


if( $manager->get_section( 'header_image' ) ) {

    $header_image_height_atts = [
        'vw' => [
            'min' => 0,
            'max' => 100,
        ],
        'vh' => [
            'min' => 0,
            'max' => 100,
        ],
        'px' => [
            'min' => 0,
            'max' => 1000,
        ],
    ];

    // Setting: Header Image Height
    range( $manager, 'header--image--height', [
        'section' => 'header_image',
        'label' => esc_html__('Height', 'taproot'),
        'atts' => $header_image_height_atts
    ]);


    // Setting: Header Image Max Height
    range( $manager, 'header--image--max-height', [
        'section' => 'header_image',
        'label' => esc_html__('Max Height', 'taproot'),
        'atts' => $header_image_height_atts
    ]);


    // Setting: Header Image Min Height
    range( $manager, 'header--image--min-height', [
        'section' => 'header_image',
        'label' => esc_html__('Min Height', 'taproot'),
        'atts' => $header_image_height_atts
    ]);

}


# =======================================================
# Selective Refresh
# =======================================================


// If the selective refresh component is available
if ( isset( $manager->selective_refresh ) ) {

    // Selectively refreshes the custom header if it doesn't support
    // videos. Core WP won't properly refresh output from its own
    // `the_custom_header_markup()` function unless video is supported.
    if ( ! current_theme_supports( 'custom-header', 'video' ) ) {
        $manager->selective_refresh->add_partial( 'header_image', [
            'selector'            => '#wp-custom-header',
            'render_callback'     => 'the_custom_header_markup',
            'container_inclusive' => true,
            'fallback_refresh'    => false
        ]);
    }
}
