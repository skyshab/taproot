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


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'branding--logo-fixed', [
    'title' => esc_html__( 'Logo - Fixed', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide When Fixed 
$manager->add_setting( 'branding--logo-fixed--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'branding--logo-fixed--hide', [
    'label'     => esc_html__( 'Hide When Fixed', 'taproot' ),
    'section'   => 'branding--logo-fixed',
    'type'      => 'checkbox'
]);


// Setting: Logo Width
range( $manager, 'branding--logo-fixed--width', [
    'section' => 'branding--logo-fixed',
    'label' => esc_html__('Logo Width', 'taproot'), 
    'default' => get_theme_mod( 'branding--logo-desktop--width', '75px' ),
    'atts'  => [
        'px' => [
            'max'   => 500,
            'default' => '75px'
        ],        
        '%' => [
            'default' => 25
        ],                  
    ]
]);


// Setting: Logo Gutter
range( $manager, 'branding--logo-fixed--gutter', [
    'section' => 'branding--logo-fixed',
    'label' => esc_html__('Gutter Width', 'taproot'), 
    'default' => get_theme_mod( 'branding--logo-desktop--gutter', '1em' ),
    'atts'  => [
        'px' => [
            'max'   => 50,
            'default' => 16
        ],    
        'em' => [
            'max'   => 5,
            'default' => 1
        ],             
        '%' => [
            'default' => 5
        ],                  
    ]
]);
