<?php
/**
 * Checkbox Control.
 *
 * This class handles an individual checkbox control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Controls\Checkbox;

use Taproot\Customize\Controls\Traits\Responsive;
use Taproot\Tools\Mod;

/**
 * Class for checkbox controls
 *
 * @since  2.0.0
 * @access public
 */
abstract class Checkbox {

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
    public $transport = 'refresh';

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
     * @var bool
     */
    public $default = false;

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
     * Stores devices
     *
     * @since 2.0.0
     * @var array
     */
    public $devices = ['mobile'];

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
                'sanitize_callback' => [$this, 'sanitize'],
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
            'label'     => esc_html__($this->label, 'taproot')
        ]));
    }

    /**
     * Sanitize value
     *
     * @since 2.0.0
     *
     * @param string $input
     * @return mixed
     */
    public function sanitize( $input ){
        return ( $input == 1 ) ? 1 : '';
    }
}
