<?php
/**
 * Header Panel
 *
 * This class is used to manage the header panel and add its sections
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize;

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
    public $panel = 'header';

    /**
     * Sections to load
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [
        'Styles',
        'Styles_Fixed',
        'Layout',
        'Hero',
        'Logo',
        'Logo_Fixed',
        'Title',
        'Title_Fixed',
        'Tagline',
        'Tagline_Fixed'
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
            'title' => __( 'Header', 'taproot' ),
            'priority' => 30,
        ]);

        // Hide the default show title/tagline controls
        if( $manager->get_control( 'display_header_text' ) ) {
            $manager->remove_control( 'display_header_text' );
        }
    }

    /**
     * Register tabs
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function tabs($tabs) {

        $tabs[] = [
            'title' => __('Header Styles', 'taproot'),
            'sections' => [
                'header--styles' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
                'header--fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
            ],
        ];

        $tabs[] = [
            'title' => __('Logo', 'taproot'),
            'sections' => [
                'header--logo' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
                'header--logo-fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
            ],
        ];

        $tabs[] = [
            'title' => __('Title', 'taproot'),
            'sections' => [
                'header--title' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
                'header--title-fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
            ],
        ];

        $tabs[] = [
            'title' => __('Tagline', 'taproot'),
            'sections' => [
                'header--tagline' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
                'header--tagline-fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
            ],
        ];

        return $tabs;
    }
}
