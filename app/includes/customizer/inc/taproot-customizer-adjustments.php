<?php
/**
 * This file contains adjustments to the Customizer controls in our application
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// move to the general settings panel
if( $wp_customize->get_section( 'title_tagline' ) )
{
	$wp_customize->get_section( 'title_tagline' )->panel = 'general_settings';
}

// move to the general settings panel
if( $wp_customize->get_section( 'static_front_page' ) )
{
	$wp_customize->get_section( 'static_front_page' )->panel = 'general_settings';
}

// change section priority
if( $wp_customize->get_panel( 'nav_menus' ) )
{
	$wp_customize->get_panel( 'nav_menus' )->priority = 45;
}

// make footer sidebars appear in the customizer last
if( $wp_customize->get_section( 'sidebar-widgets-footer-1' ) )
{
	$wp_customize->get_section( 'sidebar-widgets-footer-1' )->priority = 500;
}

// change section priority
if( $wp_customize->get_section( 'sidebar-widgets-footer-2' ) )
{
	$wp_customize->get_section( 'sidebar-widgets-footer-2' )->priority = 510;
}

// change section priority
if( $wp_customize->get_section( 'sidebar-widgets-footer-3' ) )
{
	$wp_customize->get_section( 'sidebar-widgets-footer-3' )->priority = 520;
}

// change section priority
if( $wp_customize->get_section( 'sidebar-widgets-footer-4' ) )
{
	$wp_customize->get_section( 'sidebar-widgets-footer-4' )->priority = 530;
}

// move background control to our custom section
if( $wp_customize->get_control( 'background_image' ) )
{
	$wp_customize->get_control( 'background_image' )->section = 'taproot_background';
	$wp_customize->get_control( 'background_image' )->priority = 500;
}

// move background control to our custom section
if( $wp_customize->get_control( 'background_color' ) )
{
	$wp_customize->get_control( 'background_color' )->active_callback = 'taproot_hide_that_stuff';
}

// move background control to our custom section
if( $wp_customize->get_control( 'background_preset' ) )
{
	$wp_customize->get_control( 'background_preset' )->section = 'taproot_background';
	$wp_customize->get_control( 'background_preset' )->priority = 510;
}

// move background control to our custom section
if( $wp_customize->get_control( 'background_position' ) )
{
	$wp_customize->get_control( 'background_position' )->section = 'taproot_background';
	$wp_customize->get_control( 'background_position' )->priority = 520;
}

// move background control to our custom section
if( $wp_customize->get_control( 'background_size' ) )
{
	$wp_customize->get_control( 'background_size' )->section = 'taproot_background';
	$wp_customize->get_control( 'background_size' )->priority = 530;
}

// move background control to our custom section
if( $wp_customize->get_control( 'background_repeat' ) )
{
	$wp_customize->get_control( 'background_repeat' )->section = 'taproot_background';
	$wp_customize->get_control( 'background_repeat' )->priority = 540;
}

// move background control to our custom section
if( $wp_customize->get_control( 'background_attachment' ) )
{
	$wp_customize->get_control( 'background_attachment' )->section = 'taproot_background';
	$wp_customize->get_control( 'background_attachment' )->priority = 550;
}
