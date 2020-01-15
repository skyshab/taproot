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

namespace Taproot\Components\Navigation_Top\Customize\Top_Mobile;

use Taproot\Customize\Controls\Select\Select;/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Breakpoint extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'breakpoint';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Mobile Menu Breakpoint';

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
    public $default = 'mobile';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {

        return [
            'never'             => esc_html__( 'Never Mobile', 'taproot' ),
            'mobile'            => esc_html__( 'Mobile Only', 'taproot' ),
            'tablet-and-under'  => esc_html__( 'Tablet and under', 'taproot' ),
        ];
    }
}
