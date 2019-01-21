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
    'layout',
    'title', 'title-mobile', 'title-tablet', 'title-desktop',
    'archive-title', 'archive-meta', 'archive-excerpt', 'archive-link',
    'pagination', 'pagination-hover',
]);



// Archive tabs
$panel->tabs([ 
    'title' => __('Post Archives', 'taproot'),
    'sections' => [
        'blog--archive-title' => [ 'label' => 'Title', 'hide' => false ],
        'blog--archive-meta' => [ 'label' => 'Meta', 'hide' => true ],
        'blog--archive-excerpt' => [ 'label' => 'Excerpt', 'hide' => true ],
        'blog--archive-link' => [ 'label' => 'Link', 'hide' => true ],
    ], 
]);


// Pagination tabs
$panel->tabs([ 
    'title' => __('Pagination', 'taproot'),
    'sections' => [
        'blog--pagination' => [ 'label' => 'Default', 'hide' => false ],
        'blog--pagination-hover' => [ 'label' => 'Hover', 'hide' => true ],
    ], 
]);


// Blog Title sequence
$panel->sequence([ 
    'sections' => [
        'blog--title' => [ 
            'hide' => false,
            'next' => [
                'label' => __('mobile', 'taproot'),
            ],        
        ],        
        'blog--title-mobile' => [ 
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
        'blog--title-tablet' => [ 
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => __('mobile', 'taproot'),
            ],
            'next' => [
                'label' => __('desktop', 'taproot'),
            ],
        ],
        'blog--title-desktop' => [ 
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
