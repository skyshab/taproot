/**
 * Device Picker
 *
 * This file handles the JavaScript for the device picker
 * that is a component of our responsive control types.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


class DevicePicker {

    constructor() {
        this.handlers();
    }

    handlers() {
        const api =  wp.customize;
        document.querySelectorAll( '.device-picker__device' ).forEach( device => {
            device.addEventListener('click', (e) => {
                const $this = e.target;
                const device = $this.dataset.device;
                $this.parentElement.setAttribute( 'data-current-device', device );
                api.previewedDevice.set( device );
                document.querySelectorAll('.device-picker').forEach( picker => {
                    picker.dataset.currentDevice = device;
                });
            });
        });

        // Change responsive controls whenever the preview is changed.
        api.previewedDevice.bind( () => {
            const device = api.previewedDevice.get();
            document.querySelectorAll('.device-picker').forEach( picker => {
                picker.dataset.currentDevice = device;
            });
        });
    }
}


/**
 * Run on document ready
 */
document.addEventListener('DOMContentLoaded', () => {
    const devicePicker = new DevicePicker();
});
