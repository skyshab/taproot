<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Postnav;

use function Taproot\Tools\post_type_mod;

/**
 * Functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Use round pagination elements?
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_postnav() {
        return post_type_mod( 'postnav--enable' );
    }
}
