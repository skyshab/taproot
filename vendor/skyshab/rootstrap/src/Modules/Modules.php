<?php
/**
 * Modules.
 *
 * This class is a wrapper around the `Collection` class for modules 
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules;

use Rootstrap\Abstracts\Collection;


/**
 * Module collection class.
 *
 * @since  1.0.0
 * @access public
 */
class Modules extends Collection {


    /**
     * Add a new module.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $name
     * @param  mixed   $value
     * @return void
     */
     public function add( $name, $components ) {
        parent::add( $name, new Module( $name, $components ) );
    }   

}
