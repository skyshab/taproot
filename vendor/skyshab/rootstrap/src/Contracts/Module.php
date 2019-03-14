<?php
/**
 * Module interface.
 *
 * Defines the interface that Module class must use.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Contracts;


/**
 * Module interface.
 *
 * @since  1.0.0
 * @access public
 */
interface Module {

    
    /**
     * Returns the module name.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function name();


    /**
     * Returns the namespace.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function get_namespace();      


    /**
     * Returns the includes.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function includes();


    /**
     * Returns the instances.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function instances();


    /**
     * Returns the boot files.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function boot();

}
