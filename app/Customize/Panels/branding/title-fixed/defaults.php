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


// Title font size
$defaults->add( 'branding--title-fixed--font-size', get_theme_mod( 'branding--title-desktop--font-size', '1.8em' ) );

// disable by default
$defaults->add( 'branding--title-fixed--font-size--enable', false );


// Title line height
$defaults->add( 'branding--title-fixed--line-height', get_theme_mod( 'branding--title-desktop--line-height', '1' ) );

// disable by default
$defaults->add( 'branding--title-fixed--line-height--enable', false );
