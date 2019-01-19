<?php
/**
 * Default values for our section.
 *
 * This file creates defines the defaults to use for our customizer controls
 * and the output of get_theme_mod when no value is set in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


// Tagline font size
$defaults->add( 'branding--tagline-fixed--font-size', get_theme_mod( 'branding--tagline-desktop--font-size', '1em' ) );

// disable by default
$defaults->add( 'branding--tagline-fixed--font-size--enable', false );


// Tagline line height
$defaults->add( 'branding--tagline-fixed--line-height', get_theme_mod( 'branding--tagline-desktop--line-height', '1' ) );

// disable by default
$defaults->add( 'branding--tagline-fixed--line-height--enable', false );


// Tagline gutter
$defaults->add( 'branding--tagline-fixed--gutter', get_theme_mod( 'branding--tagline-desktop--gutter', '0.1em' ) );

// disable by default
$defaults->add( 'branding--tagline-fixed--gutter--enable', false );