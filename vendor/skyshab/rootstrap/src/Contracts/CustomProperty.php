<?php
/**
 * Style interface.
 *
 * Defines the interface that Style class must use.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Contracts;


/**
 * Style interface.
 *
 * @since  1.0.0
 * @access public
 */
interface CustomProperty {


    /**
     * Returns the screen name.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function screen();

    /**
     * Returns the styleblock.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function get();

}
