<?php
/**
 * Select Control.
 *
 * This class handles an instance of the select customizer control.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Header\Customize\Header_Mobile;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Tools\Mod;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Type extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'type';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Mobile Menu Type';

    /**
     * Transport
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'refresh';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'slide';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'dropdown-slide'    => esc_html__( 'Dropdown - Slide', 'taproot' ),
            'dropdown-fade'     => esc_html__( 'Dropdown - Fade', 'taproot' ),
            'slide'             => esc_html__( 'Slide In', 'taproot' ),
            'fullscreen'        => esc_html__( 'Fullscreen', 'taproot' ),
        ];
    }
}
