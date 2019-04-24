<?php
/**
 * Section setup.
 *
 * This file adds the section, settings and controls to the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\range;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'layout--content', [
    'title' => esc_html__( 'Content', 'taproot' ),
    'panel' => 'layout',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Content Max Width
range( $manager, 'layout--content--max-width', [
    'section' => 'layout--content',
    'label' => esc_html__('Max Content Width', 'taproot'),
    'atts'  => [
        'px' => [
            'max'   => 1600,
            'default' => 980
        ],
        'rem' => [
            'max'   => 50,
            'default' => 42
        ]
    ]
]);
