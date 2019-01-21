<?php
/**
 * Section setup.
 *
 * This file adds the section, settings and controls to the customizer. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

use Taproot\Customize\Controls\Font_Styles;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;
use function Taproot\Customize\color;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'blog--archive-title', [
    'title' => esc_html__( 'Archive Title', 'taproot' ),
    'panel' => 'blog',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Color Setting: Title Color
color( $manager, 'blog--archive-title--color', [
    'label'   => esc_html__( 'Title Color', 'taproot' ),
    'section' => 'blog--archive-title',  
]); 


// Color Setting: Title Color Hover
color( $manager, 'blog--archive-title--color--hover', [
    'label'   => esc_html__( 'Title Color Hover', 'taproot' ),
    'section' => 'blog--archive-title',  
]); 


// Setting: Title Font Size
range( $manager, 'blog--archive-title--font-size', [
    'section'   => 'blog--archive-title',
    'label'     => esc_html__('Title Font Size', 'taproot'),    
    'atts' => range_atts('heading')
]);


// Font Styles
$manager->add_setting( 'blog--archive-title--font-styles', [
    'transport' => 'postMessage'
]);

$manager->add_control( new Font_Styles( $manager, 'blog--archive-title--font-styles', [
    'section' => 'blog--archive-title',
    'label'   => esc_html__( 'Title Font Styles', 'taproot' ),
]));
