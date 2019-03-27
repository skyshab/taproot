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


use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'header--styles', [
    'title' => esc_html__( 'Header Styles', 'taproot' ),
    'panel' => 'header',
]);


# =======================================================
# Add Settings & Controls
# =======================================================

   
// Setting: Fullwidth Header       
$manager->add_setting( 'header--styles--fullwidth', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

$manager->add_control( 'header--styles--fullwidth', [
    'type' => 'checkbox',
    'section' => 'header--styles',
    'label' => esc_html__( 'Enable Fullwidth Header', 'taproot' ),
]);
 


// Color Setting: Background Color
color( $manager, 'header--styles--background-color', [
    'label'   => esc_html__( 'Header Background Color', 'taproot' ),
    'section' => 'header--styles',  
]); 


// Color Setting: Header Default Color
color( $manager, 'header--styles--default-color', [
    'label'   => esc_html__( 'Header Default Color', 'taproot' ),
    'section' => 'header--styles',  
]); 


// Color Setting: Header Default Color
color( $manager, 'header--styles--default-color--hover', [
    'label'   => esc_html__( 'Header Default Color: Hover', 'taproot' ),
    'section' => 'header--styles',  
]); 


// move header image control to header styles section
// if( $manager->get_section( 'header_image' ) ) {
// 	$manager->get_section( 'header_image' )->panel = 'header';
// 	$manager->get_section( 'header_image' )->priority = 500;
// }
