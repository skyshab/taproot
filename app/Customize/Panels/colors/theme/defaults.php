<?php
/**
 * Default values for our section.
 *
 * This file creates defines the defaults to use for our customizer controls
 * and the output of get_theme_mod when no value is set in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\get_palette_color;


// Text Color
$defaults->add( 'colors--theme--text', get_palette_color('theme-text') );

// Accent Color
$defaults->add( 'colors--theme--accent', get_palette_color('theme-accent') );

// Accent Contrast Color
$defaults->add( 'colors--theme--accent-contrast', '#ffffff' );

// Meta Color Light
$defaults->add( 'colors--theme--meta-light', get_palette_color('theme-meta-light') );

// Meta Color Medium
$defaults->add( 'colors--theme--meta-medium', get_palette_color('theme-meta-medium') );

// Meta Color Dark
$defaults->add( 'colors--theme--meta-dark', get_palette_color('theme-meta-dark') );
