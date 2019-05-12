<?php
/**
 * Utility functions for customize controls
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize;


use Taproot\Customize\Controls\Color;
use Taproot\Customize\Controls\Group_Title;
use Taproot\Customize\Controls\Responsive_Control;


/**
 * Utility function for adding color control
 *
 * @since  1.0.0
 * @param string    $path
 * @return string
 */
function color( $manager, $id, $args = [] ) {

    $default    = ( isset( $args['default'] ) ) ? $args['default']  : '';
    $label      = ( isset( $args['label']   ) ) ? $args['label']    : '';
    $section    = ( isset( $args['section'] ) ) ? $args['section']  : '';
    $hide_alpha = ( isset( $args['hide_alpha'] ) && 'false' !== $args['hide_alpha'] ) ? $args['hide_alpha'] : false;

    $manager->add_setting( $id, array(
        'sanitize_callback' => 'taproot_sanitize_color_value',
        'transport' => 'postMessage',
        'default' => $default,
    ));

    $control = array(
        'label' => $label,
        'section' => $section,
        'settings' => $id,
        'hide_alpha' => $hide_alpha
    );

    if( isset( $args['priority'] ) && '' !== $args['priority'] ) $control['priority'] = $priority;

    $manager->add_control( new Color( $manager, $id, $control ) );
}


/**
 * Function for adding control group titles in the Customizer.
 *
 * @since 1.0.0
 * @param object    $wp_customize
 * @param array     $args - the control args
 */
function group_title( $manager, $args ) {
    $manager->add_setting( $args['id'], ['sanitize_callback' => 'sanitize_text_field'] );
    $manager->add_control( new Group_Title( $manager, $args['id'], [
        'label' => $args['label'],
        'section' => $args['section'],
        'type' => 'taproot-option-group',
    ]));
}


/**
 * Get Font Choices
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_font_choices() {

    $default_system_fonts = [
        '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif' => 'System Sans-Serif',
        '"Apple Garamond", "Baskerville", "Times New Roman", "Droid Serif", "Times","Source Serif Pro", serif' => 'System Serif',
        '"SF Mono", "Monaco", "Inconsolata", "Fira Mono", "Droid Sans Mono", "Source Code Pro", monospace' => 'System Monospace',
    ];

    $system_font_stacks = apply_filters( 'taproot/system-fonts', $default_system_fonts );

    $font_code = get_theme_mod( 'taproot-google-fonts' );
    $fonts = explode("|", $font_code);
    $font_choices = array('default' => 'Default');

    foreach( $fonts as $font ) {

        if( '' === $font ) continue;

        $font_id = strstr($font, ':', true) ?: $font;
        $font_name = str_replace( '+', ' ', $font_id );
        $font_choices['"' . $font_name . '"'] = $font_name;
    }

    // combine system font stacks with web fonts
    $font_choices = array_merge( $font_choices, $system_font_stacks );

    return $font_choices;
}


/**
 * Get default bottom bar content.
 *
 * @since 1.0.0
 * @return string
 */
function bottom_bar_default_content() {
    return esc_html__( '&#169;2019, My Awesome Site', 'taproot' );
}


/**
 * Range attribute default profiles
 *
 * @since 1.0.0
 * @param string    $type - profile to use
 * @return array    returns array of default atts
 */
