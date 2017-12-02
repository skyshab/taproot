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
     * Set active preview button and preview screen for a specified device
     *
     * @param  string screen - the id of the screen to activate
    **/
    var activateDevice = function( screen ){

       var overlay = $( '.wp-full-overlay' ),
           footerActions = $( '#customize-footer-actions' ),
           deviceClass = 'preview-' + screen,
           deviceClasses = '';

        // deactivate all device buttons
        footerActions.find( '.devices button' )
           .removeClass( 'active' )
           .attr( 'aria-pressed', false );

        // activate current device button
        footerActions.find( '.devices .' + deviceClass )
            .addClass( 'active' )
            .attr( 'aria-pressed', true );

        // create list of all device classes
        $.each( api.settings.previewableDevices, function( device ){
            deviceClasses += ' preview-' + device;
        } );

        // remove all device classes and add current device class
        overlay.removeClass( deviceClasses ).addClass( deviceClass );

    }; // end activateDevice


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
     * Add click handler to rootstrap tabs controls in the customizer
    **/
    var initializeTabs = function(){

        // show/hide tabs content when manually clicking tabs
        $( 'body' ).on( 'click', '.customize-control-rootstrap-tabs .rootstrap-tab', function(){

            var target = $(this).data( 'target-section' );

            if( api.section( target ) ){
                api.section( target ).activate();
                api.section( target ).focus();
            }
        });
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

        // initialize tab functionality
        initializeTabs();
    };


    /**
     * Expose public methods
    **/
    return {
        init: init,
        getDeviceList: getDeviceList,
        getDevice: getDevice,
        activateDevice: activateDevice,
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
