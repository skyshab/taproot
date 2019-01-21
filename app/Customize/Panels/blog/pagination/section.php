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


$manager->add_section( 'blog--pagination', [
    'title' => esc_html__( 'Pagination', 'taproot' ),
    'panel' => 'blog',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Pagination Size
range( $manager, 'blog--pagination--font-size', [
    'section' => 'blog--pagination',
    'label' => esc_html__('Pagination Size', 'taproot'),    
    'atts' => range_atts()
]);


// Setting: Pagination Spacing
range( $manager, 'blog--pagination--spacing', [
    'section' => 'blog--pagination',
    'label' => esc_html__('Pagination Spacing', 'taproot'),    
    'atts' => [
        'px' => [
            'max' => 32,
            'default' => 5
        ],   
        'em' => [
            'max' => 2,
            'default' => 0.3
        ], 
        '%' => [
            'default' => 2
        ],                       
    ]
]);


// Setting: Circular Pagination 
$manager->add_setting( 'blog--pagination--rounded', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

$manager->add_control( 'blog--pagination--rounded', [
    'label' => esc_html__( 'Use Circles', 'taproot' ),
    'section' => 'blog--pagination',
    'type' => 'checkbox'
]);


// Color Setting: Pagination Link Color
color( $manager, 'blog--pagination--link--color', [
    'label'   => esc_html__( 'Pagination Link Color', 'taproot' ),
    'section' => 'blog--pagination',  
]); 


// Color Setting: Pagination Numbers Background
color( $manager, 'blog--pagination--background-color', [
    'label'   => esc_html__( 'Pagination Background Color', 'taproot' ),
    'section' => 'blog--pagination',  
]); 


// Color Setting: Pagination Numbers Color
color( $manager, 'blog--pagination--color', [
    'label'   => esc_html__( 'Pagination Color', 'taproot' ),
    'section' => 'blog--pagination',  
]); 
