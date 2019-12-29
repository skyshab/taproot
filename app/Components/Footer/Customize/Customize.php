<?php
/**
 * Footer Panel
 *
 * This class is used to manage the footer panel and add its sections
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Footer\Customize;

use Taproot\Customize\Abstracts\Component as CustomizeComponent;

/**
 * Extend CustomizeComponent class
 *
 * @since  2.0.0
 * @access public
 */
class Customize extends CustomizeComponent {

    /**
     * Namespace
     *
     * @since 2.0.0
     * @var string
     */
    public $namespace = __NAMESPACE__;

    /**
     * Panel id
     *
     * @since 2.0.0
     * @var array
     */
    public $panel = 'footer';

    /**
     * Sections to load
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [
        'Footer',
        'Widgets',
        'Bottom_Bar'
    ];

    /**
     * Register panels
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels($manager) {

        $manager->add_panel( $this->panel, [
            'title' => __( 'Footer', 'taproot' ),
            'priority' => 40,
        ]);

        // make footer sidebars appear in the customizer last
        if( $manager->get_section( 'sidebar-widgets-footer-1' ) ) {
            $manager->get_section( 'sidebar-widgets-footer-1' )->priority = 500;
        }

        if( $manager->get_section( 'sidebar-widgets-footer-2' ) ) {
            $manager->get_section( 'sidebar-widgets-footer-2' )->priority = 510;
        }

        if( $manager->get_section( 'sidebar-widgets-footer-3' ) ) {
            $manager->get_section( 'sidebar-widgets-footer-3' )->priority = 520;
        }

        if( $manager->get_section( 'sidebar-widgets-footer-4' ) ) {
            $manager->get_section( 'sidebar-widgets-footer-4' )->priority = 530;
        }
    }
}
