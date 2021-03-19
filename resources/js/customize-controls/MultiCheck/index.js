/**
 * Customize control - Multicheck
 *
 * This file handles the JavaScript for the multicheck control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
(function(api) {
    api.bind('ready', () => {
        const multichecks = document.querySelectorAll(
            '.customize-control-checkbox-multiple input[type="checkbox"]'
        );

        multichecks.forEach((cb) => {
            cb.addEventListener('change', (e) => {
                const control = e.target.closest('.customize-control');
                const input = control.querySelector('input[type="hidden"]');
                const checked = control.querySelectorAll(
                    'input[type="checkbox"]:checked'
                );
                let list = [];

                checked.forEach((check) => {
                    list.push(check.value);
                });

                input.value = list.join();

                input.dispatchEvent(new Event('change'));
            });
        });
    });
})(wp.customize);