function range_atts( $type = 'text' ) {

    $atts = [];

    if( 'text' === $type ) {

        $atts['em'] = [
            'min' => 0.6,
            'max' => 2,
        ];

        $atts['rem'] = [
            'min' => 0.6,
            'max' => 2,
        ];

        $atts['px'] = [
            'min' => 10,
            'max' => 32,
        ];
    }
    elseif( 'heading' === $type ) {

        $atts['em'] = [
            'min' => 0.8,
            'max' => 4,
        ];

        $atts['rem'] = [
            'min' => 0.8,
            'max' => 4,
        ];

        $atts['px'] = [
            'min' => 14,
            'max' => 72,
        ];
    }
    elseif( 'line-height' === $type ) {

        $atts['unitless'] = [
            'min' => 0.5,
            'max' => 3,
            'step' => 0.01,
            'default' => 1
        ];

        $atts['px'] = [
            'min' => 0,
            'max' => 72,
        ];
    }
    elseif( 'layout-padding' === $type ) {

        $atts['vw'] = [
            'max' => 20
        ];

        $atts['px'] = [
            'max' => 100,
        ];
    }
    elseif( 'defaults' === $type ) {
        $atts = [
            'unitless' => [
                'min'   => 0,
                'max'   => 100,
                'step'  => 1,
            ],
            'em' => [
                'min'   => 0,
                'max'   => 5,
                'step'  => 0.01,
                'default' => 1,
            ],
            'rem' => [
                'min'   => 0,
                'max'   => 5,
                'step'  => 0.01,
                'default' => 1
            ],
            'px' => [
                'min'   => 0,
                'max'   => 100,
                'step'  => 1,
                'default' => 16
            ],
            '%' => [
                'min'   => 0,
                'max'   => 100,
                'step'  => 1,
                'default' => 100
            ],
            'vw' => [
                'min'   => 0,
                'max'   => 100,
                'step'  => 1,
                'default' => 100
            ],
            'vh' => [
                'min'   => 0,
                'max'   => 100,
                'step'  => 1,
                'default' => 5
            ],
        ];
    }

    return $atts;
}


/**
 * Create Range Control
 *
 * @since 1.0.0
 * @return void
 */
function range( $wp_customize, $id, $args = [] ) {

    $default        = (isset($args['default'])) ? $args['default'] : false;
    $label          = (isset($args['label'])) ? $args['label'] : '';
    $section        = (isset($args['section'])) ? $args['section'] : '';
    $priority       = (isset($args['priority'])) ? $args['priority'] : false;
    $user_atts      = (isset($args['atts'])) ? $args['atts'] :[];
    $transport      = (isset($args['transport'])) ? $args['transport'] : 'postMessage';
    $devices        = (isset($args['devices'])) ? $args['devices'] : ['mobile'];

    // define default attributes
    $atts = range_atts('defaults');

    // first, merge defaults with user attributes
    foreach( $atts as $unit => $attributes ) {
        if( isset( $user_atts[$unit] ) ) {
            $atts[$unit] = wp_parse_args( $user_atts[$unit], $attributes );
        }
        // we allow passing in just a unit.
        // leave the default unit as is
        elseif( $unit !== $default ) {
            unset( $atts[$unit] );
        }
    }

    // set up control array
    $control_array = [
        'type'      => 'range',
        'label'     => $label,
        'section'   => $section,
        'atts'      => $atts,
        'devices'   => $devices
    ];

    foreach( $devices as $device ) {

        if( 'mobile' === $device ) {
            $setting_id = $id;
            $setting_enabled_id = "{$setting_id}--enable";
            $control_array['settings']['control'] = $id;
            $control_array['settings']['control_enable'] = $setting_enabled_id ;
        }
        else {
            $setting_id = "{$id}--{$device}";
            $setting_enabled_id = "{$setting_id}--enable";
            $control_array['settings']["control_{$device}"] = $setting_id;
            $control_array['settings']["control_{$device}_enable"] = $setting_enabled_id;
        }

        // calculate defaults
        if( is_array($default) ) {
            $setting_default = ( isset($default[$device]) ) ? $default[$device] : false;
        } else {
            $setting_default = $default;
        }

        // if disabled, disable control by default
        $enable_setting_default = ( 'disabled' === $setting_default ) ? 0 : 1;

        if( 'disabled' === $setting_default || !$setting_default ) {
            \reset($atts);
            $default_unit = \key($atts);
            $default_value = $atts[$default_unit]['default'];
            $setting_default = $default_value . $default_unit;
        }

        // create setting
        $wp_customize->add_setting( $setting_id, [
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => $transport,
            'default'   => $setting_default,
        ]);


        // create enabled/disabled setting
        $wp_customize->add_setting( $setting_enabled_id, [
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => $transport,
            'default'   => $enable_setting_default,
        ]);
    }

    // add priority to control array if set
    if( $priority && '' !== $priority ) {
        $control_array['priority'] = $priority;
    }

    // create the control
    $wp_customize->add_control( new Responsive_Control( $wp_customize, $id, $control_array ) );
}


/**
 * Create Responsive Select Control
 *
 * @since 1.2.0
 * @return void
 */
