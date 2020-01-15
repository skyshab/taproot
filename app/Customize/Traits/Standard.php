<?php
/**
 * Additional methods for standard controls.
 *
 * This trait contains common methods for our control classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Traits;

/**
 * Class for checkbox controls
 *
 * @since  2.0.0
 * @access public
 */
trait Standard {

    use Base;

    /**
     * Defaults
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function defaults( $defaults ) {
        $defaults->add( $this->id, $this->default );
    }
}
