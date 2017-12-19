<?php
/**
 * Custom control that outputs Tabs in Customizer sections
 *
 * @package wp-rootstrap
 * @since 0.8.0
 */
if( !class_exists('WP_Rootstrap_Customizer_Tabs_Control') )
{
    class WP_Rootstrap_Customizer_Tabs_Control extends WP_Customize_Control
    {
        /**
         * Stores the control type
         *
         * @since 0.8.0
         * @var string
         */ 
        public $type = 'rootstrap-tabs';

        /**
         * Stores tabs data
         * 
         * @since 0.8.0
         * @var array
         */ 
        public $tabs = array();

        /**
         * Stores default tab section id
         * 
         * @since 0.8.0
         * @var string
         */ 
        public $default;


        /**
         * Enqueue scripts and styles.
         *
         * Filters are applied to the script uri. 
         * 
         */
        public function enqueue() {

            $scripts = get_template_directory_uri() . '/app/library/wp-rootstrap-tabs/js/wp-rootstrap-tabs.js';
            wp_enqueue_script( 'wp-rootstrap-tabs', apply_filters( 'wp-rootstrap-tabs-scripts', $scripts ), array('jquery'), '1.0.0', true );

            $styles = get_template_directory_uri() . '/app/library/wp-rootstrap-tabs/css/wp-rootstrap-tabs.css';
            wp_enqueue_style( 'wp-rootstrap-tabs', apply_filters( 'wp-rootstrap-tabs-styles', $styles ), '', '1.0.0' );      
        }


        /**
         * Renders the content of our custom control
         * 
         * @since 0.8.0
         */ 
        public function render_content()
        {
            if( empty( $this->tabs ) ) return;

            // open tabs wrapper
            echo '<div class="rootstrap-tabs-wrapper">';

            // print out each tab
     		foreach ( $this->tabs as $target => $tab )
            {
                 $id = sprintf( 'rootstrap-tab-%s', $this->id );
                 $current = ( $this->section === $target ) ? ' current-tab' : '';
                 $root = ( $target === $this->default ) ? ' root-tab' : '';

                 if( is_array( $tab ) )
                 {
                     $callback = ( isset( $tab['active_callback'] ) && '' !== $tab['active_callback'] ) ? $tab['active_callback'] : false;
                     if( $callback && function_exists( $callback ) && false === $callback() ) continue;

                     $label = ( isset( $tab['label'] ) &&  $tab['label'] ) ? $tab['label'] : 'Tab';
                 }
                 else
                 {
                     $label = ( $tab ) ? $tab : 'Tab';
                 }

                 printf( '<a id="%s" data-target-section="%s" class="rootstrap-tab%s%s" href="#">%s</a>',
                     esc_attr( $id ),
                     esc_attr( $target ),
                     esc_attr( $current ),
                     esc_attr( $root ),
                     esc_html( $label )
                 );
             }

             // close tabs wrapper
             echo '</div>';
         }

     } // end class Rootstrap_Tabs_Control
}