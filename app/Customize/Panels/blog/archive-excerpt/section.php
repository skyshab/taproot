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


$manager->add_section( 'blog--archive-excerpt', [
    'title' => esc_html__( 'Archive Excerpt', 'taproot' ),
    'panel' => 'blog',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Excerpt Length
range( $manager, 'blog--archive-excerpt--length', [
    'section'   => 'blog--archive-excerpt',
    'transport' => 'refresh',
    'default'   => '80',
    'label'     => esc_html__('Excerpt Length', 'taproot'),    
    'atts'      => [
        'unitless' => [
            'min'  => 0,
            'max'  => 250,
            'step' => 1,
            'default' => 80
        ]        
    ]
]);
