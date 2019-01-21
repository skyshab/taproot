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


$manager->add_section( 'footer--padding-tablet', [
    'title' => esc_html__( 'Padding - Tablet', 'taproot' ),
    'panel' => 'footer',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Padding
range( $manager, 'footer--padding-tablet--padding', [
    'section' => 'footer--padding-tablet',
    'label' => esc_html__('Padding', 'taproot'), 
    'atts' => range_atts('layout-padding')
]);
