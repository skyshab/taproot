<?php
/**
 * Device class.
 *
 * This class creates a device object.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Devices;

use Rootstrap\Contracts\Device as Contract;


/**
 * Creates a new object device.
 *
 * @since  1.0.0
 * @access public
 */
class Device implements Contract {


    /**
     * Screen name.
     *
     * @since  1.0.0
     * @access private
     * @var    string
     */
    public $name = '';

    /**
     * Min screen width.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $min = false;

    /**
     * Max screen width.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $max = false;

    /**
     * Device Icon
     *
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    public $icon = false;

    /**
     * Device Icon
     *
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    public $preview_width = false;

    /**
     * Device Icon
     *
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    public $preview_height = false;


    /**
     * Register a new device object.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $name
     * @param  array   $args
     * @return void
     */
    public function __construct( $name = false, array $args = [] ) {
        if( ! $name ) return false;
        $this->name = $name;
        foreach( $args as $property => $value ) {
            if( property_exists( $this, $property ) )
                $this->$property = $value;
        }
    }


    /**
     * Returns the screen name.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function name() {
        return $this->name;
    }


    /**
     * Returns the screen min width.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function min() {
        return $this->min;
    }


    /**
     * Returns the screen max width.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function max() {
        return $this->max;
    }


    /**
     * Returns the device icon markup.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function icon() {
        return $this->icon;
    }


    /**
     * Returns the device icon markup.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function preview_width() {
        return $this->preview_width;
    }


    /**
     * Returns the device icon markup.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function preview_height() {
        return $this->preview_height;
    }


    /**
     * Magic method to use in case someone tries to output the object as a
     * string. We'll just return the name.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function __toString() {
        return $this->name();
    }

}
