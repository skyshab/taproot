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


$manager->add_section( 'layout--container', [
    'title' => esc_html__( 'Container', 'taproot' ),
    'panel' => 'layout',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Max Container Width
range( $manager, 'layout--container--max-width', [
    'section' => 'layout--container',
    'label' => esc_html__('Max Container Width', 'taproot'),
    'atts'  => [
        'px' => [
            'min'   => 600,
            'max'   => 1600,
            'default' => 1060
        ],
        'rem' => [
            'min'   => 10,
            'max'   => 100,
            'default' => 62
        ],
    ]
]);
