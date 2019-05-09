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


// Archive Entry Font Style
$defaults->add( 'blog--title--font-styles', 'capitalize' );


// Default title for Blog page
$defaults->add( 'blog--title--title', 'Blog' );


// blog title size
$defaults->add( 'blog--title--font-size', '2em' );

// Disable Font Size by default
$defaults->add( 'blog--title--font-size--enable', false );

// blog title line-height
$defaults->add( 'blog--title--line-height', '1.05em' );

// Disable Line Height by default
$defaults->add( 'blog--title--line-height--enable', false );


// blog title size tablet
$defaults->add( 'blog--title--font-size--tablet', '2.5em');

// Disable Font Size by default tablet
$defaults->add( 'blog--title--font-size--enable--tablet', false );


// blog title line-height tablet
$defaults->add( 'blog--title--line-height--tablet', '1.05em' );

// Disable Line Height by default tablet
$defaults->add( 'blog--title--line-height--enable--tablet', false );



// blog title size desktop
$defaults->add( 'blog--title--font-size--desktop', '3em' );

// Disable Font Size by default desktop
$defaults->add( 'blog--title--font-size--enable--desktop', false );


// blog title line-height desktop
$defaults->add( 'blog--title--line-height--desktop', '1.05em' );

// Disable Line Height by default desktop
$defaults->add( 'blog--title--line-height--enable--desktop', false );
