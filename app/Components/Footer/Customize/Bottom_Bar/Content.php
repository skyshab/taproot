<?php
/**
 * Footer bottom bar content.
 *
 * This class handles the customizer control for the footer bottom bar content.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Footer\Customize\Bottom_Bar;

use Taproot\Customize\Controls\Control\Control;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Content extends Control {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'content';

    /**
     * Control type
     *
     * @since 2.0.0
     * @var string
     */
    public $type = 'textarea';

    /**
     * Sanitization callback
     *
     * @since 2.0.0
     * @var string
     */
    public $sanitize_callback = 'wp_kses_post';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'Created with Taproot';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Bottom Bar Content';

    /**
     * Transport method
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'postMessage';

    /**
     * Partials
     *
     * @since  2.0.0
     * @access public
     * @param  array - $manager
     * @return void
     */
    public function partials($manager) {

        if( isset( $manager->selective_refresh ) ) {
            $manager->selective_refresh->add_partial( $this->id, [
                'selector' => '.bottom-bar__container',
                'container_inclusive' => false,
                'render_callback' => 'Taproot\Components\Footer\Functions::footer_credits',
            ]);
        }
    }
}
