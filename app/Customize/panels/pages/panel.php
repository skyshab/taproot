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

 
// Define sections
$panel->sections([
    'layout', 
    'title', 'title-mobile', 'title-tablet', 'title-desktop',
]);


// Title sequence
$panel->sequence([ 
    'sections' => [
        'pages--title' => [ 
            'hide' => false,
            'next' => [
                'label' => __('mobile'),
            ],        
        ],        
        'pages--title-mobile' => [ 
            'device' => 'mobile',
            'hide' => true,
            'prev' => [
                'label' => __('general'),
                'device' => 'desktop'
            ],
            'next' => [
                'label' => __('tablet'),
            ],
        ],
        'pages--title-tablet' => [ 
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => __('mobile'),
            ],
            'next' => [
                'label' => __('desktop'),
            ],
        ],
        'pages--title-desktop' => [ 
            'device' => 'desktop',
            'hide' => true,
            'prev' => [
                'label' => __('tablet'),
            ],
            'next' => [
                'link' => false
            ],
        ],     
    ],
]);