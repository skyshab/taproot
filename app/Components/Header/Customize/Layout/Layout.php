<?php
/**
 * Header Layout
 *
 * This class handles the customize control for choosing the header layout.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Layout;

use Taproot\Customize\Controls\Radio\Radio;

/**
 * Class for radio control
 *
 * @since  2.0.0
 * @access public
 */
class Layout extends Radio {

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'header--layout';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Branding Layout';

    /**
     * Devices
     *
     * @since 2.0.0
     * @var array
     */
    public $devices = ['mobile', 'tablet', 'desktop'];

    /**
     * Default
     *
     * @since 2.0.0
     * @var array
     */
    public $default = 'horizontal';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'vertical'      => esc_html__( 'Vertical', 'taproot' ),
            'horizontal'    => esc_html__( 'Horizontal', 'taproot' ),
        ];
    }
}
