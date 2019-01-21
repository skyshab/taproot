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


$manager->add_section( 'blog--pagination-hover', [
    'title' => esc_html__( 'Pagination - Hover', 'taproot' ),
    'panel' => 'blog',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Pagination Link Color
color( $manager, 'blog--pagingation-hover--link--color', [
    'label'   => esc_html__( 'Pagination Link Color', 'taproot' ),
    'section' => 'blog--pagination-hover',  
]); 


// Color Setting: Pagination Numbers Background
color( $manager, 'blog--pagingation-hover--background-color', [
    'label'   => esc_html__( 'Pagination Background Color', 'taproot' ),
    'section' => 'blog--pagination-hover',  
]); 


// Color Setting: Pagination Numbers Color
color( $manager, 'blog--pagingation-hover--color', [
    'label'   => esc_html__( 'Pagination Color', 'taproot' ),
    'section' => 'blog--pagination-hover',  
]); 
