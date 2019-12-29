<?php
/**
 * Typography customizer component.
 *
 * This class is used to manage the typography customize component.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Typography\Customize;

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
    public $panel = 'typography';

    /**
     * Sections to load
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [
        'Body',
        'Headings',
        'H1',
        'H2',
        'H3',
        'H4',
        'H5',
        'H6',
        'Links',
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
            'title' => __( 'Typography', 'taproot' ),
            'priority' => 60,
        ]);
    }

    /**
     * Add Sequences
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function sequences($sequences) {

        $heading_sequence_tabs_array = [
            'hide' => true,
            'prev' => [
                'label' => esc_html__('all headings', 'taproot'),
                'link' => 'typography--headings'
            ],
            'next' => [
                'link' => false
            ],
        ];

        // headings sequence
        $sequences[] = [
            'sections' => [
                'typography--headings' => [
                    'hide' => false,
                    'next' => [
                        'label' => esc_html__('headings', 'taproot'),
                    ],
                ],
                'typography--h1' => $heading_sequence_tabs_array,
                'typography--h2' => $heading_sequence_tabs_array,
                'typography--h3' => $heading_sequence_tabs_array,
                'typography--h4' => $heading_sequence_tabs_array,
                'typography--h5' => $heading_sequence_tabs_array,
                'typography--h6' => $heading_sequence_tabs_array,
            ]
        ];

        return $sequences;
    }

    /**
     * Add tabs
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function tabs($tabs) {

        $tabs[] = [
            'title' => esc_html__('Heading Styles', 'taproot'),
            'sections' => [
                'typography--h1' => [ 'label' => 'h1', 'hide' => true ],
                'typography--h2' => [ 'label' => 'h2', 'hide' => true ],
                'typography--h3' => [ 'label' => 'h3', 'hide' => true ],
                'typography--h4' => [ 'label' => 'h4', 'hide' => true ],
                'typography--h5' => [ 'label' => 'h5', 'hide' => true ],
                'typography--h6' => [ 'label' => 'h6', 'hide' => true ],
            ]
        ];

        return $tabs;
    }
}
