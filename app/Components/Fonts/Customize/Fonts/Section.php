<?php
/**
 * Section.
 *
 * This class handles functionality for a customizer section.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Fonts\Customize\Fonts;

use Taproot\Customize\Abstracts\Section as SectionAbstract;

/**
 * Section Class
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
    public $name = 'fonts';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Google Fonts';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [
        'Google'
    ];

    /**
     * Register sections
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function sections($manager) {
        $manager->add_section( $this->id, [
            'title'         => esc_html__( $this->title, 'taproot' ),
            'panel'         => $this->panel,
            'priority'      => $this->priority,
            'description'   => $this->get_description()
        ]);
    }

    /**
     * Get Description
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function get_description() {

        return sprintf( '%s <a href="%s" target="_blank">%s</a> %s<br><br>%s',
            esc_html__( 'Visit', 'taproot' ),
            esc_url( 'https://fonts.google.com' ),
            esc_html__( 'Google Fonts', 'taproot' ),
            esc_html__( 'to create your font profile. Paste in the font list from the end of the embed URL, or add desired fonts using the following formula: Each font name should be separated by a "|" and use a "+" for spaces. Also supports font weight syntax.', 'taproot' ),
            esc_html__( 'Example: Oswald|Roboto+Slab:400,700', 'taproot' )
        );
    }
}
