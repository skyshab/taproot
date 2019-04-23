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


// Show when fixed
$defaults->add( 'nav--header-fixed--fixed', null, true );


// menu item side padding
$defaults->add( 'nav--header-fixed--padding--enable', false );


// menu item font size
$defaults->add( 'nav--header-fixed--font-size--enable', false );


// menu item height
$defaults->add( 'nav--header-fixed--height--enable', false );


// dropdown background color
$defaults->add( 'nav--header-fixed--dropdown--background-color', get_theme_mod( 'colors--theme--accent' ) );
