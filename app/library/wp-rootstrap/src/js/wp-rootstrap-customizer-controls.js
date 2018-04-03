/**
 * Utility module for use when adding customizer controls.
 * Loaded at the 'customize_controls_enqueue_scripts' action hook.
**/
var rootstrapControls = ( function($){

    /**
     * Stores wp.customize object
    **/
    var api;


    /**
     * Stores rootstrap registered devices
    **/
    var devices;


    /**
     * Get list of device names
    **/
    var getDeviceList = function() {
        return Object.keys(devices);
    };


    /**
     * Get a device id from a specified width
     *
     * @param  int width - numeric value of width to be queried
    **/
    var getDevice = function( width ){

        var device = false;

        $.each( devices, function( d, atts ){

           var min = ( parseInt( atts.min, 10 ) ) ? parseInt( atts.min, 10 ): 0;
           var max = ( parseInt( atts.max, 10 ) ) ? parseInt( atts.max, 10 ): 9999;

           if( width >= min && width <= max ){
               device = d;
               return false;
           }
        });

        // return
        return device;

    }; // end getDevice


    /**
     * Get the device id that matches the current preview screen width
    **/
    var getCurrentDevice = function(){
        return getDevice( getPreviewWidth() );
    };


    /**
     * Get the current preview screen width
    **/
    var getPreviewWidth = function(){
        var iframeBody = $( '#customize-preview iframe' ).contents().find( 'body' );
        return iframeBody.width();
    };


    /**
     * Initialize our module
    **/
    var init = function(){

        // define api attribute
        api = wp.customize;

        // if wp.customize is not defined, return
        if( ! api ) return false;

        // define registered devices
        devices = rootstrapDevices;
    };


    /**
     * Expose public methods
    **/
    return {
        init: init,
        getDeviceList: getDeviceList,
        getDevice: getDevice,
        getCurrentDevice: getCurrentDevice,
        getPreviewWidth: getPreviewWidth,
    };

})( jQuery ); // end rootstrapControls


/**
 * Initialize our module on document ready
**/
jQuery(document).ready( function($){
    rootstrapControls.init();
});
