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


use Taproot\Customize\Controls\Responsive_Control;
use function Taproot\Customize\radio;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'branding--layout', [
    'title' => esc_html__( 'Layout', 'taproot' ),
    'panel' => 'branding',
]);


# =======================================================
# Add Settings & Controls
# =======================================================


// Setting: Widgets layout
radio( $manager, 'branding--layout', [
    'section' => 'branding--layout',
    'label' => esc_html__( 'Branding Layout', 'taproot' ),
    'choices' => [
        'vertical' => esc_html__( 'Vertical', 'taproot' ),
        'horizontal' => esc_html__( 'Horizontal', 'taproot' ),
    ],
    'devices' => ['mobile', 'tablet', 'desktop']
]);
