<?php
/**
 * Module class.
 *
 * This class creates a module object.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules;

use Rootstrap\Contracts\Module as Contract;


/**
 * Creates a new object module.
 *
 * @since  1.0.0
 * @access public
 */
class Module implements Contract {


    /**
     * Module name.
     *
     * @since  1.0.0
     * @access protected
     * @var    string
     */
    protected $name = '';

    /**
     * namespace
     * 
     * @since 1.0.0
     * @access protected
     * @var      string
     */
    protected $namespace = false;

    /**
     * Includes
     * 
     * @since 1.0.0
     * @access protected
     * @var      string
     */
    protected $includes = false;

    /**
     * Instances
     * 
     * @since 1.0.0
     * @access protected
     * @var      array
     */
    protected $instances = array();    
            
    /**
     * Boots
     * 
     * @since 1.0.0
     * @access protected
     * @var      string
     */
    protected $boot = false;


    /**
     * Register a new module object.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $name
     * @param  array   $args
     * @return void
     */
    public function __construct( $name = false, array $components = [] ) {

        if( ! $name ) return false;

        $this->name = $name;
        $this->namespace = "Rootstrap\Modules\\" .  $this->name;
                
        if( !isset( $components ) ) return;

        $this->includes = ( isset( $components['includes'] ) ) ? $components['includes'] : false;
        $this->instances = ( isset( $components['instances'] ) ) ? $components['instances'] : false;                
        $this->boot = ( isset( $components['boot'] ) ) ? $components['boot'] : false;
    }


    /**
     * Returns the module name.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function name() {
        return $this->name;
    }


    /**
     * Returns the namespace.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function get_namespace() {
        return $this->namespace;
    }  


    /**
     * Returns the instance names.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function instances() {
        return $this->instances;
    }


    /**
     * Returns the includes.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function includes() {
        return $this->includes;
    }
    
    
    /**
     * Returns the boot files.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function boot() {
        return $this->boot;
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
