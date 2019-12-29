<?php
/**
 * Additional methods for standard controls.
 *
 * This trait contains common methods for our control classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Controls\Traits;

/**
 * Class for checkbox controls
 *
 * @since  2.0.0
 * @access public
 */
trait Standard {

    use Base;

    /**
     * Customize Preview Controls Refresh
     *
     * These controls will trigger a refresh of the styleblock
     * in the customize preview.
     *
     * @since  2.0.0
     * @access public
     * @param  array - $controls
     * @return array
     */
    public function previewRefresh($controls) {
        $controls[] = $this->id;
        return $controls;
    }

    /**
     * Defaults
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function defaults($defaults) {
        $defaults->add( $this->id, $this->default );
    }
}
