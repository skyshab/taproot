/**
 * Font Styles Control
 *
 * This file handles the JavaScript for the custom font styles control
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

class TaprootFontStyles {

    // initiate control
    constructor( control ) {

        if ( ! control ) {
            return false;
        }

        // Set up our attributes
        const $control = document.querySelector(control.selector);
        this.fontStyles =  $control.querySelectorAll('.taproot-font-styles--item');
        this.checkboxes = $control.querySelectorAll('.taproot-font-style-checkbox');
        this.input = $control.querySelector('.taproot-font-styles-input');
        this.reset = $control.querySelector('.taproot-control-reset');

        // Set up event handlers
        this.handlers();
    }

    // add handlers
    handlers() {

        const self = this;

        // Font style handlers
        self.fontStyles.forEach( fontStyle => {
            fontStyle.addEventListener('click', (e) => {

                const $this = e.target;
                const checkbox = $this.querySelector( 'input' );

                // Toggle 'checked' class
                $this.classList.toggle( 'taproot-font-style-checked' );

                // If the checkbox is checked
                if ( checkbox.checked ) {

                    // Uncheck checkbox
                    checkbox.checked = false;
                }

                // Or if not checked
                else {

                    // Set checkbox to checked
                    checkbox.checked = true;

                    // Create var to store toggle element
                    let other = false;

                    // If this is the "uppercase" option
                    if ( 'uppercase' === checkbox.value ) {
                        other = $this.parentNode.querySelector( '.taproot-font-styles--capitalize' );
                    }

                    // Or if the "capitalize" option
                    else if ( 'capitalize' == checkbox.value ) {
                        other = $this.parentNode.querySelector( '.taproot-font-styles--uppercase' );
                    }

                    // if we need to toggle another option
                    if(other) {
                        // Remove class
                        other.classList.remove('taproot-font-style-checked');

                        // Get the checkbox
                        input = other.querySelector( 'input' );

                        // Uncheck it
                        input.checked = false;

                        // Trigger change
                        input.dispatchEvent( new Event('change') );
                    }
                }

                // Trigger a change on the checkbox
                checkbox.dispatchEvent( new Event('change') );
            });
        });

        // Checkbox handlers
        self.checkboxes.forEach( checkbox => {
            checkbox.addEventListener('change', (e) => {

                const $this = e.target;
                const value = $this.value;
                let currentValue = self.input.value;
                let values = ( 'false' != currentValue ) ? currentValue.split( '|' ) : [];
                let result = '';

                // If the checkbox is checked
                if ( $this.checked ) {

                    // Is there already a saved value?
                    if ( currentValue.length ) {

                        // If this is not already in the array
                        if ( ! values.includes(value) ) {

                            // Add to array
                            values.push( value );

                            // Define list
                            result = values.join( '|' );
                        }
                    }
                    // No other values
                    else {
                        result = value;
                    }
                }
                // or if not checked
                else {

                    // Is there already a saved value?
                    if ( currentValue.length ) {

                        // If this is already in the array
                        if ( values.includes(value) ) {

                            // Remove option from array
                            values = values.filter(item => item !== value);

                            // Define the list
                            result = values.join( '|' );
                        }

                        // No other values
                        else {
                            result = currentValue;
                        }
                    }
                }

                // Set input value
                self.input.value = result;

                // Trigger a change on the input
                self.input.dispatchEvent( new Event('change') );
            });
        });

        // Reset handler
        self.reset.addEventListener('click', (e) => {

            // Unset the value and trigger change
            self.input.value = '';
            self.input.dispatchEvent( new Event('change') );

            // Uncheck all of the checkboxes
            self.checkboxes.forEach( checkbox => {
                checkbox.checked = false;
            });

            // Remove 'checked' classes
            self.fontStyles.forEach( fontStyle => {
                fontStyle.classList.remove('taproot-font-style-checked');
            });
        });
    }
}

/**
 * Initiate Control
 */
wp.customize.controlConstructor['taproot-font-styles'] = wp.customize.Control.extend( {
	ready: function() {
        let fontStyles = new TaprootFontStyles( this );
	}
});
