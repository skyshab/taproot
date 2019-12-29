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

namespace Taproot\Components\Post_Types\Customize\Archive_Entry\Link;

use Taproot\Customize\Controls\Select\Select;/**
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
    public $label = 'Link Type';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'link';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'none'      => esc_html__('None', 'taproot'),
            'inline'    => esc_html__('Inline', 'taproot'),
            'link'      => esc_html__('Link', 'taproot'),
            'button'    => esc_html__('Button', 'taproot'),
        ];
    }
}
