<?php
/**
 * Abstract class for module singletons
 *
 * This class is used to create a singleton class with 
 * a boot method used to add actions.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Abstracts;


/**
 * Creates a new singleton class.
 *
 * @since  1.0.0
 * @access public
 */
abstract class Bootable {


    /**
     * Store instances
     *
     * @var Bootable
     */
    private static $_instances = [];

    /**
     * Constructor
     *
     * @return void
     */
    protected function __construct() {}


    /**
     * Get instance
     *
     * @return Class
     */
    public static function instance() {

        $class = get_called_class();

        if ( !isset( self::$_instances[$class] ) ) {
            self::$_instances[$class] = new $class();
        }
        return self::$_instances[$class];
    }


    /**
     * Register actions
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    abstract public function boot();

}
