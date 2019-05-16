<?php
/**
 * Screen class.
 *
 * This class creates a screen object.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Screens;

use Rootstrap\Contracts\Screen as Contract;


/**
 * Creates a new object screen.
 *
 * @since  1.0.0
 * @access public
 */
class Screen implements Contract {


    /**
     * Screen name.
     *
     * @since  1.0.0
     * @access private
     * @var    string
     */
    private $name = '';

    /**
     * Min screen width.
     *
     * @since  1.0.0
     * @access private
     * @var    string
     */
    private $min = false;

    /**
     * Max screen width.
     *
     * @since  1.0.0
     * @access private
     * @var    string
     */
    private $max = false;


    /**
     * Register a new screen object.
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

