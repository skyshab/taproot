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


$manager->add_section( 'footer--widgets', [
    'title' => esc_html__( 'Widgets', 'taproot' ),
    'panel' => 'footer',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Widget Headings Color
color( $manager, 'footer--widgets--headings-color', [
    'label'   => esc_html__( 'Headings Color', 'taproot' ),
    'section' => 'footer--widgets',  
]); 


// Color Setting: Widget Default Color
color( $manager, 'footer--widgets--default-color', [
    'label'   => esc_html__( 'Default Color', 'taproot' ),
    'section' => 'footer--widgets',  
]); 


// Color Setting: Widget Link Color
color( $manager, 'footer--widgets--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'footer--widgets',  
]); 


// Color Setting: Widget Link Hover Color
color( $manager, 'footer--widgets--link-color--hover', [
    'label'   => esc_html__( 'Link Hover Color', 'taproot' ),
    'section' => 'footer--widgets',  
]); 
