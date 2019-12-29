<?php
/**
 * Range Control.
 *
 * This class handles an individual range control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Controls\Range;

use Taproot\Customize\Controls\Traits\Responsive;
use Taproot\Tools\Mod;

/**
 * Class for range controls
 *
 * @since  2.0.0
 * @access public
 */
abstract class Range {

    use Responsive;

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $id = '';

    /**
     * Stores control name
     *
     * @since 2.0.0
     * @var string
     */
    public $name = '';

    /**
     * Stores transport method
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'postMessage';

    /**
     * Stores sanitize callback
     *
     * @since 2.0.0
     * @var string
     */
    public $sanitize_callback = 'sanitize_text_field';

    /**
     * Stores priority
     *
     * @since 2.0.0
     * @var integer
     */
    public $priority = 10;

    /**
     * Stores previewRefresh
     *
     * @since 2.0.0
     * @var bool
     */
    public $previewRefresh = TRUE;

    /**
     * Stores default value
     *
     * @since 2.0.0
     * @var mixed
     */
    public $default = 'disabled';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = '';

    /**
     * Stores settings
     *
     * @since 2.0.0
     * @var array
     */
    public $settings = [];

    /**
     * Stores attribute defaults
     *
     * @since 2.0.0
     * @var array
     */
    public $default_atts = [
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
        ]
    ];

    /**
     * Stores attributes
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [];

    /**
     * Stores devices
     *
     * @since 2.0.0
     * @var array
     */
    public $devices = ['mobile'];

    /**
     * Control Setup
     *
     * @return void
     */
    public function setup() {

        // Add setting for each device
        foreach( $this->devices as $device ) {

            if( 'mobile' === $device ) {
                $this->settings['control'] = $this->id;
                $this->settings['control_enable'] = "{$this->id}--enable";
            }
            else {
                $this->settings["control_{$device}"] = "{$this->id}--{$device}";
                $this->settings["control_{$device}_enable"] = "{$this->id}--{$device}--enable";
            }
        }
    }

    /**
     * Defaults
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function defaults($defaults) {

        foreach( $this->devices as $device ) {

            // Handle default value
            if( is_array($this->default) ) {
                $default = ( isset($this->default[$device]) ) ? $this->default[$device] : false;
            } else {
                $default = $this->default;
            }

            // if disabled, disable control by default
            $enable_setting_default = ( 'disabled' === $default ) ? 0 : 1;

            if( 'disabled' === $default || ! $default ) {
                $atts = $this->atts();
                \reset($atts);
                $default_unit = \key($atts);
                $default_value = $atts[$default_unit]['default'];
                $default = $default_value . $default_unit;
            }

            // If no default, skip to the next device
            if( ! $default ) continue;

            // If mobile, just use the control name
            if( 'mobile' === $device ) {
                $defaults->add( $this->id, $default );
                $defaults->add( "{$this->id}--enable", $enable_setting_default );
            }
            // Otherwise, append the device to the name
            else {
                $defaults->add( "{$this->id}--{$device}", $default );
                $defaults->add( "{$this->id}--{$device}--enable", $enable_setting_default );
            }
        }
    }

    /**
     * Register settings
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function settings($manager) {

        foreach($this->settings as $setting => $setting_id) {
            $manager->add_setting( $setting_id, [
                'sanitize_callback' => $this->sanitize_callback,
                'transport'         => $this->transport,
                'default'           => Mod::fallback($setting_id)
            ]);
        }
    }

    /**
     * Register controls
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function controls($manager) {

        $manager->add_control( new Control( $manager, $this->id, [
            'section'   => $this->section,
            'settings'  => $this->settings,
            'priority'  => $this->priority,
            'devices'   => $this->devices,
            'atts'      => $this->atts(),
            'label'     => esc_html__($this->label, 'taproot')
        ]));
    }

    /**
     * Get sanitized atts
     *
     * @since  2.0.0
     * @access public
     * @return array
     */
    public function atts() {

        // define default attributes
        $atts = $this->default_atts;

        // first, merge defaults with user attributes
        foreach( $atts as $unit => $attributes ) {
            if( isset( $this->atts[$unit] ) ) {
                $atts[$unit] = wp_parse_args( $this->atts[$unit], $attributes );
            }
            // we allow passing in just a unit.
            // leave the default unit as is
            elseif( $unit !== $this->default ) {
                unset( $atts[$unit] );
            }
        }

        return $atts;
    }
}
