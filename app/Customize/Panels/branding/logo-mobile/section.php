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


$manager->add_section( 'branding--logo-mobile', [
    'title' => esc_html__( 'Logo - Mobile', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Logo Width
range( $manager, 'branding--logo-mobile--width', [
    'section' => 'branding--logo-mobile',
    'label' => esc_html__('Logo Width', 'taproot'), 
    'atts'  => [
        'px' => [
            'max' => 500,
            'default' => 60
        ],        
        '%' => [
            'default' => 25
        ],                  
    ]
]);


// Setting: Logo Gutter
range( $manager, 'branding--logo-mobile--gutter', [
    'section' => 'branding--logo-mobile',
    'label' => esc_html__('Gutter Width', 'taproot'), 
    'atts'  => [
        'px' => [
            'max' => 50,
            'default' => 16
        ],    
        'em' => [
            'max' => 4,
        ],             
        '%' => [
            'default' => 5
        ],                  
    ]
]);
