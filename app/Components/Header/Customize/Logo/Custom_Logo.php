<?php
/**
 * Custom Logo.
 *
 * This class handles the default WordPress Custom Logo Image control.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Logo;

use Taproot\Customize\Controls\Control\Control;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Custom_Logo extends Control {

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'custom_logo';

    /**
     * Register controls
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function controls($manager) {

        // Move the logo image control to our custom section
        if( $manager->get_control( $this->id ) ) {
            $manager->get_control( $this->id )->section = $this->section;
        }
    }

    /**
     * Register settings
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function settings($manager) {}

}
