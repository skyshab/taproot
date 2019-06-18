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


$manager->add_section( 'pages--breadcrumbs', [
    'title' => esc_html__( 'Breadcrumbs', 'taproot' ),
    'panel' => 'pages',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Enable Breadcrumbs
$manager->add_setting( 'pages--breadcrumbs--enable', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'pages--breadcrumbs--enable', [
    'type' => 'checkbox',
    'section' => 'pages--breadcrumbs',
    'label' => esc_html__( 'Enable Breadcrumbs', 'taproot' ),
]);
