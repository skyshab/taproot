/**
 * Scripts for working with customizer control actions
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Main Rootstrap Class
 */
class RootstrapCustomize {


    constructor() {
        // define api attribute
        this.api = wp.customize;

        // if wp.customize is not defined, return
        if( ! this.api ) return false;

        // define registered devices
        this.devices = rootstrapData.devices;

        // initialize tab functionality
        this.initializeNavLinks();

        // initialize sequence devices
        this.initializeDeviceLinks();

        // setup device data
        this.bindDevices();
    }


    /**
     * Get list of device names
     */
    getDeviceList() {
        return Object.keys( this.devices );
    }


    /**
     * When opening a section, open the associated device in preview.
     */
    bindDevices() {
        const api = this.api;
        const devices = this.getDeviceList();
        api.section.each( ( section ) => {
            var type = section.params.type;
            devices.forEach( ( device ) => {
                if( type && type === `rootstrap-device--${device}` )
                    section.expanded.bind( () => {
                        api.previewedDevice.set( device );
                    });
            });
        });
    }


    /**
     * Add click handler to tabs and sequence navigation
     */
    initializeNavLinks() {
        const api = this.api;
        document.querySelectorAll('.rootstrap-nav-link').forEach( ( link ) => {
            var section = link.dataset.section;
            link.addEventListener("click", (e) => {
                if( api.section( section ) )
                    api.section( section ).focus();
            });
        });
    }


    /**
     * Add click handler to sequence navigation for devices
     */
    initializeDeviceLinks() {
        const api = this.api;
        document.querySelectorAll('.rootstrap-nav-link').forEach( ( link ) => {
            var device = link.dataset.device;
            link.addEventListener("click", (e) => {
                if( device )
                    api.previewedDevice.set( device );
            });
        });
    }

}


/**
 * Create our Rootstrap Instance on customize ready
 */
wp.customize.bind('ready', () => {
    const rootstrapCustomize = new RootstrapCustomize();
});
