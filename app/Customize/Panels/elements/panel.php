<?php
/**
 * Add customizer panel
 *
 * This file creates a panel in the customizer
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


// define sections
$panel->sections([
    'buttons', 'buttons-hover',
    'breadcrumbs',
]);


// Button tabs
$panel->tabs([
    'title' => __('Buttons', 'taproot'),
    'sections' => [
        'elements--buttons' => [ 'label' => 'default', 'hide' => false ],
        'elements--buttons-hover' => [ 'label' => 'hover', 'hide' => true ],
    ],
]);
