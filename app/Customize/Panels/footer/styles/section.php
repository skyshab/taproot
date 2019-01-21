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


$manager->add_section( 'footer--styles', [
    'title' => esc_html__( 'Styles', 'taproot' ),
    'panel' => 'footer',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Enable Fixed Footer
$manager->add_setting( 'footer--styles--fixed', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'footer--styles--fixed', [
    'type' => 'checkbox',
    'section' => 'footer--styles',
    'label' => esc_html__( 'Enable Fixed Footer', 'taproot' ),       
]);


// Setting: Fullwidth Footer       
$manager->add_setting( 'footer--styles--fullwidth', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

$manager->add_control( 'footer--styles--fullwidth', [
    'type' => 'checkbox',
    'section' => 'footer--styles',
    'label' => esc_html__( 'Enable Fullwidth Footer', 'taproot' ),
]);
       

// Color Setting: Background Color
color( $manager, 'footer--styles--background-color', [
    'label'   => esc_html__( 'Background Color', 'taproot' ),
    'section' => 'footer--styles',  
]); 


// Color Setting: Footer Default Color
color( $manager, 'footer--styles--default-color', [
    'label'   => esc_html__( 'Default Color', 'taproot' ),
    'section' => 'footer--styles',  
]); 


// Color Setting: Footer Default Color
color( $manager, 'footer--styles--default-color--hover', [
    'label'   => esc_html__( 'Default Hover Color', 'taproot' ),
    'section' => 'footer--styles',  
]); 
