<?php
/**
 * Expands devices and screens from config into an array of all possible screens
 *
 * @package wp-rootstrap
 * @since 0.8.0
 */

if( !class_exists('WP_Rootstrap_Screens') )
{
    class WP_Rootstrap_Screens
    {
        /**
         * Stores registered screens
         * 
         * @since 0.8.0
         * @var sarray
         */ 
        private $registered_screens;

        /**
         * Set up our object
         *
         * @since 0.8.0
         * @param  array $screens - registered screens
         */
        public function __construct( $screens )
        {
            // register imported screens
            $this->register_screens( $screens );
        }

        /**
         * Register imported screens
         * 
         * @since 0.8.0   
         * @param  array $screens - screens to register
         */
        private function register_screens( $screens )
        {
            $this->registered_screens = ( $screens ) ? $screens : array();
        }

        /**
         * Register a new screen
         *
         * @since 0.8.0   
         * @param  array $args - the new screen args
         */
        public function register_screen( $args )
        {
            if( empty( $args['id'] ) ) return false;

            $defaults = array(
                'min' => '',
                'max' => ''
            );

            $screen = wp_parse_args( $args, $defaults );
            $this->registered_screens[$screen['id']] = $screen;

            return true;
        }

        /**
         * Expand devices into all possible screen combinations
         * 
         * @since 0.8.0   
         */
        private function expand_screens()
        {
            $screens = $this->registered_screens;
            $expanded_screens = array();

            // add default to expanded screens
            $expanded_screens['default']['id'] = 'default';

            // 'and up' screens loop
            foreach ( $screens as $screen => $args )
            {
                $min = ( isset( $args['min'] ) && '' !== $args['min'] ) ? $args['min'] : false;
                $max = ( isset( $args['max'] ) && '' !== $args['max'] ) ? $args['max'] : false;

                if( $min && $max ) $id  = sprintf( '%s-and-up', $screen );
                elseif( $min ) $id  = $screen;
                else continue;

                $expanded_screens[$id]['id'] = $id;
                $expanded_screens[$id]['min'] = $min;
            }

            // 'and under' screens loop
            foreach ( $screens as $screen => $args )
            {
                $min = ( isset( $args['min'] ) && '' !== $args['min'] ) ? $args['min'] : false;
                $max = ( isset( $args['max'] ) && '' !== $args['max'] ) ? $args['max'] : false;

                if( $min && $max ) $id  = sprintf( '%s-and-under', $screen );
                elseif( $max ) $id  = $screen;
                else continue;

                $expanded_screens[$id]['id'] = $id;
                $expanded_screens[$id]['max'] = $max;
            }

            // generate all possible screen combinations that have both a min and max
            foreach ( $screens as $outer_screen => $outer_args )
            {
                $outer_min = ( isset( $outer_args['min'] ) && '' !== $outer_args['min'] ) ? $outer_args['min'] : false;

                if( $outer_min )
                {
                    foreach ( $screens as $inner_screen => $inner_args )
                    {
                        $inner_min = ( isset( $inner_args['min'] ) && '' !== $inner_args['min'] ) ? $inner_args['min'] : false;
                        $inner_max = ( isset( $inner_args['max'] ) && '' !== $inner_args['max'] ) ? $inner_args['max'] : false;

                        if( !$inner_max ) continue;

                        $outer_min_value = filter_var( $outer_min, FILTER_SANITIZE_NUMBER_INT );
                        $inner_min_value = filter_var( $inner_min, FILTER_SANITIZE_NUMBER_INT );
                        $inner_max_value = filter_var( $inner_max, FILTER_SANITIZE_NUMBER_INT );

                        if( $outer_min_value <= $inner_min_value && $outer_min_value < $inner_max_value )
                        {
                            $id = ( $outer_screen === $inner_screen ) ? $outer_screen : sprintf( '%s-%s', $outer_screen, $inner_screen );

                            $expanded_screens[$id]['id'] = $id;
                            $expanded_screens[$id]['min'] = $outer_min;
                            $expanded_screens[$id]['max'] = $inner_max;

                        } // end if max

                    } // end inner loop

                } // end if min

            } // end outer loop

            // return expanded screen object
            return $expanded_screens;

        } // end expand_screens

        /**
         * Get stored expanded screens array
         * 
         * @since 0.8.0   
         */
        public function get_screens()
        {
            return $this->expand_screens();
        }

    } // end class WP_Rootstrap_Screens
}