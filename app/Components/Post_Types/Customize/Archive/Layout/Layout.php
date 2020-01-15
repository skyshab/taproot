<?php
/**
 * Layout.
 *
 * This class handles the customizer control for the post type layout.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Types\Customize\Archive\Layout;

use Taproot\Customize\Controls\Select\Select;/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Layout extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'layout';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Layout';

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
            'right' => esc_html__( 'Right Sidebar', 'taproot' ),
            'left'  => esc_html__( 'Left Sidebar', 'taproot' ),
            'full'  => esc_html__( 'Full Width', 'taproot' ),
        ];
    }
}
