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
    'layout',
    'logo',
    'title',
    'tagline',
    'logo-fixed', 'title-fixed', 'tagline-fixed'
]);


// Fixed Header tabs
$panel->tabs([
    'title' => esc_html__('Fixed Header', 'taproot'),
    'sections' => [
        'branding--logo-fixed' => [ 'label' => 'logo', 'hide' => false ],
        'branding--title-fixed' => [ 'label' => 'title', 'hide' => true ],
        'branding--tagline-fixed' => [ 'label' => 'tagline', 'hide' => true ],
    ],
]);
