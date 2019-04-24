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


use function Taproot\Customize\theme_mod;


// Fixed Header Styles
$styles->add([
    'selector' => '.app-header--fixed .app-header__container',
    'styles' => [
        'padding-top'    => theme_mod( 'header--padding-fixed--padding' ),
        'padding-bottom' => theme_mod( 'header--padding-fixed--padding' ),
    ],
    'screen' => 'desktop'
]);
