<?php
/**
 * Panel class.
 *
 * This class is used to add a new panel to the Customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize;

use Taproot\Customize\Contracts\Panel as Contract;
use Rootstrap_Custom_Panel as Custom_Panel;

/**
 * Class that handles a customizer component.
 *
 * @since  2.0.0
 * @access public
 */
class Panel implements Contract {

    /**
     * Stores panel id
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $id;

    /**
     * Stores parent panel id
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $panel;

    /**
     * Stores panel priority
     *
     * @since 2.0.0
     * @access public
     * @var array
     */
    public $priority;

    /**
     * Stores title
     *
     * @since 2.0.0
     * @access public
     * @var string
     */
    public $title;

    /**
     * Construct
     *
     * @since 2.0.0
     * @access public
     * @param string $post_type
     * @return void
     */
    public function __construct( $args = [] ) {

        $args = wp_parse_args( $args, [
            'id' => false,
            'title' => '',
            'panel' => null,
            'priority' => 10,
        ]);

        foreach( $args as $key => $val ) {
            if( property_exists( get_called_class(), $key ) ) {
                $this->{$key} = $val;
            }
        }
    }

    /**
     * Register sections
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function panels( $manager ) {

        $manager->add_panel( new Custom_Panel( $manager, $this->id, [
            'title'         => $this->title,
            'panel'         => $this->panel,
            'priority'      => $this->priority,
            'pre_title_label' => __( 'Customizing', 'taproot' ),
        ]));
    }
}
