/**
 * Customizer Responsive Controls
 *
 * This file handles the JavaScript for the responsive controls in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

(function(api) {
    api.bind('ready', () => {
        api.previewer.bind('ready', () => {
            const pickers = document.querySelectorAll('.device-picker');
            const devices = document.querySelectorAll('.device-picker__device');

            devices.forEach((device) => {
                device.addEventListener('click', (e) => {
                    const device = e.target.dataset.device;
                    e.target.parentElement.setAttribute(
                        'data-current-device',
                        device
                    );
                    api.previewedDevice.set(device);
                    pickers.forEach((picker) => {
                        picker.dataset.currentDevice = device;
                    });
                });
            });

            api.previewedDevice.bind(() => {
                const device = api.previewedDevice.get();
                pickers.forEach((picker) => {
                    picker.dataset.currentDevice = device;
                });
            });
        });
    });
})(wp.customize);
