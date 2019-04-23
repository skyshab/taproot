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


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'pages--layout', [
    'title' => esc_html__( 'Layout', 'taproot' ),
    'panel' => 'pages',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Single Page Layout
$manager->add_setting( 'pages--layout--layout', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
]);

$manager->add_control( 'pages--layout--layout', [
    'type' => 'select',
    'section' => 'pages--layout',
    'label' => esc_html__( 'Page Layout', 'taproot' ),
    'choices' => [
        'right' => esc_html__( 'Right Sidebar', 'taproot' ),
        'left' => esc_html__( 'Left Sidebar', 'taproot' ),
        'full' => esc_html__( 'Full Width', 'taproot' ),
    ],
]);

