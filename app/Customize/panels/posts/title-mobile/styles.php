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


// Var: Title Font Size
$styles->var([
    'name' => 'posts--title--font-size',
    'value' => get_theme_mod( 'posts--title-mobile--font-size' ),
    'screen' => 'default'
]);


// Var: Title Line Height
$styles->var([
    'name' => 'posts--title--line-height',
    'value' => get_theme_mod( 'posts--title-mobile--line-height' ),
    'screen' => 'default'
]);
