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


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'colors--sidebar', [
    'title' => esc_html__( 'Sidebar Colors', 'taproot' ),
    'panel' => 'colors',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Background Color
color( $manager, 'colors--sidebar--background-color', [
    'label'   => esc_html__( 'Background Color', 'taproot' ),
    'section' => 'colors--sidebar',
]);

// Color Setting: Text Color
color( $manager, 'colors--sidebar--text-color', [
    'label'   => esc_html__( 'Text Color', 'taproot' ),
    'section' => 'colors--sidebar',
]);

// Color Setting: Accent Color
color( $manager, 'colors--sidebar--accent-color', [
    'label'   => esc_html__( 'Accent Color', 'taproot' ),
    'section' => 'colors--sidebar',
]);

// Color Setting: Link Color
color( $manager, 'colors--sidebar--link-color', [
    'label'   => esc_html__( 'Link Color', 'taproot' ),
    'section' => 'colors--sidebar',
]);

// Color Setting: Link Color: Hover
color( $manager, 'colors--sidebar--link-color--hover', [
    'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
    'section' => 'colors--sidebar',
]);
