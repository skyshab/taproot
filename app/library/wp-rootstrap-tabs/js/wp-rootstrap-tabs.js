/**
 * Utility module for managing customizer tab behavior.
 * Loaded at the 'customize_controls_enqueue_scripts' action hook.
 */
var rootstrapTabs = ( function($){

    /**
     * Stores wp.customize object
     */
    var api;


    /**
     * Add click handler to rootstrap tabs controls in the customizer
     */
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
     */
    var init = function(){

        // define api attribute
        api = wp.customize;

        // if wp.customize is not defined, return
        if( ! api ) return false;

        // initialize tab functionality
        initializeTabs();
    };


    /**
     * Expose public methods
     */
    return {
        init: init,
    };

})( jQuery ); // end rootstrapTabs


/**
 * Initialize our module on document ready
 */
jQuery(document).ready( function($){
    rootstrapTabs.init();
});
