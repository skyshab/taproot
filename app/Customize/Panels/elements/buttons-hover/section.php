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


$manager->add_section( 'elements--buttons-hover', [
    'title' => esc_html__( 'Buttons - Hover', 'taproot' ),
    'panel' => 'elements',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Background Color Hover
color( $manager, 'elements--buttons-hover--background-color', [
    'label'   => esc_html__( 'Hover Background Color', 'taproot' ),
    'section' => 'elements--buttons-hover',  
]); 


// Color Setting: Border Color Hover
color( $manager, 'elements--buttons-hover--border-color', [
    'label'   => esc_html__( 'Hover Border Color', 'taproot' ),
    'section' => 'elements--buttons-hover',  
]); 


// Color Setting: Text Color Hover
color( $manager, 'elements--buttons-hover--color', [
    'label'   => esc_html__( 'Hover Text Color', 'taproot' ),
    'section' => 'elements--buttons-hover',  
]); 
