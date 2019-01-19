/**
 * Alpha Color Picker
 *
 * This file handles the JavaScript for the custom color picker control
 * that adds an opacity slider and allows for RGBA color values
 * 
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


/**
 * Add support to the stock color.js toString() for RGBa
 */
Color.prototype.toString = function( flag ) {

	// If our no-alpha flag has been passed in, output RGBa value with 100% opacity
	if ( 'no-alpha' == flag ) {
		return this.toCSS( 'rgba', '1' ).replace( /\s+/g, '' );
	}

	// If we have a proper opacity value, output RGBa
	if ( 1 > this._alpha ) {
		return this.toCSS( 'rgba', this._alpha ).replace( /\s+/g, '' );
	}

	// Proceed with stock color.js hex output
	var hex = parseInt( this._color, 10 ).toString( 16 );
	if ( this.error ) { return ''; }
	if ( hex.length < 6 ) {
		for ( var i = 6 - hex.length - 1; i >= 0; i-- ) {
			hex = '0' + hex;
		}
	}

	return '#' + hex;
};


/**
 * Alpha Color Picker Class
 */
class AlphaColor {

    constructor( control ) {

        if( !control ) return false;

        // Set up our attributes
        this.control        = jQuery(control.selector).find('.alpha-color-control');
		this.startingColor  = this.control.val().replace( /\s+/g, '' );
		this.defaultColor   = this.control.attr( 'data-default-color' );
		this.paletteInput   = this.control.attr( 'data-palette' );
        this.palette        = this.paletteSettings();
		this.hideAlpha      = ( this.control.attr( 'data-hide-alpha' ) && 'false' !== this.control.attr( 'data-hide-alpha' ) ) ? true : false;

        // Initialize control
        this.setupControl();

        // Initialize alpha slider
        this.addAlpha();

        // Set up event handlers
        this.handlers();  
    }


    /**
     * Get palette settings
     */  
    paletteSettings() {

		if ( this.paletteInput.indexOf( '|' ) !== -1 ) {
			return this.paletteInput.split( '|' );
        } 
        else if ( 'false' == this.paletteInput ) {
			return false;
        } 
        else {
			return true;
        }          
    }


    /**
     * Get control container
     */  
    getContainer() {
        return this.control.parents( '.wp-picker-container:first' );
    }


    /**
     * Setup color picker control
     */  
    setupControl() {

        const self = this;

		const colorPickerOptions = {
			change: function( e, ui ) {                
				var key, value, alpha;
				key = self.control.attr( 'data-customize-setting-link' );
				value = self.control.wpColorPicker( 'color' );

				// Update slider handle when the default button is clicked
				if ( self.defaultColor == value ) {
                    
                    alpha = self.getAlpha( value );
                    
                    const $container = self.getContainer();
                    const $alphaSlider = $container.find( '.alpha-slider' );

					$alphaSlider.find( '.ui-slider-handle' ).text( alpha );
				}

				// Send ajax request to wp.customize to trigger the Save action
				wp.customize( key, function( obj ) {
					obj.set( value );
				});

				// Set the background color of the opacity slider with 100% opacity
				self.getContainer().find( '.transparency' ).css( 'background-color', ui.color.toString( 'no-alpha' ) );
			},
			palettes: self.palette
		};

		// Create the colorpicker
		this.control.wpColorPicker( colorPickerOptions );
    }


    /**
     * Setup alpha slider control
     */  
    addAlpha() {

        if( this.hideAlpha ) return false;
        const startingColor = this.startingColor;
        const colorObject = new Color(startingColor);
        const container = this.getContainer();
        const alphaVal = this.getAlpha( startingColor ) / 100;

        // Insert our opacity slider
        $( '<div class="alpha-color-picker-wrapper">' +
                '<div class="alpha-slider"></div>' +
                '<div class="transparency"></div>' +
            '</div>' ).appendTo( container.find( '.iris-picker-inner' ) );
        
        // Create alpha slider using jquery ui
        container.find( '.alpha-slider' ).slider({
            orientation: "vertical",
            create: function() {
                var value = $( this ).slider( 'value' );
                $( this ).find( '.ui-slider-handle' ).text( Math.round(value * 100) );
                $( this ).siblings( '.transparency ').css( 'background-color', colorObject.toString( 'no-alpha' ) );
            },
            value: alphaVal,
            range: 'max',
            step: 0.01,
            min: 0,
            max: 1,
            animate: 300				
        });
    }


