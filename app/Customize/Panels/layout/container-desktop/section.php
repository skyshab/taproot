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
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'layout--container-desktop', [
    'title' => esc_html__( 'Container', 'taproot' ),
    'panel' => 'layout',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Container Width
range( $manager, 'layout--container-desktop--width', [
    'section' => 'layout--container-desktop',
    'label' => esc_html__('Container Width', 'taproot'),
    'atts'  => [
        'vw' => [
            'min'   => 60,
            'max'   => 100,
            'default' => 90
        ]
    ]
]);