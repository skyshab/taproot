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


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'layout--site', [
    'title' => esc_html__( 'Site', 'taproot' ),
    'panel' => 'layout',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Boxed Layout  
$manager->add_setting( 'layout--site--boxed-layout', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'layout--site--boxed-layout', [
    'label'     => esc_html__( 'Use a boxed layout', 'taproot' ),
    'section'   => 'layout--site',
    'type'      => 'checkbox'
]);


// Boxed layout padding
range( $manager, 'layout--site--boxed-layout--padding', [
    'section' => 'layout--site',
    'label' => esc_html__('Boxed Layout Padding', 'taproot'), 
    'atts' => range_atts('layout-padding')
]);


// Max Container Width
range( $manager, 'layout--site--max-width', [
    'section' => 'layout--site',
    'label' => esc_html__('Max Container Width', 'taproot'), 
    'atts'  => [
        'px' => [
            'min'   => 600,
            'max'   => 1600,
            'default' => 1200
        ],        
        'rem' => [
            'min'   => 10,
            'max'   => 100,
            'default' => 62
        ],
        '%' => [
            'min' => 50,
            'default' => 80
        ],                  
    ]
]);
