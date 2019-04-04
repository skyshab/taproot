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
use function Taproot\Customize\range;


# =======================================================
# Move Existing Section
# =======================================================


// move header image control to header styles section
if( $manager->get_section( 'header_image' ) ) {
	$manager->get_section( 'header_image' )->panel = 'header';
	$manager->get_section( 'header_image' )->priority = 500;
}


# =======================================================
# Add Settings & Controls
# =======================================================

if( $manager->get_section( 'header_image' ) ) {

    $header_image_height_atts = [
        'vw' => [
            'min' => 0,
            'max' => 100,
        ],
        'vh' => [
            'min' => 0,
            'max' => 100,
        ],            
        'px' => [
            'min' => 0,
            'max' => 1000,
        ],
    ];

    // Setting: Header Image Height
    range( $manager, 'header--image--height', [
        'section' => 'header_image',
        'label' => esc_html__('Height', 'taproot'), 
        'atts' => $header_image_height_atts   
    ]);


    // Setting: Header Image Max Height
    range( $manager, 'header--image--max-height', [
        'section' => 'header_image',
        'label' => esc_html__('Max Height', 'taproot'), 
        'atts' => $header_image_height_atts    
    ]);


    // Setting: Header Image Min Height
    range( $manager, 'header--image--min-height', [
        'section' => 'header_image',
        'label' => esc_html__('Min Height', 'taproot'), 
        'atts' => $header_image_height_atts    
    ]);
}