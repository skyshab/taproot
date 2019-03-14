<?php
/**
 * Customize Default class.
 *
 * This class stores a default customizer value. 
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Customize_Defaults;

use Rootstrap\Contracts\Customize_Default as Contract;


/**
 * Creates a new customizer defaulr object.
 *
 * @since  1.0.0
 * @access public
 */
class Customize_Default implements Contract {


    /**
     * Customize control id. 
     *
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $id;

    /**
     * Customize control default value. 
     *
     * @since  1.0.0
     * @access protected
     * @var    array
     */
    protected $value;
    

    /**
     * Register a new customize control default.
     * 
     * If a single value is passed in, treat it as the default value.
     * An array can also be passed in with the default value and an additional
     * attribute for controlling whether the default value renders in get_theme_mod()
     *
     * @since  1.0.0
     * @access public
     * @param  string  $id
     * @param  mixed   $value
     * @return void
     */
    public function __construct( $id = false, $value = false ) {

        // If no id, then what are we even doing here?
        if( !$id || !$value ) return false; 

        // if value is not set, bail
        if( is_bool($value) && ! $value ) return false; 

        // Ok this is for real. store the ID
        $this->id = $id;

        // store the value
        $this->value = $value;
    }


    /**
     * Returns the customize control id.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function id() {
        return $this->id;
    }


    /**
     * Returns customize control default value.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function value() {
        return $this->value;
    }


    /**
     * Magic method to use in case someone tries to output the object as
     * a string. Just return the default value.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function __toString() {
        return $this->value();
    }

}
