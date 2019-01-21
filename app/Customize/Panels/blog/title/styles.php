<?php
/**
 * Styles for our section.
 *
 * This file creates the front end styles for our customizer controls. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\get_font_styles;
use function Rootstrap\get_theme_mod;


// Blog Title Color
$styles->add([
    'selector' => '.archive-header__title',
    'styles' => [ 'color' => get_theme_mod( 'blog--title--color' ) ]
]);


// Font Style
$styles->add([
    'selector' => '.archive-header__title',
    'styles' => get_font_styles( 'blog--title--font-styles' )
]);
