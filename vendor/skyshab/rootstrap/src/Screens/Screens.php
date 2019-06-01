<?php
/**
 * Screens manager.
 *
 * This class is just a wrapper around the `Collection` class for adding
 * a new screen.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Screens;

use Rootstrap\Abstracts\Collection;


/**
 * Screen collection class.
 *
 * @since  1.0.0
 * @access public
 */
class Screens extends Collection {


    /**
     * Add a new screen.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $name
     * @param  mixed   $value
     * @return void
     */
     public function add( $name, $value ) {
        parent::add( $name, new Screen( $name, $value ) );
    }

}