function select( $manager, $id, $args = [] ) {

    $default        = (isset($args['default'])) ? $args['default'] : false;
    $label          = (isset($args['label'])) ? $args['label'] : '';
    $section        = (isset($args['section'])) ? $args['section'] : '';
    $priority       = (isset($args['priority'])) ? $args['priority'] : false;
    $transport      = (isset($args['transport'])) ? $args['transport'] : 'postMessage';
    $devices        = (isset($args['devices'])) ? $args['devices'] : ['mobile'];
    $choices        = (isset($args['choices'])) ? $args['choices'] : [];
    $settings       = [];

    // loop through the devices
    foreach( $devices as $device ) {

        // add settings
        if( 'mobile' === $device ) {
            $setting_id = $id;
            $settings['control'] = $id;
        }
        else {
            $setting_id = "{$id}--{$device}";
            $settings["control_{$device}"] = $setting_id;
        }

        // calculate defaults
        if( is_array($default) ) {
            $setting_default = ( isset($default[$device]) ) ? $default[$device] : false;
        } else {
            $setting_default = $default;
        }

        // Create Setting
        $manager->add_setting( $setting_id, [
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => $transport,
            'default' => $setting_default
        ]);
    }

    // Create Control
    $manager->add_control( new Responsive_Control( $manager, $id, [
        'type' => 'select',
        'section' => $section,
        'label' => $label,
        'choices' => $choices,
        'settings' => $settings,
        'devices' => $devices
    ]));
}



/**
 * Create Responsive Radio Control
 *
 * @since 1.2.0
 * @return void
 */
function radio( $manager, $id, $args = [] ) {

    $default        = (isset($args['default'])) ? $args['default'] : false;
    $label          = (isset($args['label'])) ? $args['label'] : '';
    $section        = (isset($args['section'])) ? $args['section'] : '';
    $priority       = (isset($args['priority'])) ? $args['priority'] : false;
    $transport      = (isset($args['transport'])) ? $args['transport'] : 'postMessage';
    $devices        = (isset($args['devices'])) ? $args['devices'] : ['mobile'];
    $choices        = (isset($args['choices'])) ? $args['choices'] : [];
    $settings       = [];

    // loop through the devices
    foreach( $devices as $device ) {

        // add settings
        if( 'mobile' === $device ) {
            $setting_id = $id;
            $settings['control'] = $id;
        }
        else {
            $setting_id = "{$id}--{$device}";
            $settings["control_{$device}"] = $setting_id;
        }

        // calculate defaults
        if( is_array($default) ) {
            $setting_default = ( isset($default[$device]) ) ? $default[$device] : false;
        } else {
            $setting_default = $default;
        }

        // Create Setting
        $manager->add_setting( $setting_id, [
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => $transport,
            'default' => $setting_default
        ]);
    }

    // Create Control
    $manager->add_control( new Responsive_Control( $manager, $id, [
        'type' => 'radio',
        'section' => $section,
        'label' => $label,
        'choices' => $choices,
        'settings' => $settings,
        'devices' => $devices
    ]));
}


/**
 * Create Responsive Radio Control
 *
 * @since 1.2.0
 * @return void
 */
function checkbox( $manager, $id, $args = [] ) {

    $default        = (isset($args['default'])) ? $args['default'] : false;
    $label          = (isset($args['label'])) ? $args['label'] : '';
    $section        = (isset($args['section'])) ? $args['section'] : '';
    $priority       = (isset($args['priority'])) ? $args['priority'] : false;
    $transport      = (isset($args['transport'])) ? $args['transport'] : 'postMessage';
    $devices        = (isset($args['devices'])) ? $args['devices'] : ['mobile'];
    $settings       = [];


    // loop through the devices
    foreach( $devices as $device ) {

        // add settings
        if( 'mobile' === $device ) {
            $setting_id = $id;
            $settings['control'] = $id;
        }
        else {
            $setting_id = "{$id}--{$device}";
            $settings["control_{$device}"] = $setting_id;
        }

        // calculate defaults
        if( is_array($default) ) {
            $setting_default = ( isset($default[$device]) ) ? $default[$device] : false;
        } else {
            $setting_default = $default;
        }

        // Create Setting
        $manager->add_setting( $setting_id, [
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => $transport,
            'default' => $setting_default
        ]);
    }

    // Create Control
    $manager->add_control( new Responsive_Control( $manager, $id, [
        'type' => 'checkbox',
        'section' => $section,
        'label' => $label,
        'settings' => $settings,
        'devices' => $devices
    ]));
}
