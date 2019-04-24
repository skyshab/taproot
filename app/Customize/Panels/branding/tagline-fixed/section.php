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


$manager->add_section( 'branding--tagline-fixed', [
    'title' => esc_html__( 'Tagline - Fixed', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide When Fixed
$manager->add_setting( 'branding--tagline-fixed--hide', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'branding--tagline-fixed--hide', [
    'label'     => esc_html__( 'Hide When Fixed', 'taproot' ),
    'section'   => 'branding--tagline-fixed',
    'type'      => 'checkbox'
]);


// Font Size
range( $manager, 'branding--tagline-fixed--font-size', [
    'section' => 'branding--tagline-fixed',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts'  => range_atts('heading')
]);


// Line Height
range( $manager, 'branding--tagline-fixed--line-height', [
    'section' => 'branding--tagline-fixed',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts'  => range_atts('line-height')
]);


// Tagline Gutter
range( $manager, 'branding--tagline-fixed--gutter', [
    'section' => 'branding--tagline-fixed',
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
