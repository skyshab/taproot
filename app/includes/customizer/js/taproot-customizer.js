/**
 * Customizer scripts. 
 */
(function( $ ){

    'use strict';

    // define our main customizer module
    var taprootCustomizer = ( function(){

        // stores rootstrapControls object
        var rootstrap;

        // stores wp.customize object
        var api;


        // method that opens current section when resizing preview screen in a responsive panel
        var preview = function(){

            var resizeTimer;
            $( window ).on( 'resize', function(){

                // only do this in responsive panels
                if( ! $( '.current-panel' ).hasClass( 'control-panel-responsive' ) ) return false;

                // only do this if we're in a responsive section
                if( ! $( '.accordion-section.open' ).hasClass( 'control-section-responsive' ) ) return false;

                // add resizing class to iframe
                $( '#customize-preview iframe' ).addClass( 'resizing' );

                // set preview class and activate device
                updatePreview();

                clearTimeout( resizeTimer );
                resizeTimer = setTimeout( function(){
                    // remove resizing class
                    $( '#customize-preview iframe' ).removeClass( 'resizing' );

                }, 300);
            });

        }; // end preview


        // method for responsive panel controls
        var branding = function(){

            // setup data for responsive sections
            var deviceList = rootstrap.getDeviceList(),
                deviceLength = deviceList.length;

            for (var i = 0; i < deviceLength; i++) {

                $( '.control-section-responsive-' + deviceList[i] ).each( function(){
                    $(this).data( 'screen', deviceList[i] );
                    $(this).addClass( 'control-section-responsive' );
                });
            }

            // open device specific control section when clicking preview button
            $( '#customize-footer-actions' ).on( 'click', '.devices button', function(event){

                // only do this in responsive sections 
                if( ! $( '.control-section.open' ).hasClass( 'control-section-responsive' ) ) return false;
                
                var size = $( event.target ).data( 'device' ),
                targetSection = $('.current-panel [id$=' + size.replace( '-', '_' ) + ']').attr('id').replace( 'accordion-section-', '' );

                api.section( targetSection ).activate();
                api.section( targetSection ).focus();
            });

            // set max-width on preview iframe when opening branding screen sections
            $( '#customize-theme-controls' ).on( 'click', '.control-panel-responsive.current-panel .control-section-responsive .accordion-section-title', function(){

                var targetSection = $(this).parent( '.control-section' ).data( 'screen' );

                api.previewedDevice.set( targetSection );
            });

            // set max-width on preview iframe when clicking on screen nav links
            $( '#customize-theme-controls' ).on( 'click', '.control-section-responsive.open .taproot-screen-nav-link', function(){

                if( $(this).data( 'target-section' ) ){
                    var targetSection = $(this).data( 'target-section' );
                } else return;

                if( api.section( targetSection ) ){
                    api.section( targetSection ).focus();

                    var screen = $('#accordion-section-' + targetSection).data( 'screen' );
                    api.previewedDevice.set( screen );
                }
            });

        }; // end branding


        // method for font style controls
        var fontStyles = function(){

            $('input.taproot-font-style-checkbox[type=checkbox]').live('change', function(){
    			var $this_el      = $(this),
    				$main_option  = $this_el.closest( 'span' ).siblings( 'input.taproot-font-styles' ),
    				value         = $this_el.val(),
    				current_value = $main_option.val(),
    				values        = ( current_value != 'false' ) ? current_value.split( '|' ) : [],
    				query         = $.inArray( value, values ),
    				result        = '';

    			if( $this_el.prop('checked' ) == true ) {
    				if( current_value.length ) {
    					if( query < 0 ) {
    						values.push( value );
    						result = values.join( '|' );
    					}
    				} else {
    					result = value;
    				}
    			} else {
    				if( current_value.length !== 0 ) {
    					if( query >= 0 ) {
    						values.splice( query, 1 );
    						result = values.join( '|' );
    					} else {
    						result = current_value;
    					}
    				}
    			}

    			$main_option.val( result ).trigger( 'change' );
    		});

    		$( 'span.taproot-font-style' ).click( function() {
    			var style_checkbox = $( this ).find( 'input' );

    			$( this ).toggleClass( 'taproot-font-style-checked' );

    			if( style_checkbox.is( ':checked' ) ) {
    				style_checkbox.prop( 'checked', false );
    			} else {
    				style_checkbox.prop( 'checked', true );

                    if( style_checkbox.val() == 'uppercase' ) {
                        $( this ).siblings('.taproot-font-value-capitalize').removeClass('taproot-font-style-checked').find('input').prop( 'checked', false ).change();

                    } else if( style_checkbox.val() == 'capitalize' ) {
                        $( this ).siblings('.taproot-font-value-uppercase').removeClass('taproot-font-style-checked').find('input').prop( 'checked', false ).change();
                    }
    			}

    			style_checkbox.change();
    		});

        }; // end fontStyles


        // method for range slider controls
        var rangeSlider = function() {

            $( 'input[type=range]' ).on( 'mousedown', function() {
    			var $range = $(this),
    				$range_input = $range.parent().children( '.taproot-range-input' );

    			var value = $( this ).attr( 'value' );
    			$range_input.val( value );

    			$( this ).mousemove(function() {
    				value = $( this ).attr( 'value' );
    				$range_input.val( value );
    			});
    		});

    		var rangeTimeout;

    		function adjustRangeValue( input_number, timeout ) {
    			var $range_input = input_number,
    			$range       = $range_input.parent().find('input[type="range"]'),
    			value        = parseFloat( $range_input.val() ),
    			reset        = parseFloat( $range.attr('data-reset_value') ),
    			step         = parseFloat( $range_input.attr('step') ),
    			min          = parseFloat( $range_input.attr('min') ),
    			max          = parseFloat( $range_input.attr('max') );

    			clearTimeout( rangeTimeout );

    			rangeTimeout = setTimeout( function() {
    				if( isNaN( value ) ) {
    					$range_input.val( reset );
    					$range.val( reset ).trigger( 'change' );
    					return;
    				}

    				if( step >= 1 && value % 1 !== 0 ) {
    					value = Math.round( value );
    					$range_input.val( value );
    					$range.val( value );
    				}

    				if( value > max ) {
    					$range_input.val( max );
    					$range.val( max ).trigger( 'change' );
    				}

    				if( value < min ) {
    					$range_input.val( min );
    					$range.val( min ).trigger( 'change' );
    				}
    			}, timeout );

    			$range.val( value ).trigger( 'change' );
    		}

    		$('input.taproot-range-input').on( 'change keyup', function() {
    			adjustRangeValue( $(this), 1000 );
    		}).on( 'focusout', function() {
    			adjustRangeValue( $(this), 0 );
    		});


            $( '.taproot_reset_slider' ).click( function () {
    			var $this_input = $( this ).closest( 'label' ).find( 'input' ),
    				input_name = $this_input.data( 'customize-setting-link' ),
    				input_default = $this_input.data( 'reset_value' );

    			$this_input.val( input_default );
    			$this_input.change();
    		});

        }; // end range slider


        // utilty for mobilebar controls
        var mobilebarControl = function( layoutSelect, mobilebarCheckbox ){

            if( 'stacked' == layoutSelect.val() ){
                mobilebarCheckbox.prop( 'checked', true ).prop( 'disabled', true );
            }

            layoutSelect.on( 'change', function(){

                if( 'stacked' == layoutSelect.val() ){
                    mobilebarCheckbox.prop( 'checked', true ).trigger( 'change' ).prop( 'disabled', true );
                }
                else {
                    mobilebarCheckbox.prop( 'disabled', false );
                }
            });

        }; // end mobilebarControl


        // method that opens device specific section and updates preview classes
        var updatePreview = function(){

            // only do this in responsive panels
            if( ! $( '.current-panel' ).hasClass( 'control-panel-responsive' ) ) return false;

            var device = rootstrap.getCurrentDevice();
            var section = $( '.current-panel .control-section-responsive-' + device );
            var sectionId = section.attr('id').replace( 'accordion-section-', '' );

            api.section( sectionId ).focus();

            api.previewedDevice.set( device );

        }; // end updatePreview


        // method that is run when triggerScroll function is called from within the preview
        var toggleTabs = function(){

            // get the current section
            var currentSection = $( '.accordion-section.open' );

            // if no sections are open, return
            if( ! currentSection ) return;

            // look for tabs in the current section
            var tabs = currentSection.find( '.rootstrap-tabs-wrapper' );

            // if section has no tabs, return
            if( ! tabs ) return;

            // section has tabs, so get the id
            var currentSectionId = currentSection.attr( 'id' );

            // do these tabs have a scroll trigger?
            var trigger = hasTrigger( currentSectionId );

            // if not, we're done here
            if( ! trigger ) return;

            var iframeHeader = $( '#customize-preview iframe' ).contents().find( '#header' );
            var defaultControl = tabs.find( 'a.root-tab' );
            var fixedControl = defaultControl.next();

            // if fixed header
            if( iframeHeader.hasClass( 'fixed' ) ) {
                fixedControl.trigger( 'click' );
            }
            // if not fixed header
            else {
                defaultControl.trigger( 'click' );
            }

        }; // end toggleTabs


        // returns a boolean value: should tabs react to fixed header scroll trigger?
        var hasTrigger = function( currentSection = false ){

            if( ! currentSection ) return false;

            // get current preview screen name
            var currentScreen = rootstrap.getCurrentDevice();

            // if a branding laptop section is open
            if( currentSection == 'accordion-section-branding_laptop'
                || currentSection == 'accordion-section-branding_laptop[tab-2]' ) {
                if( currentScreen == 'laptop' ) return true;
            }

            // if a branding laptop section is open
            else if( currentSection == 'accordion-section-branding_desktop'
                || currentSection == 'accordion-section-branding_desktop[tab-2]' ) {
                if( currentScreen == 'desktop' ) return true;
            }

            // if top nav section is open
            else if( currentSection == 'accordion-section-et_divi_header_secondary'
                || currentSection == 'accordion-section-taproot_top_nav_fixed') {
                return true;
            }

            // if header nav section is open
            else if( currentSection == 'accordion-section-et_divi_header_primary'
                || currentSection == 'accordion-section-et_divi_header_fixed') {
                return true;
            }

            // otherwise, return false
            return false;
        };


        // controller method for this module
        var run = function(){

            // setup our attributes
            api = wp.customize;
            rootstrap = rootstrapControls;

            // if not defined, return
            if( ! rootstrap || ! api ) return false;

            // run these methods
            preview();
            branding();
            rangeSlider();
            fontStyles();

            // toggle fixed header branding tabs - called from within preview
            // see Taproot_Customizer()->customize_preview_footer_scripts()
            window.toggleBrandingTabs = function(){
                toggleTabs();
            };

        }; // end run


        // define public methods
        return {
            run: run,
        };

    })(); // taprootCustomizer

    $(document).ready(function(){

        // run our main customizer module
        taprootCustomizer.run();

    }); // end doc ready

})( jQuery );
