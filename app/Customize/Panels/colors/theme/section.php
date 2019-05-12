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


$manager->add_section( 'colors--theme', [
    'title' => esc_html__( 'Theme Colors', 'taproot' ),
    'panel' => 'colors',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Accent Color
color( $manager, 'colors--theme--accent', [
    'label'   => esc_html__( 'Accent Color', 'taproot' ),
    'section' => 'colors--theme',
]);

// Color Setting: Accent Contrast Color
color( $manager, 'colors--theme--accent-contrast', [
    'label'   => esc_html__( 'Accent Contrast Color', 'taproot' ),
    'section' => 'colors--theme',
]);

// Color Setting: Meta Color Light
color( $manager, 'colors--theme--meta-light', [
    'label'   => esc_html__( 'Meta Color - Light', 'taproot' ),
    'section' => 'colors--theme',
]);

// Color Setting: Meta Color Light
color( $manager, 'colors--theme--meta-medium', [
    'label'   => esc_html__( 'Meta Color - Medium', 'taproot' ),
    'section' => 'colors--theme',
]);

// Color Setting: Meta Color Light
color( $manager, 'colors--theme--meta-dark', [
    'label'   => esc_html__( 'Meta Color - Dark', 'taproot' ),
    'section' => 'colors--theme',
]);
