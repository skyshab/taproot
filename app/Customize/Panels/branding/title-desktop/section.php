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


$manager->add_section( 'branding--title-desktop', [
    'title' => esc_html__( 'Title - Desktop', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Hide Site Title
$manager->add_setting( 'branding--title-desktop--hide-title', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

$manager->add_control( 'branding--title-desktop--hide-title', [
    'type' => 'checkbox',
    'section' => 'branding--title-desktop',
    'label' => esc_html__( 'Hide Site Title', 'taproot' ),
]);


// Font Size
range( $manager, 'branding--title-desktop--font-size', [
    'section' => 'branding--title-desktop',
    'label' => esc_html__('Font Size', 'taproot'),
    'atts'  => range_atts('heading')
]);


// Line Height
range( $manager, 'branding--title-desktop--line-height', [
    'section' => 'branding--title-desktop',
    'label' => esc_html__('Line Height', 'taproot'),
    'atts'  => range_atts('line-height')
]);
