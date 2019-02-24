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


// max width
$styles->add_var([
    'name' => 'layout--content--max-width',
    'value' => get_theme_mod( 'layout--content--max-width' ),
    'screen' => 'desktop',
]);


// $content_align = get_theme_mod( 'layout--content--align', 'center' );

// if( 'left' === $content_align  ||  'right' === $content_align ) {

//     $style_attribute = sprintf( 'margin-%s', $content_align ); 

//     $styles->add([
//         'screen' => 'desktop',
//         'selector' => '.app-main',
//         'styles' => [
//             $style_attribute => '0px'
//         ],
//     ]);
// }

