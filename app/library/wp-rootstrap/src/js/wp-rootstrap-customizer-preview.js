/**
 * Utility module for use when adding customizer live styles.
 * Loaded at the 'customize_preview_init' action hook.
 */
var rootstrapPreview = ( function($) {

    /**
     * Stores wp.customize object
     */
    var api;

    /**
     * Stores rootstrap registered devices
     */
    var devices;

    /**
     * Get list of device names
     */
    var getDeviceList = function() {
        return Object.keys(parent.rootstrapDevices);
    };

    /**
     * Updates live preview styleblock for a specified setting
     *
     * @param  object styleObj - contains styleblock id, screen and styles
     */
    var style = function( styleObj = false ) {

        if( ! styleObj || ! styleObj.id ) return;

        var device = 'default';
        var andUp = false;
        var andUnder = false;
        var styleContent = false;

        // if device has 'and up' flag
        if( styleObj.device && styleObj.device.endsWith( '-and-up') ) {
            andUp = true;
            device = styleObj.device.replace( '-and-up', '' );
        }
        // if device has 'and under' flag
        else if( styleObj.device && styleObj.device.endsWith( '-and-under') ) {
            andUnder = true;
            device = styleObj.device.replace( '-and-under', '' );
        }
        // no flags
        else if( styleObj.device ){
            device = styleObj.device;
        }

        // define styleblock id
        var outputId = ( device != 'default' ) ? styleObj.id + '-' + device : styleObj.id;

        // if a value was supplied, replace all instances in styles.
        if( styleObj.value && styleObj.styles ) {
            styleContent = styleObj.styles.replace( /{{value}}/g, styleObj.value );
        }
        // otherise, just get the styles
        else if( styleObj.styles && styleObj.styles.indexOf("{{value}}") < 0 ) {
            styleContent = styleObj.styles;              
        }
        // no styles at all? outta here
        else return;

        // create our styleblock
        var output = $('<style></style>');

        // get media query
        var query = getMediaQuery( device, andUnder, andUp );

        // wrap styles in media query
        output.html( query.open + styleContent + query.close );

        // get device hook id
        var hookId = getStyleHookId( device );

        // define style hook element
        var hook = $( hookId );

        // remove any existing version of the styleblock
        $( '#' + outputId  ).remove();

        // add id to new styleblock
        output.attr( 'id', outputId );

        // add new styleblock before device hook
        output.insertBefore( hook );

    }; // end style

    /**
     * Create a media query object for a specified screen
     *
     * @param  string theDevice - the device id to build the query from
     * @param  bool andUnder - flag for device state min width
     * @param  bool current - flag for device state max width
     */
    var getMediaQuery = function( theDevice = false, andUnder = false, andUp = false ) {

        var query = {};

        if( theDevice && isDevice( theDevice ) ){
            var device = devices[theDevice];
            var min = ( device['min'] && ! andUnder ) ? device['min'] : false;
            var max = ( device['max'] && ! andUp ) ? device['max'] : false;
            query['open'] = '@media screen and ';

            if( min ){
                query['open'] += '(min-width: ' + min + ')';

                if( max ){
                    query['open'] += ' and (max-width: ' + max + ')';
                }
            }
            else if( max ){
                query['open'] += '(max-width: ' + max + ')';
            }
            else return {"open": '', "close": ''};
            
            query['open'] += '{';
            query['close'] = '}';
        }
        else {
            query['open'] = '';
            query['close'] = '';
        }

        return query;

    }; // end getMediaQuery

    /**
     * Checks to see if specified device is registered
     *
     * @param  string device - the device id to check
     */
    var isDevice = function( device ) {

        return ( devices[device] ) ? true : false;

    }; // end isDevice

    /**
     * Assembles style hook id string from specified device
     *
     * @param  string device - the device to create placeholder id for
     */
    var getStyleHookId = function( device ){

        return "#rootstrap-style-hook-" + device;

    }; // end getStyleHookId

    /**
     * Adds placeholder hooks to header for keeping responsive styles in order
     */
    var hooksInit = function() {

        // add default hook
        $('<meta id="rootstrap-style-hook-default" name="rootstrap-style-hook-default">').appendTo('head');

        // create hook for each registered device
        $.each( devices, function(d, atts) {
            var hookId = 'rootstrap-style-hook' + '-' + d;
            var hook = $('<meta>');
            hook.attr( 'id', hookId );
            hook.attr( 'name', hookId );
            hook.appendTo('head');
        });

    }; // end hooksInit

    /**
     * Initialize our module
     */
    var init = function() {

      // define api attribute
      api = wp.customize;

      // if wp.customize is not defined, return
      if( ! api ) return false;

      // define registered devices
      devices = parent.rootstrapDevices;

      // add style hooks to head
      hooksInit();

    }; // end init

    /**
     * Expose public methods
     */
    return {
        init: init,
        style: style,
        getDeviceList: getDeviceList
    };

})( jQuery ); // end rootstrapPreview

/**
 * Initialize our module on document ready
 */
jQuery(document).ready(function($) {
    rootstrapPreview.init();
});
