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


use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;
use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'posts--nav', [
    'title' => esc_html__( 'Post Navigation', 'taproot' ),
    'panel' => 'posts',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Enable Bottom Post Navigation
$manager->add_setting( 'posts--nav--enable', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'posts--nav--enable', [
    'type' => 'checkbox',
    'section' => 'posts--nav',
    'label' => esc_html__( 'Enable Post Nav', 'taproot' ),      
]);


// Color Setting: Navigation Bar Postnav Link Color
color( $manager, 'posts--nav--color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'posts--nav',  
]); 


// Color Setting: Navigation Bar Postnav Link Color
color( $manager, 'posts--nav--color--hover', [
    'label'   => esc_html__( 'Link Color - Hover', 'taproot' ),
    'section' => 'posts--nav',  
]);

// Setting: Post Navigation Font Size
range( $manager, 'posts--nav--font-size', [
    'section' => 'posts--nav',
    'label' => esc_html__('Font Size', 'taproot'),    
    'atts' => range_atts( 'text' )
]);


// Setting: Post Navigation "prev" content
$manager->add_setting( 'posts--nav--prev', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'posts--nav--prev', [
    'type' => 'text',
    'section' => 'posts--nav',
    'label' => esc_html__( 'Previous Post Text', 'taproot' ),       
]);      


// Setting: Post Navigation "next" content
$manager->add_setting( 'posts--nav--next', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'posts--nav--next', [
    'type' => 'text',
    'section' => 'posts--nav',
    'label' => esc_html__( 'Next Post Text', 'taproot' ),      
]);    
