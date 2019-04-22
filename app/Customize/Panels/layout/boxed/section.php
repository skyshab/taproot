<?php
/**
 * Section setup.
 *
 * This file adds the section, settings and controls to the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'layout--boxed', [
    'title' => esc_html__('Boxed Layout', 'taproot'),
    'panel' => 'layout',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Boxed Layout
$manager->add_setting( 'layout--boxed--enable', [
    'sanitize_callback' => 'taproot_sanitize_checkbox',
    'transport' => 'refresh',
]);

$manager->add_control( 'layout--boxed--enable', [
    'label'     => esc_html__('Use a boxed layout', 'taproot'),
    'section'   => 'layout--boxed',
    'type'      => 'checkbox'
]);


// Outer Padding
range( $manager, 'layout--boxed--outer-padding', [
    'section' => 'layout--boxed',
    'label' => esc_html__('Outer Padding', 'taproot'),
    'atts' => range_atts('layout-padding')
]);
