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
use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'layout--sidebar', [
    'title' => esc_html__( 'Sidebar', 'taproot' ),
    'panel' => 'layout',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Background Color
color( $manager, 'layout--sidebar--background-color', [
    'label'   => esc_html__( 'Background Color', 'taproot' ),
    'section' => 'layout--sidebar',  
]);


// Sidebar Width
range( $manager, 'layout--sidebar--width', [
    'section' => 'layout--sidebar',
    'label' => esc_html__('Sidebar Width', 'taproot'), 
    'atts'  => [
        'px' => [
            'max'   => 600,
            'default' => 400
        ],        
        '%' => [
            'max'   => 50,
            'default' => 35
        ],                  
    ]
]);


// Content Max Width
range( $manager, 'layout--sidebar--content--max-width', [
    'section' => 'layout--sidebar',
    'label' => esc_html__('Max Content Width', 'taproot'), 
    'atts'  => [
        'px' => [
            'max'   => 1600,
            'default' => 800
        ],        
        'em' => [
            'max'   => 50,
            'default' => 42
        ],
        '%' => [
            'default' => 100
        ],                  
    ]
]);
