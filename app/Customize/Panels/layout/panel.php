<?php
/**
 * Add customizer panel
 *
 * This file creates a panel in the customizer
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


// define sections
$panel->sections([
    'boxed',
    'container', 'container-mobile',  'container-tablet', 'container-desktop',
    'content',
    'sidebar'
]);


// layout sequence
$panel->sequence([
    'title' => __('Container', 'taproot'),
    'sections' => [
        'layout--container' => [
            'hide' => false,
            'next' => [
                'label' => __('mobile', 'taproot'),
            ],
        ],
        'layout--container-mobile' => [
            'device' => 'mobile',
            'hide' => true,
            'prev' => [
                'label' => __('general', 'taproot'),
                'device' => 'desktop'
            ],
            'next' => [
                'label' => __('tablet', 'taproot'),
            ],
        ],
        'layout--container-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => __('mobile', 'taproot'),
            ],
            'next' => [
                'label' => __('desktop', 'taproot'),
            ],
        ],
        'layout--container-desktop' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => __('tablet', 'taproot'),
            ],
            'next' => [
                'link' => false
            ],
        ],
    ],
]);
