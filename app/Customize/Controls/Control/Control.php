<?php
/**
 * Generic Control.
 *
 * This class handles an individual control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Controls\Control;

use Taproot\Customize\Traits\Standard;
use Taproot\Tools\Mod;

/**
 * Class for radio controls
 *
 * @since  2.0.0
 * @access public
 */
abstract class Control {

    use Standard;

    /**
     * Stores control type
     *
     * @since 2.0.0
     * @var string
     */
    public $type = 'text';

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
     * Register settings
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function settings($manager) {

        $manager->add_setting( $this->id, [
            'sanitize_callback' => $this->sanitize_callback,
            'transport'         => $this->transport,
            'default'           => Mod::fallback($this->id)
        ]);
    }

    /**
     * Register controls
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function controls($manager) {

        $manager->add_control( $this->id, [
            'type'      => $this->type,
            'section'   => $this->section,
            'settings'  => $this->id,
            'priority'  => $this->priority,
            'label'     => $this->label,
        ]);
    }
}
