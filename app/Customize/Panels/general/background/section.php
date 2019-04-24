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


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'general--background', [
    'title' => esc_html__( 'Background', 'taproot' ),
    'panel' => 'general',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Background Color
color( $manager, 'general--background--background-color', [
    'label'   => esc_html__( 'Background Color', 'taproot' ),
    'section' => 'general--background',
]);


// move background control to our custom section
if( $manager->get_control( 'background_image' ) ) {
	$manager->get_control( 'background_image' )->section = 'general--background';
	$manager->get_control( 'background_image' )->priority = 500;
}

// move background control to our custom section
if( $manager->get_control( 'background_color' ) ) {
	$manager->get_control( 'background_color' )->active_callback = '__return_false';
}

// move background control to our custom section
if( $manager->get_control( 'background_preset' ) ) {
	$manager->get_control( 'background_preset' )->section = 'general--background';
	$manager->get_control( 'background_preset' )->priority = 510;
}

// move background control to our custom section
if( $manager->get_control( 'background_position' ) ) {
	$manager->get_control( 'background_position' )->section = 'general--background';
	$manager->get_control( 'background_position' )->priority = 520;
}

// move background control to our custom section
if( $manager->get_control( 'background_size' ) ) {
	$manager->get_control( 'background_size' )->section = 'general--background';
	$manager->get_control( 'background_size' )->priority = 530;
}

// move background control to our custom section
if( $manager->get_control( 'background_repeat' ) ) {
	$manager->get_control( 'background_repeat' )->section = 'general--background';
	$manager->get_control( 'background_repeat' )->priority = 540;
}

// move background control to our custom section
if( $manager->get_control( 'background_attachment' ) ) {
	$manager->get_control( 'background_attachment' )->section = 'general--background';
	$manager->get_control( 'background_attachment' )->priority = 550;
}
