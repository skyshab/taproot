<?php
/**
 * Tabs class.
 *
 * This class creates a tabs object.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Tabs;

use Tabs_Control;
use Rootstrap\Abstracts\Section_Group as Group; 


/**
 * Creates a new tabs object.
 *
 * @since  1.0.0
 * @access public
 */
class Tabs extends Group {


    /**
     * Add tab control
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function control( $id ) {

        $setting = sprintf( '%s-tabs', $id );

        // Setting: create tabs control
        $this->customize->add_setting( $setting, [
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        // Control: create tabs control
        $this->customize->add_control( 
            new Tabs_Control( $this->customize, $setting, [
                'section' => $id,
                'tabs' => $this->sections,
                'default' => $this->default_section_name(),
                'priority' => -10,
            ]
        ));
    }


    /**
     * Get default section
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    private function default_section_name() {
        return key( $this->sections );   
        // once we can support 7.3.0, use this
        // return array_key_first( $this->sections );    
    }    

}
