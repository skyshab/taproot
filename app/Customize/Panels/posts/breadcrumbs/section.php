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


$manager->add_section( 'posts--breadcrumbs', [
    'title' => esc_html__( 'Breadcrumbs', 'taproot' ),
    'panel' => 'posts',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Enable Breadcrumbs
$manager->add_setting( 'posts--breadcrumbs--enable', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'posts--breadcrumbs--enable', [
    'type' => 'checkbox',
    'section' => 'posts--breadcrumbs',
    'label' => esc_html__( 'Enable Breadcrumbs', 'taproot' ),
]);