    /**
     * Setup color picker event handlers
     */    
    handlers() {
        
        const $container = this.getContainer();
        const $alphaSlider = $container.find( '.alpha-slider' );

		// Bind event handler for clicking on a palette color
		$container.find( '.iris-palette' ).on( 'click', (e) => {

			var color = $( e.target ).css( 'background-color' );
			const alpha = this.getAlpha( color );

			this.updateAlphaSlider( alpha, $alphaSlider );

			// Round the opacity value on RGBa colors and save to the color picker object
			if ( alpha != 100 ) {
				color = color.replace( /[^,]+(?=\))/, ( alpha / 100 ).toFixed( 2 ) );
			}

			this.control.wpColorPicker( 'color', color );
		});


		// Bind event handler for clicking the 'clear' button
		$container.find( '.button.wp-picker-clear' ).on( 'click', () => {
			const key = this.control.attr( 'data-customize-setting-link' );

			// Set the color picker to white
			this.control.wpColorPicker( 'color', '#ffffff' );

			// Set the actual option value to empty string
			wp.customize( key, function( obj ) {
				obj.set('');
			});

			this.updateAlphaSlider( 100, $alphaSlider );
		});


		// Bind event handler for clicking on the 'Default' button
		$container.find( '.button.wp-picker-default' ).on( 'click', () => {
			const alpha = this.getAlpha( this.defaultColor );
			this.updateAlphaSlider( alpha, $alphaSlider );
		});


		// Bind event handler for typing or pasting into the input
		this.control.on( 'input', (e) => {
			const value = $( e.target ).val();
			const alpha = this.getAlpha( value );
			this.updateAlphaSlider( alpha, $alphaSlider );
		});


		// Update all the things when the slider is interacted with
		$alphaSlider.slider().on( 'slide', ( event, ui ) => {
            const alpha = parseFloat( ui.value );
            const $alphaSlider = $container.find( '.alpha-slider' );
			this.updateControl( alpha, this.control, $alphaSlider, false );
			$alphaSlider.find( '.ui-slider-handle' ).text( Math.round( ui.value * 100 ) );
		});
    }

    
    /**
     * Get alpha value from RGBa, RGB, or hex colors
     */
    getAlpha( value ) {

        var alphaVal;

        // Remove all spaces from the passed in value to help our RGBa regex
        value = value.replace( / /g, '' );

        if ( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ ) ) {
            alphaVal = parseFloat( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ )[1] ).toFixed(2) * 100;
            alphaVal = parseInt( alphaVal );
        } 
        else {
            alphaVal = 100;
        }

        return alphaVal;
    }

    /**
     * Update the color picker object and maybe the alpha slider
     */
    updateControl( alpha, $control, $alphaSlider, update_slider ) {

        const iris = $control.data( 'a8cIris' );
        const colorPicker = $control.data( 'wpWpColorPicker' );

        // Set the alpha value on the Iris object
        iris._color._alpha = alpha;

        // Store the new color value
        const color = iris._color.toString();

        // Set the value of the input
        $control.val( color );

        // Update the background color of the color picker
        colorPicker.toggler.css({
            'background-color': color
        });

        // Maybe update the alpha slider
        if ( update_slider ) {
            this.updateAlphaSlider( alpha, $alphaSlider );
        }

        // Update the color picker object
        $control.wpColorPicker( 'color', color );
    }

    /**
     * Update the slider handle position and label
     */
    updateAlphaSlider( alpha, $alphaSlider ) {
        $alphaSlider.slider( 'value', alpha );
        $alphaSlider.find( '.ui-slider-handle' ).text( alpha.toString() );
    }
}

/**
 * Initiate Alpha Color 
 */
wp.customize.controlConstructor['alpha-color'] = wp.customize.Control.extend( {
	ready: function() {
        let alphaControl = new AlphaColor( this );
	}
});
