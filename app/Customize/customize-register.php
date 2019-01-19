<?php
/**
 * Customize Register
 * 
 * Add any additional customize register actions here. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


// Update the `transform` property of core WP settings.
$settings = [
    $manager->get_setting( 'blogname' ),
    $manager->get_setting( 'blogdescription' ),
    $manager->get_setting( 'header_textcolor' ),
    $manager->get_setting( 'header_image' ),
    $manager->get_setting( 'header_image_data' )
];

array_walk( $settings, function( &$setting ) {
    $setting->transport = 'postMessage';
});


// change menus priority
if( $manager->get_panel( 'nav_menus' ) ) {
	$manager->get_panel( 'nav_menus' )->priority = 45;
}


// make footer sidebars appear in the customizer last
if( $manager->get_section( 'sidebar-widgets-footer-1' ) ) {
	$manager->get_section( 'sidebar-widgets-footer-1' )->priority = 500;
}

if( $manager->get_section( 'sidebar-widgets-footer-2' ) ) {
	$manager->get_section( 'sidebar-widgets-footer-2' )->priority = 510;
}

if( $manager->get_section( 'sidebar-widgets-footer-3' ) ) {
	$manager->get_section( 'sidebar-widgets-footer-3' )->priority = 520;
}

if( $manager->get_section( 'sidebar-widgets-footer-4' ) ) {
	$manager->get_section( 'sidebar-widgets-footer-4' )->priority = 530;
}


// Hide the default colors section
if( $manager->get_section( 'colors' ) ) {
    $manager->remove_section( 'colors' );
}


// Move the header image section to the header panel
if( $manager->get_section( 'header_image' ) ) {
    $manager->get_section( 'header_image' )->panel = 'header';
}


// Rename site icon section
if( $manager->get_section( 'title_tagline' ) ) {
    $manager->get_section( 'title_tagline' )->title = __('Site Icon', 'taproot');
}


// Rename site icon section
if( $manager->get_section( 'title_tagline' ) ) {
    $manager->get_section( 'title_tagline' )->panel = 'general';
}


// move to the general settings panel
if( $manager->get_section( 'static_front_page' ) ) {
	$manager->get_section( 'static_front_page' )->panel = 'general';
}


// Hide the default show title/tagline controls
if( $manager->get_control( 'display_header_text' ) ) {
    $manager->remove_control( 'display_header_text' );
}
