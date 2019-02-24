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


// show when fixed
// $defaults->add( 'nav--top-fixed--fixed', 0 );


// nav align
$defaults->add( 'nav--top-fixed--align', 'flex-start' );


// menu item font size
$defaults->add( 'nav--top-fixed--font-size', get_theme_mod( 'nav--top--font-size' ) );


// menu item height
$defaults->add( 'nav--top-fixed--line-height',  get_theme_mod( 'nav--top--line-height' ) );


// menu item side padding
$defaults->add( 'nav--top-fixed--padding', get_theme_mod( 'nav--top--padding' ) );


// menu item font size
$defaults->add( 'nav--top-fixed--font-size--enable', false );


// menu item height
$defaults->add( 'nav--top-fixed--height--enable',  false );


// menu item side padding
$defaults->add( 'nav--top-fixed--padding--enable', false );
