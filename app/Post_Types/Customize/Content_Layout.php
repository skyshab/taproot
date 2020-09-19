<?php
/**
 * Entry Content Layout
 *
 * This class handles the customizer control for the post type entry content layout.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Post_Types\Customize;

use Taproot\Customize\Controls\Select\Select;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Content_Layout extends Select {

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
    public $default = 'wide';

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
            'left' => esc_html__( 'Left', 'taproot' ),
            'center'  => esc_html__( 'Center', 'taproot' ),
            'wide'  => esc_html__( 'Wide', 'taproot' ),
            'wide-left'  => esc_html__( 'Wide/Left', 'taproot' ),
            'wide-center'  => esc_html__( 'Wide/Center', 'taproot' ),
        ];
    }
}
