<?php
/**
 * Select Abstract
 *
 * This class handles an individual select control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Controls\Select;

use Taproot\Customize\Traits\Responsive;
use Taproot\Tools\Mod;

/**
 * Class for checkbox controls
 *
 * @since  2.0.0
 * @access public
 */
abstract class Select {

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
     * Stores sanitization callback
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
     * Stores Choices
     *
     * @since 2.0.0
     * @var array
     */
    public $choices = [];

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

        if( ! method_exists($this, 'get_choices') || ! $this->get_choices() ) {
            return;
        }

        $manager->add_control( new Control( $manager, $this->id, [
            'type'      => 'select',
            'section'   => $this->section,
            'settings'  => $this->settings,
            'label'     => $this->label,
            'priority'  => $this->priority,
            'devices'   => $this->devices,
            'choices'   => $this->get_choices()
        ]));
    }
}
