<?php
/**
 * Section.
 *
 * This class handles functionality for a customizer section.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Background\Customize\Background;

use Taproot\Customize\Abstracts\Section as SectionAbstract;

/**
 * Extend the Customize Section class
 *
 * @since  2.0.0
 * @access public
 */
class Section extends SectionAbstract {

    /**
     * Section namespace
     *
     * @since 2.0.0
     * @var int
     */
    public $namespace = __NAMESPACE__;

    /**
     * Section ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'background';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Background';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = ['Background_Color'];

    /**
     * Customize mods
     *
     * @since 2.0.0
     * @param object $manager
     * @return void
     */
    public function customize_register_after( $manager ) {

        // move background control to our custom section
        if( $manager->get_control( 'background_image' ) ) {
            $manager->get_control( 'background_image' )->section = $this->id;
            $manager->get_control( 'background_image' )->priority = 500;
        }

        // move background control to our custom section
        if( $manager->get_control( 'background_color' ) ) {
            $manager->get_control( 'background_color' )->active_callback = '__return_false';
        }

        // move background control to our custom section
        if( $manager->get_control( 'background_preset' ) ) {
            $manager->get_control( 'background_preset' )->section = $this->id;
            $manager->get_control( 'background_preset' )->priority = 510;
        }

        // move background control to our custom section
        if( $manager->get_control( 'background_position' ) ) {
            $manager->get_control( 'background_position' )->section = $this->id;
            $manager->get_control( 'background_position' )->priority = 520;
        }

        // move background control to our custom section
        if( $manager->get_control( 'background_size' ) ) {
            $manager->get_control( 'background_size' )->section = $this->id;
            $manager->get_control( 'background_size' )->priority = 530;
        }

        // move background control to our custom section
        if( $manager->get_control( 'background_repeat' ) ) {
            $manager->get_control( 'background_repeat' )->section = $this->id;
            $manager->get_control( 'background_repeat' )->priority = 540;
        }

        // move background control to our custom section
        if( $manager->get_control( 'background_attachment' ) ) {
            $manager->get_control( 'background_attachment' )->section = $this->id;
            $manager->get_control( 'background_attachment' )->priority = 550;
        }
    }
}
