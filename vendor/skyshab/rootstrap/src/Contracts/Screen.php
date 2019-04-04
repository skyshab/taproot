<?php
/**
 * Screen interface.
 *
 * Defines the interface that Screen class must use.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Contracts;


/**
 * Screen interface.
 *
 * @since  1.0.0
 * @access public
 */
interface Screen {

    /**
     * Returns the screen name.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function name();

    /**
     * Returns the screen min width.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function min();

    /**
     * Returns the screen max width.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function max();

}
