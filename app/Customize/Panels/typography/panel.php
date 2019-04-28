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
    'fonts',
    'body', 'body-mobile', 'body-tablet', 'body-desktop',
    'headings', 'h1','h2','h3','h4','h5','h6',
    'h1-mobile','h2-mobile','h3-mobile','h4-mobile','h5-mobile','h6-mobile',
    'h1-tablet','h2-tablet','h3-tablet','h4-tablet','h5-tablet','h6-tablet',
    'h1-desktop','h2-desktop','h3-desktop','h4-desktop','h5-desktop','h6-desktop',
    'links',
    'sidebar-mobile', 'sidebar-tablet', 'sidebar-desktop',
]);


// body sequence
$panel->sequence([
    'sections' => [
        'typography--body' => [
            'hide' => false,
            'next' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
        ],
        'typography--body-mobile' => [
            'device' => 'mobile',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('styles', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'typography--body-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'typography--body-desktop' => [
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


$heading_sequence_tabs_array = [
    'hide' => true,
    'prev' => [
        'label' => esc_html__('headings', 'taproot'),
        'link' => 'typography--headings'
    ],
    'next' => [
        'label' => esc_html__('mobile', 'taproot'),
        'link' => 'typography--h1-mobile'
    ],
];

// headings sequence
$panel->sequence([
    'sections' => [
        'typography--headings' => [
            'hide' => false,
            'next' => [
                'label' => esc_html__('styles', 'taproot'),
            ],
        ],
        'typography--h1' => $heading_sequence_tabs_array,
        'typography--h2' => $heading_sequence_tabs_array,
        'typography--h3' => $heading_sequence_tabs_array,
        'typography--h4' => $heading_sequence_tabs_array,
        'typography--h5' => $heading_sequence_tabs_array,
        'typography--h6' => $heading_sequence_tabs_array,
    ],
]);


// headings tabs
$panel->tabs([
    'title' => esc_html__('Heading Styles', 'taproot'),
    'sections' => [
        'typography--h1' => [ 'label' => 'h1', 'hide' => true ],
        'typography--h2' => [ 'label' => 'h2', 'hide' => true ],
        'typography--h3' => [ 'label' => 'h3', 'hide' => true ],
        'typography--h4' => [ 'label' => 'h4', 'hide' => true ],
        'typography--h5' => [ 'label' => 'h5', 'hide' => true ],
        'typography--h6' => [ 'label' => 'h6', 'hide' => true ],
    ],
]);


$mobile_heading_sequence_tabs_array = [
    'hide' => true,
    'prev' => [
        'label' => esc_html__('styles', 'taproot'),
        'link' => 'typography--h1',
        'device' => 'desktop',
    ],
    'next' => [
        'label' => esc_html__('tablet', 'taproot'),
        'link' => 'typography--h1-tablet'
    ],
    'device' => 'mobile'
];

// mobile headings sequence
$panel->sequence([
    'sections' => [
        'typography--h1-mobile' => $mobile_heading_sequence_tabs_array,
        'typography--h2-mobile' => $mobile_heading_sequence_tabs_array,
        'typography--h3-mobile' => $mobile_heading_sequence_tabs_array,
        'typography--h4-mobile' => $mobile_heading_sequence_tabs_array,
        'typography--h5-mobile' => $mobile_heading_sequence_tabs_array,
        'typography--h6-mobile' => $mobile_heading_sequence_tabs_array
    ],
]);

// mobile headings tabs
$panel->tabs([
    'title' => esc_html__('Mobile Sizes', 'taproot'),
    'sections' => [
        'typography--h1-mobile' => [ 'label' => 'h1', 'hide' => true ],
        'typography--h2-mobile' => [ 'label' => 'h2', 'hide' => true ],
        'typography--h3-mobile' => [ 'label' => 'h3', 'hide' => true ],
        'typography--h4-mobile' => [ 'label' => 'h4', 'hide' => true ],
        'typography--h5-mobile' => [ 'label' => 'h5', 'hide' => true ],
        'typography--h6-mobile' => [ 'label' => 'h6', 'hide' => true ],
    ],
]);



$tablet_heading_sequence_tabs_array = [
    'hide' => true,
    'prev' => [
        'label' => esc_html__('mobile', 'taproot'),
        'link' => 'typography--h1-mobile'
    ],
    'next' => [
        'label' => esc_html__('desktop', 'taproot'),
        'link' => 'typography--h1-desktop'
    ],
    'device' => 'tablet'
];

// tablet headings sequence
$panel->sequence([
    'sections' => [
        'typography--h1-tablet' => $tablet_heading_sequence_tabs_array,
        'typography--h2-tablet' => $tablet_heading_sequence_tabs_array,
        'typography--h3-tablet' => $tablet_heading_sequence_tabs_array,
        'typography--h4-tablet' => $tablet_heading_sequence_tabs_array,
        'typography--h5-tablet' => $tablet_heading_sequence_tabs_array,
        'typography--h6-tablet' => $tablet_heading_sequence_tabs_array
    ],
]);


// tablet headings tabs
$panel->tabs([
    'title' => esc_html__('Tablet Sizes', 'taproot'),
    'sections' => [
        'typography--h1-tablet' => [ 'label' => 'h1', 'hide' => true ],
        'typography--h2-tablet' => [ 'label' => 'h2', 'hide' => true ],
        'typography--h3-tablet' => [ 'label' => 'h3', 'hide' => true ],
        'typography--h4-tablet' => [ 'label' => 'h4', 'hide' => true ],
        'typography--h5-tablet' => [ 'label' => 'h5', 'hide' => true ],
        'typography--h6-tablet' => [ 'label' => 'h6', 'hide' => true ],
    ],
]);






$desktop_heading_sequence_tabs_array = [
    'hide' => true,
    'prev' => [
        'label' => esc_html__('tablet', 'taproot'),
        'link' => 'typography--h1-tablet'
    ],
    'next' => [
        'label' => false,
        'link' => false
    ],
    'device' => 'desktop'
];

// desktop headings sequence
$panel->sequence([
    'sections' => [
        'typography--h1-desktop' => $desktop_heading_sequence_tabs_array,
        'typography--h2-desktop' => $desktop_heading_sequence_tabs_array,
        'typography--h3-desktop' => $desktop_heading_sequence_tabs_array,
        'typography--h4-desktop' => $desktop_heading_sequence_tabs_array,
        'typography--h5-desktop' => $desktop_heading_sequence_tabs_array,
        'typography--h6-desktop' => $desktop_heading_sequence_tabs_array
    ],
    'next' => false
]);


// desktop headings tabs
$panel->tabs([
    'title' => esc_html__('Desktop Sizes', 'taproot'),
    'sections' => [
        'typography--h1-desktop' => [ 'label' => 'h1', 'hide' => true ],
        'typography--h2-desktop' => [ 'label' => 'h2', 'hide' => true ],
        'typography--h3-desktop' => [ 'label' => 'h3', 'hide' => true ],
        'typography--h4-desktop' => [ 'label' => 'h4', 'hide' => true ],
        'typography--h5-desktop' => [ 'label' => 'h5', 'hide' => true ],
        'typography--h6-desktop' => [ 'label' => 'h6', 'hide' => true ],
    ],
]);


// Main sequence
$panel->sequence([
    'sections' => [
        'typography--main-mobile' => [
            'device' => 'mobile',
            'hide' => false,
            'prev' => [
                'label' => esc_html__('styles', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'typography--main-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'typography--main-desktop' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
            'next' => [
                'link' => false
            ],
        ],
        'typography--main-desktop-two-col' => [
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('tablet', 'taproot'),
                'link' => 'typography--main-tablet',
            ],
            'next' => [
                'link' => false
            ],
        ],
    ],
]);


// Main tabs
$panel->tabs([
    'title' => esc_html__('Main - Desktop', 'taproot'),
    'sections' => [
        'typography--main-desktop' => [
            'label' => 'Full',
            'hide' => true
        ],
        'typography--main-desktop-two-col' => [
            'label' => 'Two Col',
            'hide' => true
        ],
    ],
]);



// Sidebar sequence
$panel->sequence([
    'sections' => [
        'typography--sidebar-mobile' => [
            'device' => 'mobile',
            'hide' => false,
            'prev' => [
                'label' => false,
            ],
            'next' => [
                'label' => esc_html__('tablet', 'taproot'),
            ],
        ],
        'typography--sidebar-tablet' => [
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => esc_html__('mobile', 'taproot'),
            ],
            'next' => [
                'label' => esc_html__('desktop', 'taproot'),
            ],
        ],
        'typography--sidebar-desktop' => [
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