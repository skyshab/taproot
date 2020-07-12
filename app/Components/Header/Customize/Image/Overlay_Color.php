<?php
/**
 * Header Image Overlay Color.
 *
 * This class handles the customizer control for the header image overaly color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Image;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Overlay_Color extends Color {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'overlay-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Header Image Overlay Color';

    /**
     * Hide alpha channel
     *
     * @since 2.0.0
     * @var bool
     */
    public $hide_alpha = TRUE;

    /**
     * Enable default
     *
     * @since 2.0.0
     * @var bool
     */
    public $default = TRUE;

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
                'selector'            => '.app-header--has-overlay--default #header-image-overlay',
                'render_callback'     => 'Taproot\Components\Header\Template::get_header_image_overlay',
                'container_inclusive' => true,
                'fallback_refresh'    => false
            ]);
        }
    }

    /**
     * Defaults
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function defaults( $defaults ) {

        $defaults->add( $this->id, function() {
            return Mod::get( 'colors--accent' );
        });
    }
}
