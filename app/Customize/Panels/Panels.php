<?php
/**
 * Panels
 *
 * This class extends the `Collection` class for handling panels. 
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2018, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Panels;

use Rootstrap\Abstracts\Collection;


/**
 * Panel collection class.
 *
 * @since  1.0.0
 * @access public
 */
class Panels extends Collection {


    /**
     * Add a new screen.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $name
     * @param  array   $args
     * @return void
     */
     public function add( $name, $args = [] ) {
        parent::add( $name, new Panel( $name, $args ) );
    }

}
