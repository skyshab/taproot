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
    'site',
    'content', 'content-mobile',  'content-tablet', 'content-desktop',
    'sidebar'
]);


// layout sequence
$panel->sequence([ 
    'title' => __('Content'),
    'sections' => [
        'layout--content' => [ 
            'hide' => false,
            'next' => [
                'label' => __('mobile'),
            ],
        ],        
        'layout--content-mobile' => [ 
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
        'layout--content-tablet' => [ 
            'device' => 'tablet',
            'hide' => true,
            'prev' => [
                'label' => __('mobile'),
            ],
            'next' => [
                'label' => __('desktop'),
            ],
        ],
        'layout--content-desktop' => [ 
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
