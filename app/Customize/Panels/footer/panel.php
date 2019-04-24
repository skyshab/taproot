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
    'padding-mobile', 'padding-tablet', 'padding-desktop',
    'widgets', 'widgets-mobile', 'widgets-tablet', 'widgets-desktop',
    'bottom-bar'
]);


// footer styles sequence
$panel->sequence([
    'sections' => [
        'footer--padding-mobile' => [
            'device' => 'mobile',
            'hide' => false,
            'prev' => [
                'link' => false
            ],
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'footer--padding-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'footer--padding-desktop' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
            'next' => [
                'link' => false
            ],
        ],
    ],
]);


// footer widgets sequence
$panel->sequence([
    'sections' => [
        'footer--widgets' => [ 'hide' => false ],
        'footer--widgets-mobile' => [
            'device' => 'mobile',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('widgets', 'taproot'),
                'device' => 'desktop'
            ],
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'footer--widgets-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'footer--widgets-desktop' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
            'next' => [
                'link' => false
            ],
        ],
    ],
]);