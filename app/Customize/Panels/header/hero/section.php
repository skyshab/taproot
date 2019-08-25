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


use function Taproot\Customize\color;
use function Taproot\Customize\range;
use function Taproot\Customize\range_atts;


# =======================================================
# Add Section
# =======================================================


$manager->add_section( 'header--hero', [
    'title' => esc_html__( 'Hero Header', 'taproot' ),
    'panel' => 'header',
    'priority' => 130
]);


# =======================================================
# Add Settings & Controls
# =======================================================


    // Setting: Hero Height
    range( $manager, 'header--hero--height', [
        'section' => 'header--hero',
        'label' => esc_html__('Height', 'taproot'),
        'devices' => ['mobile', 'tablet', 'desktop'],
        'atts' => [
            'vw' => [
                'min' => 0,
                'max' => 100,
            ],
            'vh' => [
                'min' => 0,
                'max' => 100,
            ],
            'px' => [
                'min' => 0,
                'max' => 1200,
            ],
        ]
    ]);


    // Color Setting: Overlay Color
    color( $manager, 'header--hero--overlay-color', [
        'label'   => esc_html__( 'Overlay Color', 'taproot' ),
        'section' => 'header--hero',
        'hide_alpha' => true
    ]);


    // Setting: Overlay Opacity
    range( $manager, 'header--hero--overlay-opacity', [
        'section' => 'header--hero',
        'label' => esc_html__('Overlay Opacity', 'taproot'),
        'atts' => [
            '%' => [
                'min' => 0,
                'max' => 100,
                'default' => 50,
                'step' => 10
            ],
        ]
    ]);


    // Color Setting: Header Default Color
    color( $manager, 'header--hero--default-color', [
        'label'   => esc_html__( 'Hero Text Color', 'taproot' ),
        'section' => 'header--hero',
    ]);


    // Color Setting: Header Default Link Hover Color
    color( $manager, 'header--hero--default-color--hover', [
        'label'   => esc_html__( 'Hero Link Hover Color', 'taproot' ),
        'section' => 'header--hero',
    ]);



# =======================================================
# Selective Refresh
# =======================================================


// If the selective refresh component is available
if ( isset( $manager->selective_refresh ) ) {

    $manager->selective_refresh->add_partial( 'header--hero--overlay-color', [
        'selector'            => '#taproot-overlay',
        'render_callback'     => 'Taproot\Template\get_overlay',
        'container_inclusive' => true,
        'fallback_refresh'    => false
    ]);

    $manager->selective_refresh->add_partial( 'header--hero--overlay-opacity', [
        'selector'            => '#taproot-overlay',
        'render_callback'     => 'Taproot\Template\get_overlay',
        'container_inclusive' => true,
        'fallback_refresh'    => false
    ]);
}
