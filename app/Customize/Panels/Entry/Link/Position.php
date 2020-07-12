<?php
/**
 * Fixed header type
 *
 * This class handles the customizer control for the fixed header type.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Panels\Entry\Link;

use Taproot\Customize\Controls\Select\Select;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Position extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'position';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Link Position';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'right';

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
            'right' => esc_html__('Right', 'taproot'),
            'left'  => esc_html__('Left', 'taproot'),
        ];
    }
}
