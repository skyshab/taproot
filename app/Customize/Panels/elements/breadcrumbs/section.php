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


use function Taproot\Customize\color;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'elements--breadcrumbs', [
    'title' => esc_html__( 'Breadcrumbs', 'taproot' ),
    'panel' => 'elements',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Enable Breadcrumbs
$manager->add_setting( 'elements--breadcrumbs--enable', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'elements--breadcrumbs--enable', [
    'label'     => esc_html__( 'Enable Breadcrumbs', 'taproot' ),
    'section'   => 'elements--breadcrumbs',
    'type'      => 'checkbox'
]);


// Setting: Breadcrumbs Align
$manager->add_setting( 'elements--breadcrumbs--align', [
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
]);

$manager->add_control( 'elements--breadcrumbs--align', [
    'type' => 'select',
    'section' => 'elements--breadcrumbs',
    'label' => esc_html__( 'Breadcrumbs Align', 'taproot' ),
    'choices' => [
        'flex-start' => esc_html__( 'Left', 'taproot' ),
        'center' => esc_html__( 'Center', 'taproot' ),
        'flex-end' => esc_html__( 'Right', 'taproot' ),
    ],
]);


// Setting: Breadcrumb font size
range( $manager, 'elements--breadcrumbs--font-size', [
    'section' => 'elements--breadcrumbs',
    'label' => esc_html__('Breadcrumbs Font Size', 'taproot'),
    'atts' => range_atts()
]);


// Setting: Use Home Icon
$manager->add_setting( 'elements--breadcrumbs--home-icon', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'elements--breadcrumbs--home-icon', [
    'label'     => esc_html__( 'Use icon for home', 'taproot' ),
    'section'   => 'elements--breadcrumbs',
    'type'      => 'checkbox'
]);


// Setting: Enable Breadcrumb Separators
$manager->add_setting( 'elements--breadcrumbs--has-separators', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'elements--breadcrumbs--has-separators', [
    'label'     => esc_html__( 'Use Separators', 'taproot' ),
    'section'   => 'elements--breadcrumbs',
    'type'      => 'checkbox'
]);


// Color Setting: Text Color
color( $manager, 'elements--breadcrumbs--color', [
    'label'   => esc_html__( 'Text Color', 'taproot' ),
    'section' => 'elements--breadcrumbs',
]);


// Color Setting: Text Color Hover
color( $manager, 'elements--breadcrumbs--color--hover', [
    'label'   => esc_html__( 'Hover Color', 'taproot' ),
    'section' => 'elements--breadcrumbs',
]);
