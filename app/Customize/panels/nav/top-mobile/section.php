<?php
/**
 * Section setup.
 *
 * This file adds the section, settings and controls to the customizer. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use Taproot\Customize\Controls\Font_Styles;
use function Taproot\Customize\get_font_choices;
use function Taproot\Customize\color;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'nav--top-mobile', [
    'title' => esc_html__( 'Top Nav Mobile', 'taproot' ),
    'panel' => 'nav',
]);


# =======================================================
# Add Settings & Controls
# =======================================================

   
// Setting: Top Nav Mobile Breakpoint       
$manager->add_setting( 'nav--top-mobile--breakpoint', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--top-mobile--breakpoint', [
    'type' => 'select',
    'section' => 'nav--top-mobile',
    'label' => esc_html__( 'Mobile Menu Breakpoint', 'taproot' ),
    'choices' => array(
        'never' => esc_html__( 'Never Mobile', 'taproot' ),
        'mobile' => esc_html__( 'Mobile Only', 'taproot' ),
        'tablet-and-under' => esc_html__( 'Tablet and under', 'taproot' ),
        'default' => esc_html__( 'Always Mobile', 'taproot' ),
    ),       
]);


// Setting: Hide when mobile 
$manager->add_setting( 'nav--top-mobile--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'nav--top-mobile--hide', [
    'label'     => esc_html__( 'Hide when mobile', 'taproot' ),
    'section'   => 'nav--top-mobile',
    'type'      => 'checkbox'
]);


// Setting: Menu Item Font Size
range( $manager, 'nav--top-mobile--font-size', [
    'section' => 'nav--top-mobile',
    'label' => esc_html__('Font Size', 'taproot'), 
    'atts' => range_atts('text')
]);


// Setting: Menu Item Line Height
range( $manager, 'nav--top-mobile--line-height', [
    'section' => 'nav--top-mobile',
    'label' => esc_html__('Line Height', 'taproot'), 
    'atts' => range_atts('line-height')
]);


// Nav Align
$manager->add_setting( 'nav--top-mobile--align', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
]);

$manager->add_control( 'nav--top-mobile--align', [
    'type' => 'select',
    'section' => 'nav--top-mobile',
    'label' => esc_html__( 'Nav Align', 'taproot' ),
    'choices' => [
        'left' => esc_html__( 'Left', 'taproot' ),
        'right' => esc_html__( 'Right', 'taproot' ),
        'center' => esc_html__( 'Center', 'taproot' ),
    ]       
]);
