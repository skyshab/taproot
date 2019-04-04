<?php
/**
 * Var class.
 *
 * This class creates a screen object.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Styles;

use Rootstrap\Contracts\CSS_Var as Contract;


/**
 * Creates a new object var.
 *
 * @since  1.0.0
 * @access public
 */
class CSS_Var implements Contract {


    /**
     * Variable Name
     *
     * @since  1.0.0
     * @access protected
     * @var    array
     */
    protected $name;

    /**
     * Variable value
     *
     * @since  1.0.0
     * @access protected
     * @var    array
     */
    protected $value;

    /**
     * Screen for this variable.
     *
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $screen;

    /**
     * Callback for styleblock.
     *
     * @since  1.0.0
     * @access protected
     * @var    bool 
     */
    protected $callback;


    /**
     * Register a new style object.
     *
     * @since  1.0.0
     * @access public
     * @param  array   $args
     * @return void
     */
    public function __construct( $args = [] ) {

        $this->name = ( isset( $args['name'] ) ) ? $args['name'] : false;
        $this->selector = ( isset( $args['selector'] ) ) ? $args['selector'] : false;
        $this->value = ( isset( $args['value'] ) ) ? $args['value'] : false;
        $this->screen = ( isset( $args['screen'] ) ) ? $args['screen'] : 'default';
        $this->callback = ( isset( $args['callback'] ) && '' !==  $args['callback'] ) ? $args['callback'] : true;

        if( !$this->name || !$this->value ) return false;
    }


    /**
     * Returns the screen name.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function screen() {

        return $this->screen;
    }


    /**
     * Does this var have a selector?
     *
     * @since  1.0.0
     * @access public
     * @return boolean
     */
    public function has_selector() {
        return ( $this->selector && '' !== $this->selector ) ? true : false;
    }

    
    /**
     * Assemble styles and return string
     *
     * @since 1.0.0   
     * @return string
     */
    public function get() {

        if( !$this->callback || !$this->name || !$this->value ) return '';

        if( $this->has_selector() ) {
            return sprintf( '%s{--%s: %s;}', $this->selector, $this->name, $this->value );
        }

        return sprintf( '--%s: %s;', $this->name, $this->value );
    }


    /**
     * Magic method to use in case someone tries to output the object as a
     * string. We'll just return the styles.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function __toString() {
        return $this->get();
    }    

}
