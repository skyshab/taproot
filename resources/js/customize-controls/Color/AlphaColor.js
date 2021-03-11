/**
 * Alpha Color Picker
 *
 * This file handles the JavaScript for the custom color picker control
 * that adds an opacity slider and allows for RGBA color values
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

class AlphaColor {
    constructor(control = false) {
        // Bail if no control
        if (!control) {
            return false;
        }

        // Set up our attributes
        this.control = jQuery(control.selector).find('.alpha-color-control');
        this.container = this.control.parents('.wp-picker-container:first');
        this.defaultColor = this.control.attr('data-default-color');

        // Initiate colorpicker
        this.control.wpColorPicker(this.getOptions());

        // Maybe insert alpha control
        this.insertAlpha();

        // Set up event handlers
        this.handlers();
    }

    /**
     * Setup color picker control
     */
    getOptions() {
        const self = this;
        const container = self.control.parents('.wp-picker-container:first');

        return {
            change: function(e, ui) {
                const key = self.control.attr('data-customize-setting-link');
                const value = self.control.wpColorPicker('color');

                // Update slider handle when the default button is clicked
                if (value == self.defaultColor) {
                    container
                        .find('.alpha-slider .ui-slider-handle')
                        .text(self.getAlpha(value));
                }

                // Send ajax request to wp.customize to trigger the Save action
                wp.customize(key, function(obj) {
                    obj.set(value);
                });

                // Set the background color of the opacity slider with 100% opacity
                container
                    .find('.transparency')
                    .css('background-color', ui.color.toString('no-alpha'));
            },
            palettes: function() {
                const paletteInput = self.control.attr('data-palette');

                if (-1 !== paletteInput.indexOf('|')) {
                    return paletteInput.split('|');
                } else if ('false' == paletteInput) {
                    return false;
                } else {
                    return true;
                }
            },
        };
    }

    /**
     * Insert alpha slider control
     */
    insertAlpha() {
        if (
            this.control.attr('data-hide-alpha') &&
            'false' !== this.control.attr('data-hide-alpha')
        ) {
            return false;
        }

        const startingColor = this.control.val().replace(/\s+/g, '');
        const colorObject = new Color(startingColor);
        const container = this.control.parents('.wp-picker-container:first');
        const alphaVal = this.getAlpha(startingColor) / 100;
        const alphaSlider = jQuery(
            '<div class="alpha-color-picker-wrapper">' +
                '<div class="alpha-slider"></div>' +
                '<div class="transparency"></div>' +
                '</div>'
        );

        alphaSlider.appendTo(container.find('.iris-picker-inner'));

        // Create alpha slider using jquery ui
        container.find('.alpha-slider').slider({
            orientation: 'vertical',
            create: function() {
                var value = jQuery(this).slider('value');
                jQuery(this)
                    .find('.ui-slider-handle')
                    .text(Math.round(value * 100));
                jQuery(this)
                    .siblings('.transparency ')
                    .css('background-color', colorObject.toString('no-alpha'));
            },
            value: alphaVal,
            range: 'max',
            step: 0.01,
            min: 0,
            max: 1,
            animate: 300,
        });
    }

    /**
     * Setup color picker event handlers
     */
    handlers() {
        const $container = this.control.parents('.wp-picker-container:first');
        const $alphaSlider = $container.find('.alpha-slider');

        // Bind event handler for clicking on a palette color
        $container.find('.iris-palette').on('click', (e) => {
            var color = jQuery(e.target).css('background-color');
            const alpha = this.getAlpha(color);

            this.updateAlphaSlider(alpha, $alphaSlider);

            // Round the opacity value on RGBa colors and save to the color picker object
            if (100 !== alpha) {
                color = color.replace(/[^,]+(?=\))/, (alpha / 100).toFixed(2));
            }

            this.control.wpColorPicker('color', color);
        });

        // Bind event handler for clicking the 'clear' button
        $container.find('.button.wp-picker-clear').on('click', () => {
            const key = this.control.attr('data-customize-setting-link');

            // Set the color picker to white
            this.control.wpColorPicker('color', '#ffffff');

            // Set the actual option value to empty string
            wp.customize(key, function(obj) {
                obj.set('');
            });

            this.updateAlphaSlider(100, $alphaSlider);

            // Trigger a preview refresh. This is added because the previous color
            // value is loaded in the customize preview via PHP and clearing doesn't
            // have the desired effect. This is not the best way to handle things,
            // but it works for now.
            wp.customize.previewer.refresh();
        });

        // Bind event handler for clicking on the 'Default' button
        $container.find('.button.wp-picker-default').on('click', () => {
            const alpha = this.getAlpha(this.defaultColor);
            this.updateAlphaSlider(alpha, $alphaSlider);
        });

        // Bind event handler for typing or pasting into the input
        this.control.on('input', (e) => {
            const value = jQuery(e.target).val();
            const alpha = this.getAlpha(value);
            this.updateAlphaSlider(alpha, $alphaSlider);
        });

        // Update all the things when the slider is interacted with
        $alphaSlider.slider().on('slide', (event, ui) => {
            const alpha = parseFloat(ui.value);
            const iris = this.control.data('a8cIris');
            const colorPicker = this.control.data('wpWpColorPicker');

            // Set the alpha value on the Iris object
            iris._color._alpha = alpha;

            // Store the new color value
            const color = iris._color.toString();

            // Set the value of the input
            this.control.val(color);

            // Update the background color of the color picker
            colorPicker.toggler.css({
                'background-color': color,
            });

            // Update the color picker object
            this.control.wpColorPicker('color', color);

            $alphaSlider
                .find('.ui-slider-handle')
                .text(Math.round(ui.value * 100));
        });
    }

    /**
     * Get alpha value from RGBa, RGB, or hex colors
     */
    getAlpha(value) {
        let alphaVal;

        // Remove all spaces from the passed in value to help our RGBa regex
        value = value.replace(/ /g, '');

        if (value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)) {
            alphaVal =
                parseFloat(
                    value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)[1]
                ).toFixed(2) * 100;
            alphaVal = parseInt(alphaVal);
        } else {
            alphaVal = 100;
        }

        return alphaVal;
    }

    /**
     * Update the slider handle position and label
     */
    updateAlphaSlider(alpha, $alphaSlider) {
        $alphaSlider.slider('value', alpha);
        $alphaSlider.find('.ui-slider-handle').text(alpha.toString());
    }
}

export default AlphaColor;
