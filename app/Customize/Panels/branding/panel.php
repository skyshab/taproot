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
    'layout-mobile', 'layout-tablet', 'layout-desktop',
    'logo', 'logo-mobile', 'logo-tablet', 'logo-desktop', 'logo-fixed',
    'title', 'title-mobile', 'title-tablet', 'title-desktop', 'title-fixed',
    'tagline', 'tagline-mobile', 'tagline-tablet', 'tagline-desktop', 'tagline-fixed'
]);


// layout sequence
$panel->sequence([
    'title' => esc_html__('Layout', 'taproot'),
    'sections' => [
        'branding--layout-mobile' => [
            'device' => 'mobile',
            'hide' => false,
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'branding--layout-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'branding--layout-desktop' => [
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



// Logo sequence
$panel->sequence([
    'sections' => [
        'branding--logo' => [
            'hide' => false,
            'next' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
        ],
        'branding--logo-mobile' => [
            'device' => 'mobile',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('logo', 'taproot'),
                'device' => 'desktop',
            ],
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'branding--logo-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'branding--logo-desktop' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
            'next' => [
                'link' => false
            ],
        ],
        'branding--logo-fixed' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
                'link' => 'branding--logo-tablet'
            ],
            'next' => [
                'link' => false
            ],
        ],
    ],
]);



// Title sequence
$panel->sequence([
    'sections' => [
        'branding--title' => [
            'hide' => false,
            'next' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
        ],
        'branding--title-mobile' => [
            'device' => 'mobile',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('title', 'taproot'),
                'device' => 'desktop',
            ],
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'branding--title-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'branding--title-desktop' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
            'next' => [
                'link' => false
            ],
        ],
        'branding--title-fixed' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
                'link' => 'branding--title-tablet'
            ],
            'next' => [
                'link' => false
            ],
        ],
    ],
]);


// Tagline sequence
$panel->sequence([
    'sections' => [
        'branding--tagline' => [
            'hide' => false,
            'next' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
        ],
        'branding--tagline-mobile' => [
            'device' => 'mobile',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tagline', 'taproot'),
                'device' => 'desktop',
            ],
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'branding--tagline-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'branding--tagline-desktop' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
            'next' => [
                'link' => false
            ],
        ],
        'branding--tagline-fixed' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
                'link' => 'branding--tagline-tablet'
            ],
            'next' => [
                'link' => false
            ],
        ],
    ],
]);


// desktop logo tabs
$panel->tabs([
    'title' => esc_html__('Logo - Desktop', 'taproot'),
    'sections' => [
        'branding--logo-desktop' => [ 'label' => 'default', 'hide' => false ],
        'branding--logo-fixed' => [ 'label' => 'fixed', 'hide' => true ],
    ],
]);

// desktop title tabs
$panel->tabs([
    'title' => esc_html__('Title - Desktop', 'taproot'),
    'sections' => [
        'branding--title-desktop' => [ 'label' => 'default', 'hide' => false ],
        'branding--title-fixed' => [ 'label' => 'fixed', 'hide' => true ],
    ],
]);

// desktop tagline tabs
$panel->tabs([
    'title' => esc_html__('Tagline - Desktop', 'taproot'),
    'sections' => [
        'branding--tagline-desktop' => [ 'label' => 'default', 'hide' => false ],
        'branding--tagline-fixed' => [ 'label' => 'fixed', 'hide' => true ],
    ],
]);
