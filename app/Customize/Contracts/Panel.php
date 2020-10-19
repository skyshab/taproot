<?php
/**
 * Panel interface.
 *
 * This class is used to add a new panel to the Customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Contracts;

/**
 * Interface that handles customizer panels.
 *
 * @since  2.0.0
 * @access public
 */
interface Panel {

    /**
     * Register customizer panels
     *
     * @since  2.0.0
     * @access public
     * @param object $manager
     * @return void
     */
    public function panels( $manager );
}
