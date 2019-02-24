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


// Background Color
$defaults->add( 'footer--bottom-bar--background-color', '#000000' );    


// Text Color
$defaults->add( 'footer--bottom-bar--default-color', '#ffffff' );    


// Bottom Bar Content
$defaults->add( 'footer--bottom-bar--content', esc_html__( 'Created with Taproot', 'taproot' ) );   