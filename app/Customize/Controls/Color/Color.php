<?php
/**
 * Taproot class.
 *
 * This class handles the Taproot config data and sets up
 * the individual modules that make up Taproot.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Controls\Color;

use Taproot\Customize\Controls\Traits\Standard;
use Taproot\Tools\Mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
abstract class Color {

    use Standard;

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $id = '';

    /**
     * Stores control name
     *
     * @since 2.0.0
     * @var string
     */
    public $name = '';

    /**
     * Stores previewRefresh
     *
     * @since 2.0.0
     * @var bool
     */
    public $previewRefresh = TRUE;

    /**
     * Stores default value
     *
     * @since 2.0.0
     * @var string
     */
    public $default;

    /**
     * Stores priority
     *
     * @since 2.0.0
     * @var integer
     */
    public $priority = 10;

    /**
     * Stores transport method
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'postMessage';

    /**
     * Hide alpha
     *
     * @since 2.0.0
     * @var string
     */
    public $hide_alpha = FALSE;

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = '';

    /**
     * Register settings
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function settings($manager) {

        $manager->add_setting( $this->id, [
            'sanitize_callback' => [$this, 'sanitize'],
            'transport'         => $this->transport,
            'default'           => Mod::fallback($this->id)
        ]);
    }

    /**
     * Register controls
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function controls($manager) {

        $manager->add_control( new Control( $manager, $this->id, [
            'section'       => $this->section,
            'settings'      => $this->id,
            'priority'      => $this->priority,
            'hide_alpha'    => $this->hide_alpha,
            'label'         => esc_html__($this->label, 'taproot'),
        ]));
    }

    /**
     * Sanitize value
     *
     * @since 2.0.0
     *
     * @param string $color
     * @return mixed
     */
    public function sanitize( $color ) {

        // Trim whitespace
        $color = str_replace( ' ', '', $color );

        // Hex
        if( 1 === preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
            return $color;

        // RGB
        elseif( 'rgb(' === substr( $color, 0, 4 ) ) {

            sscanf( $color, 'rgb(%d,%d,%d)', $red, $green, $blue );

            if( ( $red >= 0 && $red <= 255 ) &&
                ( $green >= 0 && $green <= 255 ) &&
                ( $blue >= 0 && $blue <= 255 )
            ){
                return "rgb({$red},{$green},{$blue})";
            }
        }

        // RGBA
        elseif( 'rgba(' === substr( $color, 0, 5 ) ) {

            sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

            if( ( $red >= 0 && $red <= 255 ) &&
                ( $green >= 0 && $green <= 255 ) &&
                ( $blue >= 0 && $blue <= 255 ) &&
                ( $alpha >= 0 ) &&
                ( $alpha <= 1 )
            ) {
                return "rgba({$red},{$green},{$blue},{$alpha})";
            }
        }

        // nothing matched
        return '';
    }
}
