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

 
use function Rootstrap\get_theme_mod;


// Button Hover Styles
$styles->add([
    'selector' => '.taproot-button:hover, .comment-respond__submit:hover',
    'styles' => [ 
        'color'             =>  get_theme_mod( 'elements--buttons-hover--color' ),
        'background-color'  =>  get_theme_mod( 'elements--buttons-hover--background-color' ),
        'border-color'      =>  get_theme_mod( 'elements--buttons-hover--border-color' ),
    ]
]);
