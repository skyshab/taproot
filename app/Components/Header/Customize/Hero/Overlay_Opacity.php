<?php
/**
 * Hero Overlay Opacity.
 *
 * This class handles the customizer control for the hero overlay opacity.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Hero;

use Taproot\Customize\Controls\Range\Range;
/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Overlay_Opacity extends Range {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'overlay-opacity';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Overlay Opacity';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var mixed
     */
    public $default = '50%';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        '%' => [
            'min' => 0,
            'max' => 100,
            'default' => 50,
            'step' => 10
        ]
    ];

    /**
     * Partials
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function partials($manager) {

        if ( isset( $manager->selective_refresh ) ) {

            $manager->selective_refresh->add_partial( $this->id, [
                'selector'            => '#taproot-overlay',
                'render_callback'     => 'Taproot\Components\Header\Template::get_overlay',
                'container_inclusive' => true,
                'fallback_refresh'    => false
            ]);
        }
    }
}
