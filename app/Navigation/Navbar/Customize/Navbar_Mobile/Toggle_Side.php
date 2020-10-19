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

namespace Taproot\Navigation\Navbar\Customize\Navbar_Mobile;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Tools\Mod;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Toggle_Side extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'toggle-side';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Mobile Toggle Side';

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
    public $default = 'right';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'left'  => esc_html__( 'Left', 'taproot' ),
            'right' => esc_html__( 'Right', 'taproot' ),
        ];
    }
}
