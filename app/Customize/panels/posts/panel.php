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
    'meta',
    'nav',
]);


// Title sequence
$panel->sequence([ 
    'sections' => [
        'posts--title' => [ 
            'hide' => false,
            'next' => [
                'label' => __('mobile', 'taproot'),
            ],        
        ],        
        'posts--title-mobile' => [ 
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
        'posts--title-tablet' => [ 
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => __('mobile', 'taproot'),
            ],
            'next' => [
                'label' => __('desktop', 'taproot'),
            ],
        ],
        'posts--title-desktop' => [ 
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