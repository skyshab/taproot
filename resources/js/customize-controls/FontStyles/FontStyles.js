/**
 * Font Styles Control
 *
 * This file handles the JavaScript for the custom font styles control
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

class FontStyles {
    constructor(control) {
        if (!control) {
            return false;
        }

        const $control = document.querySelector(control.selector);
        this.fontStyles = $control.querySelectorAll(
            '.taproot-font-styles--item'
        );
        this.checkboxes = $control.querySelectorAll(
            '.taproot-font-style-checkbox'
        );
        this.input = $control.querySelector('.taproot-font-styles-input');
        this.reset = $control.querySelector('.taproot-control-reset');

        this.handlers();
    }

    // add handlers
    handlers() {
        this.fontStyles.forEach((fontStyle) => {
            fontStyle.addEventListener('click', () => {
                const checkbox = fontStyle.querySelector('input');

                fontStyle.classList.toggle('taproot-font-style-checked');

                if (checkbox.checked) {
                    checkbox.checked = false;
                } else {
                    checkbox.checked = true;

                    let other = false;

                    // If this is the "uppercase" option
                    if ('uppercase' === checkbox.value) {
                        other = fontStyle.parentNode.querySelector(
                            '.taproot-font-styles--capitalize'
                        );
                    }

                    // Or if the "capitalize" option
                    else if ('capitalize' == checkbox.value) {
                        other = fontStyle.parentNode.querySelector(
                            '.taproot-font-styles--uppercase'
                        );
                    }

                    // if we need to toggle another option
                    if (other) {
                        other.classList.remove('taproot-font-style-checked');
                        input = other.querySelector('input');
                        input.checked = false;
                        input.dispatchEvent(new Event('change'));
                    }
                }

                checkbox.dispatchEvent(new Event('change'));
            });
        });

        // Checkbox handlers
        this.checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
                const value = checkbox.value;
                let currentValue = this.input.value;
                let values =
                    'false' != currentValue ? currentValue.split('|') : [];
                let result = '';

                if (checkbox.checked) {
                    // Is there already a saved value?
                    if (currentValue.length) {
                        // If this is not already in the array
                        if (!values.includes(value)) {
                            // Add to array
                            values.push(value);

                            // Define list
                            result = values.join('|');
                        }
                    }
                    // No other values
                    else {
                        result = value;
                    }
                } else {
                    // Is there already a saved value?
                    if (currentValue.length) {
                        // If this is already in the array
                        if (values.includes(value)) {
                            // Remove option from array
                            values = values.filter((item) => item !== value);

                            // Define the list
                            result = values.join('|');
                        }

                        // No other values
                        else {
                            result = currentValue;
                        }
                    }
                }

                // Set input value
                this.input.value = result;

                // Trigger a change on the input
                this.input.dispatchEvent(new Event('change'));
            });
        });

        // Reset handler
        this.reset.addEventListener('click', (e) => {
            // Unset the value and trigger change
            this.input.value = '';
            this.input.dispatchEvent(new Event('change'));

            // Uncheck all of the checkboxes
            this.checkboxes.forEach((checkbox) => {
                checkbox.checked = false;
            });

            // Remove 'checked' classes
            this.fontStyles.forEach((fontStyle) => {
                fontStyle.classList.remove('taproot-font-style-checked');
            });
        });
    }
}

export default FontStyles;
