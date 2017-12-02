<?php
/**
 * Custom Customizer control classes used in our theme
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

/**
 * Custom control that adds link to branding sections for opening current screen.
 *
 * @since 0.8.0
 */
class Taproot_Branding_Open_Current extends WP_Customize_Control
{
    /**
     * Stores control type.
     *
     * @since 0.8.0
     * @var string
     */ 
    public $type = 'taproot-open-current';


    /**
     * Render control markup.
     *
     * @since 0.8.0
     */ 
    public function render_content()
    {
        echo '<a id="current-screen-button" href="#">Open Current</a>';
    }
}


/** 
 * Custom control that adds navigation bar to responsive control sections.
 *
 * @since 0.8.0
 */
class Taproot_Screen_Nav extends WP_Customize_Control
{
    /**
     * Stores control type.
     *
     * @since 0.8.0
     * @var string
     */     
    public $type = 'taproot-screen-nav';

    /**
     * Stores previous section id.
     *
     * @since 0.8.0
     * @var string
     */     
    public $previous = 'na';

    /**
     * Stores next section id.
     *
     * @since 0.8.0
     * @var string
     */     
    public $next = 'na';


    /**
     * Render control markup.
     *
     * @since 0.8.0
     */ 
    public function render_content()
    {
        if('na' !== $this->previous)
        {
            echo '<a id="previous-screen-button" data-target-section="'. esc_attr( $this->previous ) . '" class="taproot-screen-nav-link alignleft" href="#">' . esc_html__( 'Previous', 'taproot' ) . '</a>';
        }
        if('na' !== $this->next)
        {
            echo '<a id="next-screen-button" data-target-section="' . esc_attr( $this->next ) . '" class="taproot-screen-nav-link alignright"  href="#">' . esc_html__( 'Next', 'taproot' ) . '</a>';
        }
    }
}


/** 
 * Range-based sliding value picker for Customizer.
 *
 * @since 0.8.0
 */
class Taproot_Range_Option extends WP_Customize_Control 
{
    /**
     * Stores control type.
     *
     * @since 0.8.0
     * @var string
     */     
    public $type = 'range';


    /**
     * Render control markup.
     *
     * @since 0.8.0
     */ 
    public function render_content() 
    { ?>
        <label>
            <?php if( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif;
            if( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
            <input type="<?php echo esc_attr( $this->type ); ?>" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> data-reset_value="<?php echo esc_attr( $this->setting->default ); ?>" />
            <input type="number" <?php $this->input_attrs(); ?> class="taproot-range-input" value="<?php echo esc_attr( $this->value() ); ?>" />
            <span class="taproot_reset_slider"></span>
        </label>
    <?php
    }
}


/**
 * Adds Title for a group of controls.
 * 
 * @since 0.8.0
 */
class Taproot_Option_Group extends WP_Customize_Control 
{
    /**
     * Stores control type.
     *
     * @since 0.8.0
     * @var string
     */     
    public $type = 'taproot-option-group';


    /**
     * Render control markup.
     *
     * @since 0.8.0
     */ 
    public function render_content() {
        if( !empty( $this->label ) ) :
            printf( '<label class="taproot-group-title">%s</label>', esc_html( $this->label ) );
        endif;
    }
}


/**
 * Font style control for Customizer.
 * 
 * @since 0.8.0
 */
class Taproot_Font_Styles extends WP_Customize_Control 
{
    /**
     * Stores control type.
     *
     * @since 0.8.0
     * @var string
     */     
    public $type = 'font_styles';


    /**
     * Render control markup.
     *
     * @since 0.8.0
     */ 
    public function render_content() 
    { ?>
        <label>
            <?php if( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif;
            if( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
        </label>
        <?php $current_values = explode('|', $this->value() );

        $choices = array(
    		'bold'       => esc_html__( 'Bold', 'taproot' ),
    		'italic'     => esc_html__( 'Italic', 'taproot' ),
    		'uppercase'  => esc_html__( 'Uppercase', 'taproot' ),
    		'capitalize' => esc_html__( 'Capitalize', 'taproot' ),
    	);

        foreach ( $choices as $value => $label ) :
            $checked_class = in_array( $value, $current_values ) ? ' taproot-font-style-checked' : '';
            ?>
                <span class="taproot-font-style taproot-font-value-<?php echo esc_attr( $value ) . esc_attr( $checked_class ); ?>">
                    <input type="checkbox" class="taproot-font-style-checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $current_values ) ); ?> />
                </span>
            <?php
        endforeach;
        ?>
        <input type="hidden" class="taproot-font-styles" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
        <?php
    }
}


/** 
 * Create customizer color controls and settings.
 *
 * @since 0.8.0
 */
if( !function_exists('taproot_customizer_color') )
{
    /**
     * The file that initiates alpha color control functionality
     */
    require_once TAPROOT_LIBRARY . '/alpha-color-picker/alpha-color-picker.php';

    /**
     * Create and alpha color control.
     *
     * @since 0.8.0
     *
     * @param object $wp_customize
     * @param string $id
     * @param array $args - the control and settings args
     */
    function taproot_customizer_color( $wp_customize, $id, $args = array() )
    {   
        $default = ( isset($args['default']) ) ? $args['default'] : '';
        $label = ( isset($args['label']) ) ? $args['label'] : '';
        $section = ( isset($args['section']) ) ? $args['section'] : '';
        $priority = ( isset($args['priority']) ) ? $args['priority'] : false;

        $wp_customize->add_setting( $id, array(
            'sanitize_callback' => 'taproot_sanitize_color_value',
            'transport' => 'postMessage',  
            'default' => $default,
        ));

        $control_array = array(
            'label' => $label,
            'section' => $section,
            'settings' => $id            
        );

        if( $priority && '' !== $priority )
        {
            $control_array['priority'] = $priority;
        }

        $wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, $id, $control_array ) ); 
    }
    
} // end if function exists
