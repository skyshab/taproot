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
use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'branding--tagline-desktop', [
    'title' => esc_html__( 'Tagline Desktop', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide Site Tagline
$manager->add_setting( 'branding--tagline-desktop--hide-tagline', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

$manager->add_control( 'branding--tagline-desktop--hide-tagline', [
    'type' => 'checkbox',
    'section' => 'branding--tagline-desktop',
    'label' => esc_html__( 'Hide Tagline', 'taproot' ),
]);


// Font Size
range( $manager, 'branding--tagline-desktop--font-size', [
    'section' => 'branding--tagline-desktop',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts'  => range_atts('heading')
]);


// Line Height
range( $manager, 'branding--tagline-desktop--line-height', [
    'section' => 'branding--tagline-desktop',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts'  => range_atts('line-height')
]);


// Tagline Gutter
range( $manager, 'branding--tagline-desktop--gutter', [
    'section' => 'branding--tagline-desktop',
    'label' => esc_html__('Tagline Gutter', 'taproot'),
    'atts'  => [
        'px' => [
            'max'   => 100,
            'default' => 4
        ],
        'em' => [
            'max'   => 4,
            'default' => 0.25
        ],
        '%' => [
            'default' => 2
        ],
    ]
]);
