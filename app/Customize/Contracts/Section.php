<?php
/**
 * Section interface.
 *
 * This class is used to to add a new section to the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Contracts;

/**
 * Creates a new Section interface.
 *
 * @since  2.0.0
 * @access public
 */
interface Section {

    /**
     * Registers customizer sections.
     *
     * @since  2.0.0
     * @access public
     * @param object $manager
     * @return void
     */
    public function sections( $manager );

    /**
     * Get an array of control instances.
     *
     * @since  2.0.0
     * @access public
     * @return array
     */
    public function controls();
}
