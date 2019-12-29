<?php
/**
 * Fixed header type
 *
 * This class handles the customizer control for the fixed header type.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Styles_Fixed;

use Taproot\Customize\Controls\Select\Select;/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Fixed_Type extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'fixed-type';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Fixed Header Type';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'fade';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'fade'      => esc_html__('Fade In', 'taproot'),
            'slide'     => esc_html__('Slide In', 'taproot'),
            'sticky'    => esc_html__('Sticky', 'taproot')
        ];
    }
}
