<?php
/**
 * Footer Template Tags.
 *
 * This class contains helper functions for use in footer templates and settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Footer;

use Taproot\Tools\Mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Output Footer Credits
     *
     * We need to run this through kses filter with allwoances for certain html and shortcodes
     *
     * @since 2.0.0
     * @return string
     */
    public static function footer_credits() {

        // define allowed html
        $allowed = [
            'a' => [
                'href' => [],
                'title' => [],
                'class' => []
            ],
            'br' => [],
            'em' => [],
            'strong' => [],
            'i' => [
                'class' => []
            ]
        ];

        echo wp_kses( Mod::get( 'footer--bottom-bar--content'), $allowed );
    }
}
