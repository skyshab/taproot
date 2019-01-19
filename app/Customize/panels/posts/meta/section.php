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


$manager->add_section( 'posts--meta', [
    'title' => esc_html__( 'Meta', 'taproot' ),
    'panel' => $panel,
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Meta Color
color( $manager, 'posts--meta--color', [
    'label'   => esc_html__( 'Meta Color', 'taproot' ),
    'section' => 'posts--meta',  
]); 


// Color Setting: Meta Icon Color
color( $manager, 'posts--meta--icon--color', [
    'label'   => esc_html__( 'Meta Icon Color', 'taproot' ),
    'section' => 'posts--meta',  
]); 


// Setting: Meta Size
range( $manager, 'posts--meta--font-size', [
    'section'   => 'posts--meta',
    'label'     => esc_html__('Meta Size', 'taproot'),    
    'atts'      => [
        'px' => [
            'max' => 42,
        ],   
        'em' => [
            'max'  => 2,
        ],                          
    ]
]);
