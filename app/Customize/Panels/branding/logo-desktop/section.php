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


$manager->add_section( 'branding--logo-desktop', [
    'title' => esc_html__( 'Logo - Desktop', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Branding Gutter
range( $manager, 'branding--logo-desktop--width', [
    'section' => 'branding--logo-desktop',
    'label' => esc_html__('Logo Width', 'taproot'),
    'atts'  => [
        'px' => [
            'max'   => 500,
            'default' => 75
        ],
        '%' => [
            'default' => 25
        ],
    ]
]);


// Setting: Logo Gutter
range( $manager, 'branding--logo-desktop--gutter', [
    'section' => 'branding--logo-desktop',
    'label' => esc_html__('Gutter Width', 'taproot'),
    'atts'  => [
        'px' => [
            'max'   => 50,
            'default' => 16
        ],
        'em' => [
            'max'   => 5,
            'default' => 1
        ],
        '%' => [
            'default' => 5
        ],
    ]
]);
