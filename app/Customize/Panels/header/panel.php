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
    'styles',
    'styles-fixed',
    'padding-mobile',
    'padding-tablet',
    'padding-desktop',
    'padding-fixed',
    'image'
]);


// header styles sequence
$panel->sequence([
    'sections' => [
        'header--padding-mobile' => [
            'device' => 'mobile',
            'hide' => false,
            'prev' => [
                'link' => false
            ],
            'next' => [
                'label' => __('tablet', 'taproot'),
            ],
        ],
        'header--padding-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => __('mobile', 'taproot'),
            ],
            'next' => [
                'label' => __('desktop', 'taproot'),
            ],
        ],
        'header--padding-desktop' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => __('tablet', 'taproot'),
            ],
            'next' => [
                'link' => false
            ],
        ],
        'header--padding-fixed' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => __('tablet', 'taproot'),
                'link' => 'header--padding-tablet'
            ],
            'next' => [
                'link' => false
            ],
        ],

    ],
]);


// Padding Desktop Tabs
$panel->tabs([
    'sections' => [
        'header--padding-desktop' => [
            'label' => 'default',
            'device' => 'desktop',
            'hide' => true
        ],
        'header--padding-fixed' => [
            'label' => 'fixed',
            'device' => 'desktop',
            'hide' => true
        ],
    ],
]);


// Header Styles tabs
$panel->tabs([
    'title' => __('Header Styles', 'taproot'),
    'sections' => [
        'header--styles' => [ 'label' => 'default', 'hide' => false ],
        'header--styles-fixed' => [ 'label' => 'fixed', 'hide' => true ],
    ],
]);
