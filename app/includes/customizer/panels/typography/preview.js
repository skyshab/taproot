/**
 * Theme Customizer functionality for the typography panel
 */
( function( $ ) {

    var rootstrap = rootstrapPreview;
    var devices = rootstrap.getDeviceList();

    // Setting: Body Font Family
    wp.customize( 'taproot_body_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_body_font',
                styles: 'body { font-family: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Text Color
    wp.customize( 'taproot_text_color', function( value ) {
        value.bind( function( to ) {
            $('body').css('color', to);
        });
    });

    // Setting: Line Height
    wp.customize( 'taproot_line_height', function( value ) {
        value.bind( function( to ) {
            $('body').css('line-height', to);
            rootstrap.style({
                id: 'taproot_line_height',
                styles: 'p, ul, ol, hr, pre, blockquote { margin-bottom: {{value}}em; }',
                value: to
            });
        });
    });


    // Setting: Headings Font
    wp.customize( 'taproot_heading_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_heading_font',
                styles: 'h1, h2, h3, h4, h5, h6 { font-family: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Heading Color
    wp.customize( 'taproot_heading_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_heading_color',
                device: 'default',
                styles: 'h1, h2, h3, h4, h5, h6 { color: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Headings Line Height
    wp.customize( 'taproot_heading_line_height', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_heading_line_height',
                device: 'default',
                styles: 'h1, h2, h3, h4, h5, h6 { line-height: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Headings Font Style
    wp.customize( 'taproot_heading_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_heading_font_style',
                device: 'default',
                styles: 'h1, h2, h3, h4, h5, h6 {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });

    // Setting: Post Title Font
    wp.customize( 'taproot_post_title_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_post_title_font',
                styles: '.post-title { font-family: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Post Title Color
    wp.customize( 'taproot_post_title_color', function( value ) {
        value.bind( function( to ) {
            $('.post-title').css('color', to);
        });
    });

    // Setting: Post Title Line Height
    wp.customize( 'taproot_title_line_height', function( value ) {
        value.bind( function( to ) {
            $('.post-title').css('line-height', to);
        });
    });

    // Setting: Post Title Font Style
    wp.customize( 'taproot_title_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_title_font_style',
                device: 'default',
                styles: '.post-title {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });


    // loop through all the devices
    $.each( devices, function( i, device ) {

        var deviceControl = device.replace('-', '_'),
            screen = device + '-and-up';


        // text font size
        wp.customize( 'taproot_font_size_' + deviceControl, function( value ) {
            value.bind( function( to ) {
                rootstrap.style({
                    id: 'taproot_font_size_' + deviceControl,
                    device: screen,
                    styles: 'body { font-size: {{value}}px; }',
                    value: to
                });
            });
        });

        // heading font size
        wp.customize( 'taproot_heading_font_size_' + deviceControl, function( value ) {
            value.bind( function( to ) {
                rootstrap.style({
                    id: 'taproot_heading_font_size_' + deviceControl,
                    device: screen,
                    styles: taprootHeadingStyles( to ),
                    value: to
                });
            });
        });

        // title font size
        wp.customize( 'taproot_post_title_font_size_' + deviceControl, function( value ) {
            value.bind( function( to ) {
                rootstrap.style({
                    id: 'taproot_post_title_font_size_' + deviceControl,
                    device: screen,
                    styles: '.post-title { font-size: {{value}}em; }',
                    value: to
                });
            });
        });

        // sidebar layout controls
        if( 'laptop' == device || 'desktop' == device ) {

            // text font size
            wp.customize( 'taproot_sidebar_layout_font_size_' + deviceControl, function( value ) {
                value.bind( function( to ) {
                    rootstrap.style({
                        id: 'taproot_sidebar_layout_font_size_' + deviceControl,
                        device: screen,
                        styles: '.sidebar, .sidebar + main { font-size: {{value}}px; }',
                        value: to
                    });
                });
            });

            // heading font size
            wp.customize( 'taproot_sidebar_layout_heading_font_size_' + deviceControl, function( value ) {
                value.bind( function( to ) {
                    rootstrap.style({
                        id: 'taproot_sidebar_layout_heading_font_size_' + deviceControl,
                        device: screen,
                        styles: taprootHeadingStyles( to, true ),
                        value: to
                    });
                });
            });

            // title font size
            wp.customize( 'taproot_sidebar_layout_post_title_font_size_' + deviceControl, function( value ) {
                value.bind( function( to ) {
                    rootstrap.style({
                        id: 'taproot_sidebar_layout_post_title_font_size_' + deviceControl,
                        device: screen,
                        styles: '.sidebar + main .post-title { font-size: {{value}}em; }',
                        value: to
                    });
                });
            });

            // Sidebar font size
            wp.customize( 'taproot_sidebar_layout_sidebar_font_size_' + deviceControl, function( value ) {
                value.bind( function( to ) {
                    rootstrap.style({
                        id: 'taproot_sidebar_layout_sidebar_font_size_' + deviceControl,
                        device: screen,
                        styles: '.sidebar .widget-group { font-size: {{value}}em; }',
                        value: to
                    });
                });
            });            


        } // end laptop/dektop only


    }); // end each device

} )( jQuery );
