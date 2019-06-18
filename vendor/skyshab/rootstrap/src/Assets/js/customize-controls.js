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
class Rootstrap {

    constructor() {
        // define api attribute
        this.api = wp.customize;

        // if wp.customize is not defined, return
        if( ! this.api ) return false;

        // define registered devices
        this.devices = rootstrapData.devices;
    }


    /**
     * Get list of device names
     */
    getDeviceList() {
        return Object.keys( this.devices );
    }


    /**
     * Get a device id from a specified width
     */
    getDevice( width ) {
        var device = false;
        for (const [name, data] of Object.entries( this.devices ) ) {

            if( !name || !data ) continue;
            var min = ( parseInt( data.min, 10 ) ) ? parseInt( data.min, 10 ): 0;
            var max = ( parseInt( data.max, 10 ) ) ? parseInt( data.max, 10 ): 9999;

            if( width >= min && width <= max )
                device = name;
                return false;
        }

        return device;
    }


    /**
     * Get the device id that matches the current preview screen width
     */
    getCurrentDevice() {
        return getDevice( this.getPreviewWidth() );
    }


    /**
     * Get the current preview screen width
     */
    getPreviewWidth() {
        var iframe = document.querySelector("#customize-preview iframe");
        var iframeDoc = (iframe.contentDocument) ? iframe.contentDocument : iframe.contentWindow.document;
        return iframeDoc.body.offsetWidth()
    }

}


/**
 * Create our Rootstrap Instance on customize ready
 */
wp.customize.bind('ready', () => {
    const rootstrap = new Rootstrap();
});
