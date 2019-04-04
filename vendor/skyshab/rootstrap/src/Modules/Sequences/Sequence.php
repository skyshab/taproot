<?php
/**
 * Sequence class.
 *
 * This class creates a sequence object.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Sequences;

use Sequence_Control;
use Rootstrap\Abstracts\Section_Group as Group; 


/**
 * Creates a new sequence object.
 *
 * @since  1.0.0
 * @access public
 */
class Sequence extends Group {


    /**
     * Previous label.
     *
     * @since  1.0.0
     * @access public
     * @var    string 
     */
    public $previous;
    
    /**
     * Next label.
     *
     * @since  1.0.0
     * @access public
     * @var    string 
     */
    public $next;


    /**
     * Add sequence control
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
   public function control( $id ) {

        $setting = sprintf( 'sequence-nav-%s', $id );

        // Setting: Taproot Branding Screen Nav
        $this->customize->add_setting( $setting, [
            'sanitize_callback' => 'sanitize_text_field',
        ]);


        $prev_section = $this->previous_section( $id );
        $prev_label = $this->previous;
        $next_section = $this->next_section( $id );
        $next_label = $this->next;
        $prev_device = false;
        $next_device = false;

        $section_prev = ( isset( $this->sections[$id]['prev'] ) ) ? $this->sections[$id]['prev'] : false;

        if( $section_prev ) {
            
            if( isset( $section_prev['link'] ) )
                $prev_section = $section_prev['link'];

            if( isset( $section_prev['label'] ) )
                $prev_label = $section_prev['label'];

            $prev_device = ( isset( $section_prev['device'] ) ) ?: false;
        }


        $section_next = ( isset( $this->sections[$id]['next'] ) ) ? $this->sections[$id]['next'] : false;

        if( $section_next ) {
            
            if( isset( $section_next['link'] ) )
                $next_section = $section_next['link'];

            if( isset( $section_next['label'] ) )
                $next_label = $section_next['label'];

            $next_device = ( isset( $section_next['device'] ) ) ?: false;               
        }

        $this->customize->add_control( 
            new Sequence_Control( $this->customize, $setting, [
                'section' => $id,
                'prev' => [
                    'section' => $prev_section,
                    'label' => $prev_label,
                    'device' => $prev_device
                ],
                'next' => [
                    'section' => $next_section,
                    'label' => $next_label,
                    'device' => $next_device
                ],                
                'priority' => -20,
            ]
        ));
    }

    /**
     * Get Sections List
     *
     * @since  1.0.0
     * @access private
     * @return array
     */
    private function get_sections_list() {
        return array_keys( $this->sections );
    }


    /**
     * Get the section immediately before specified section
     *
     * @since 1.0.0
     * @param string             $current
     * @return string
     */
    private function previous_section( $current ) {
        $sections = $this->get_sections_list();
        $index = array_search( $current, $sections );
        return ( isset( $sections[$index - 1] ) ) ? $sections[$index - 1] : false;
    }


    /**
     * Get the section immediately after specified section
     *
     * @since 1.0.0
     * @param string             $current
     * @return string
     */
    private function next_section( $current ) {
        $sections = $this->get_sections_list();
        $index = array_search( $current, $sections );
        return ( isset( $sections[$index + 1] ) ) ? $sections[$index + 1] : false;
    }    

}
