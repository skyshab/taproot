<?php
/**
 * Font Styles Abstract.
 *
 * This class handles an individual font styles control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Controls\Font_Styles;

use Taproot\Customize\Traits\Standard;
use Taproot\Tools\Mod;

/**
 * Class for font styles
 *
 * @since  2.0.0
 * @access public
 */
abstract class Font_Styles {

    use Standard;

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
    public $sanitize = 'sanitize_text_field';

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
     * Register settings
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function settings($manager) {

        $manager->add_setting( $this->id, [
            'sanitize_callback' => $this->sanitize,
            'transport'         => $this->transport,
            'default'           => Mod::fallback( $this->id )
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

        $manager->add_control( new Control( $manager, $this->id, [
            'section'   => $this->section,
            'settings'  => $this->id,
            'priority'  => $this->priority,
            'label'     => $this->label
        ]));
    }
}
