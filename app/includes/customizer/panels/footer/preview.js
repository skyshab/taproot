/**
 * Theme Customizer functionality for the footer panel
 */
( function( $ ) {

    var rootstrap = rootstrapPreview;

    // Footer Styles

    // Footer Layout
    wp.customize( 'taproot_footer_layout', function( value ) {
        value.bind( function( to ) {
            $('#footer').removeClass('footer-layout-full footer-layout-halves footer-layout-one-third-two-thirds footer-layout-two-thirds-one-third footer-layout-thirds footer-layout-half-quarter-quarter footer-layout-quarter-quarter-half footer-layout-quarters').addClass( 'footer-layout-' + to );
        });
    });



    // Footer Style
    wp.customize( 'taproot_footer_style', function( value ) {
        value.bind( function( to ) {

            $('body').removeClass('footer-style-fixed footer-style-sticky').addClass( 'footer-style-' + to );

            if( to == 'fixed') {
                $('body.footer-style-fixed').css('padding-bottom', $('#footer').outerHeight(true));
                $('#footer').addClass('footer--style-fixed');
            }
            else if( $('body').hasClass('taproot-boxed-layout') ) {
                $('body').css('padding-bottom', $('body').css( 'padding-top' ));
                $('#footer').removeClass('footer--style-fixed');                
            }
            else {
                $('body').css('padding-bottom', '0');
                $('#footer').removeClass('footer--style-fixed');                 
            }
        });
    });



    // Fullwidth Footer
    wp.customize( 'taproot_footer_fullwidth', function( value ) {
        value.bind( function( to ) {
            $('#footer').toggleClass('footer--fullwidth');
        });
    });

    // Footer Container Padding
    wp.customize( 'taproot_footer_container_padding', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-footer-container-padding',
                device: 'default',
                styles: '#footer .footer-widgets { padding: {{value}}% 0; }',
                value: to
            });
        });
    });

    // Footer Widget Gutter Spacing
    wp.customize( 'taproot_footer_gutter_spacing', function( value ) {
        value.bind( function( to ) {
            var halfTo = to / 2;
            var styles = '#footer .footer-widgets { margin-left: -' + to + 'em; }';
            styles += '#footer .footer-widgets .footer-sidebar { padding-left: ' + to + 'em; margin: ' + halfTo + 'em 0; }';
            styles += '.main-footer .footer-widget { margin-bottom: ' + to + 'em; }';

            rootstrap.style({
                id: 'taproot-footer-gutter-spacing',
                device: 'default',
                styles: styles,
                value: to
            });
        });
    });

    // background color
    wp.customize( 'taproot_footer_background_color', function( value ) {
        value.bind( function( to ) {
            $('#footer').css( 'background-color', to );
        });
    });

    // Footer Widget Heading Color
    wp.customize( 'taproot_footer_widget_heading_color', function( value ) {
        value.bind( function( to ) {
            $('.footer-widgets h1, .footer-widgets h2, .footer-widgets h3, .footer-widgets h4, .footer-widgets h5, .footer-widgets h6').css( 'color', to );
        });
    });

    // Footer Widget Title Font Size
    wp.customize( 'taproot_footer_widget_title_font_size', function( value ) {
        value.bind( function( to ) {
            $('.footer-widgets .widget-title').css( 'font-size', to + 'em' );
        });
    });

    // Footer Widget Text Color
    wp.customize( 'taproot_footer_widget_text_color', function( value ) {
        value.bind( function( to ) {
            $('.footer-widgets .widget').css( 'color', to );
        });
    });

    // Footer Widget Text Font Size
    wp.customize( 'taproot_footer_widget_font_size', function( value ) {
        value.bind( function( to ) {
            $('.footer-widgets .widget').css( 'font-size', to + 'px' );
        });
    });

    // Footer Widget Link Color
    wp.customize( 'taproot_footer_widget_link_color', function( value ) {
        value.bind( function( to ) {
            $('.footer-widgets .widget a').css( 'color', to );
        });
    });


    // bottom bar styles

    // bottom bar background color
    wp.customize( 'taproot_bottom_bar_background_color', function( value ) {
        value.bind( function( to ) {
            $('#footer .bottom-bar').css( 'background', to );
        });
    });

    // bottom bar text color
    wp.customize( 'taproot_bottom_bar_text_color', function( value ) {
        value.bind( function( to ) {
            $('#footer .bottom-bar-content').css( 'color', to );
        });
    });


    // font size
    wp.customize( 'taproot_bottom_bar_font_size', function( value ) {
        value.bind( function( to ) {
            $('#footer .bottom-bar-content').css( 'font-size', to + 'px' );
        });
    });

    // height
    wp.customize( 'taproot_bottom_bar_height', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-bottom-bar-height',
                styles: '#footer .bottom-bar-content { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
                value: to
            });
        });
    });

} )( jQuery );
