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
    'body',
    'headings', 'h1','h2','h3','h4','h5','h6',
    'links',
    'sidebar'
]);


$heading_sequence_tabs_array = [
    'hide' => true,
    'prev' => [
        'label' => esc_html__('all headings', 'taproot'),
        'link' => 'typography--headings'
    ],
    'next' => [
        'link' => false
    ],
];

// headings sequence
$panel->sequence([
    'sections' => [
        'typography--headings' => [
            'hide' => false,
            'next' => [
                'label' => esc_html__('headings', 'taproot'),
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
