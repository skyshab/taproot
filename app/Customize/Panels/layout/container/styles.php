<?php
/**
 * Styles for our section.
 *
 * This file creates the front end styles for our customizer controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\is_boxed_layout;
use function Taproot\Customize\get_layout_width;
use function Taproot\Customize\get_full_layout_width;
use function Taproot\Customize\get_full_layout_padding;
use function Rootstrap\get_theme_mod;


$max_container_width = get_theme_mod( 'layout--container--max-width', null, true );

$styles->add_var([
    'name' => 'layout--container--max-width',
    'value' => $max_container_width
]);

$full_layout_width = get_full_layout_width();

if($full_layout_width) {

    $styles->add_screen( 'layout-is-fullwidth', [
        'min' => $full_layout_width . 'px',
    ]);

    $styles->add_var([
        'screen' => 'layout-is-fullwidth',
        'name' => 'layout--container--padding',
        'value' => get_full_layout_padding()
    ]);

    if( is_boxed_layout() ) {

        $max_width_int = (int) filter_var($max_container_width, FILTER_SANITIZE_NUMBER_INT);
        $width = (float) filter_var( get_layout_width('desktop'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
        $alignwide_width = $max_width_int * $width . 'px';

        $styles->add([
            'screen' => 'layout-is-fullwidth',
            'selector' => '.app-main--full.boxed-layout .alignwide',
            'styles' => [
                'width' => $alignwide_width,
                'margin-left' => sprintf('calc( (%s - 100%%) / -2 )', $alignwide_width)
            ],
        ]);

    } else {

        $styles->add([
            'screen' => 'layout-is-fullwidth',
            'selector' => '.app-main--full .alignwide',
            'styles' => [
                'margin-left' => sprintf('calc( (%s - 100%%) / -2 )', $max_container_width),
            ],
        ]);
    }
}
