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


// Show when fixed header
// $defaults->add( 'nav--navbar-fixed--fixed', 0 );


// Nav align
$defaults->add( 'nav--navbar-fixed--align', 'center' );


// menu item font size
$defaults->add( 'nav--navbar-fixed--font-size', get_theme_mod( 'nav--navbar--font-size' ) );


// menu item height
$defaults->add( 'nav--navbar-fixed--height',  get_theme_mod( 'nav--navbar--height' ) );


// menu item side padding
$defaults->add( 'nav--navbar-fixed--padding', get_theme_mod( 'nav--navbar--padding' ) );


// menu item font size
$defaults->add( 'nav--navbar-fixed--font-size--enable', false );


// menu item height
$defaults->add( 'nav--navbar-fixed--height--enable',  false );


// menu item side padding
$defaults->add( 'nav--navbar-fixed--padding--enable', false );
