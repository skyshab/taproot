<?php
/**
 * Cart nav widget.
 *
 * This class handles the customizer control for cart nav widget.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Post_Types\Product\Customize;

use Taproot\Customize\Controls\Multicheck\Multicheck;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Menu_Location extends Multicheck {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'menu-location';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Add Cart Widget To Menu';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'header';

    /**
     * Transport
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'refresh';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {

        return [
            'top'       => esc_html__( 'Top', 'taproot' ),
            'header'    => esc_html__( 'Header', 'taproot' ),
            'navbar'    => esc_html__( 'Navbar', 'taproot' ),
        ];
    }
}
