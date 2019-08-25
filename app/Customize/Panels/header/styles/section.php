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


$manager->add_section( 'header--styles', [
    'title' => esc_html__( 'Header Styles', 'taproot' ),
    'panel' => 'header',
    'priority' => 100
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Fullwidth Header
$manager->add_setting( 'header--styles--fullwidth', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'postMessage',
]);

$manager->add_control( 'header--styles--fullwidth', [
    'type' => 'checkbox',
    'section' => 'header--styles',
    'label' => esc_html__( 'Enable Fullwidth Header', 'taproot' ),
]);



// Color Setting: Background Color
color( $manager, 'header--styles--background-color', [
    'label'   => esc_html__( 'Header Background Color', 'taproot' ),
    'section' => 'header--styles',
]);


// Color Setting: Header Default Color
color( $manager, 'header--styles--default-color', [
    'label'   => esc_html__( 'Header Default Color', 'taproot' ),
    'section' => 'header--styles',
]);


// Color Setting: Header Default Link Hover Color
color( $manager, 'header--styles--default-color--hover', [
    'label'   => esc_html__( 'Header Default Color: Hover', 'taproot' ),
    'section' => 'header--styles',
]);


// Setting: Header Padding
range( $manager, 'header--styles--padding', [
    'section' => 'header--styles',
    'label' => esc_html__('Padding', 'taproot'),
    'atts' => range_atts('layout-padding'),
    'devices' => ['mobile', 'tablet', 'desktop']
]);
