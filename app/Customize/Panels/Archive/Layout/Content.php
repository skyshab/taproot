<?php
/**
 * Content Layout
 *
 * This class handles the customizer control for the post type content layout.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Panels\Archive\Layout;

use Taproot\Customize\Controls\Select\Select;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Content extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'content-layout';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Content Layout';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'center';

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
            'wide'  => esc_html__( 'Wide', 'taproot' ),
            'left' => esc_html__( 'Left', 'taproot' ),
            'center'  => esc_html__( 'Center', 'taproot' ),
        ];
    }
}
