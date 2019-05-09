<?php
/**
 * Section setup.
 *
 * This file adds the section, settings and controls to the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'branding--logo', [
    'title' => esc_html__( 'Logo', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Move the header image section to the header panel
if( $manager->get_control( 'custom_logo' ) ) {
    $manager->get_control( 'custom_logo' )->section = 'branding--logo';
}


// Setting: Logo Width
range( $manager, 'branding--logo--width', [
    'section' => 'branding--logo',
    'label' => esc_html__('Logo Width', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 500,
            'default' => 60
        ]
    ],
    'devices' => ['mobile', 'tablet', 'desktop']
]);


// Setting: Logo Gutter
range( $manager, 'branding--logo--gutter', [
    'section' => 'branding--logo',
    'label' => esc_html__('Gutter Width', 'taproot'),
    'atts'  => [
        'px' => [
            'max' => 50,
            'default' => 16
        ]
    ],
    'devices' => ['mobile', 'tablet', 'desktop']
]);
