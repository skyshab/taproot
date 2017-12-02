/**
 * Theme Customizer functionality for the branding panel
 */
( function( $ ) {

    var rootstrap = rootstrapPreview;

    // title controls
    var taprootTitleControls = [
        'title_font_size_mobile',
        'title_spacing_mobile',
        'title_line_height_mobile',
        'title_font_size_mobile_landscape',
        'title_spacing_mobile_landscape',
        'title_line_height_mobile_landscape',
        'title_font_size_tablet',
        'title_spacing_tablet',
        'title_line_height_tablet',
        'title_font_size_laptop',
        'title_spacing_laptop',
        'title_line_height_laptop',
        'title_font_size_desktop',
        'title_spacing_desktop',
        'title_line_height_desktop',
        'title_font_size_laptop_fixed',
        'title_spacing_laptop_fixed',
        'title_line_height_laptop_fixed',
        'title_font_size_desktop_fixed',
        'title_spacing_desktop_fixed',
        'title_line_height_desktop_fixed',
        'hide_site_title_laptop_fixed',
        'hide_site_title_desktop_fixed'
    ];

    // // display title
    wp.customize( 'taproot_display_title', function( value ) {
        value.bind( function( to ) {
            if(to == 1) {
                $('.site-title').show();
                $('#branding').addClass('has-titles show-site-title').removeClass('no-site-title no-titles');

                // show all title controls
                taprootTitleControls.forEach(function(item){
                    if( parent.wp.customize.control('taproot_' + item) ){
                        parent.wp.customize.control('taproot_' + item).activate();
                    }
                })

            } else {
                $('.site-title').hide();

                if( $('.site-description').is(':hidden') ){
                    $('#branding').removeClass('has-titles').addClass('no-titles');
                }

                $('#branding').removeClass('show-site-title').addClass('no-site-title');

                // hide all title controls
                taprootTitleControls.forEach(function(item){
                    if( parent.wp.customize.control('taproot_' + item) ) {
                        parent.wp.customize.control('taproot_' + item).deactivate();
                    }
                })
            }
        });
    });

    wp.customize( 'taproot_site_title_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_site_title_font',
                styles: '.site-title { font-family: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_font_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-title' ).css( 'color', to );
        });
    });

    wp.customize( 'taproot_title_font_color_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-font-color-fixed',
                device: 'laptop-and-up',
                styles: '#header.fixed .site-title { color: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Title Font Style
    wp.customize( 'taproot_site_title_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_site_title_font_style',
                device: 'default',
                styles: '.site-title {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });


    // tagline controls
    var taprootTaglineControls = [
        'tagline_font_size_mobile',
        'tagline_spacing_mobile',
        'tagline_line_height_mobile',
        'tagline_top_margin_mobile',
        'tagline_font_size_mobile_landscape',
        'tagline_spacing_mobile_landscape',
        'tagline_line_height_mobile_landscape',
        'tagline_top_margin_mobile_landscape',
        'tagline_font_size_tablet',
        'tagline_spacing_tablet',
        'tagline_line_height_tablet',
        'tagline_top_margin_tablet',
        'tagline_font_size_laptop',
        'tagline_spacing_laptop',
        'tagline_line_height_laptop',
        'tagline_top_margin_laptop',
        'tagline_font_size_desktop',
        'tagline_spacing_desktop',
        'tagline_line_height_desktop',
        'tagline_top_margin_desktop',
        'tagline_font_size_laptop_fixed',
        'tagline_spacing_laptop_fixed',
        'tagline_line_height_laptop_fixed',
        'tagline_top_margin_laptop_fixed',
        'tagline_font_size_desktop_fixed',
        'tagline_spacing_desktop_fixed',
        'tagline_line_height_desktop_fixed',
        'tagline_top_margin_desktop_fixed',
        'hide_site_tagline_laptop_fixed',
        'hide_site_tagline_desktop_fixed'
    ];


    // display tagline
    wp.customize( 'taproot_display_tagline', function( value ) {
        value.bind( function( to ) {
            if(to == 1) {
                $( ".site-description" ).show();
                $('#branding').removeClass('no-tagline no-titles').addClass('has-titles show-tagline');

                // show all tagline controls
                taprootTaglineControls.forEach(function(item){
                    if( parent.wp.customize.control('taproot_' + item) ){
                        parent.wp.customize.control('taproot_' + item).activate();
                    }
                });

            } else {
                $('.site-description').hide();

                if( $('.site-title').is(':hidden') ){
                    $('#branding').removeClass('has-titles').addClass('no-titles');
                }

                $('#branding').removeClass('show-tagline').addClass('no-tagline');

                // hide all tagline controls
                taprootTaglineControls.forEach(function(item){
                    if( parent.wp.customize.control('taproot_' + item) ){
                        parent.wp.customize.control('taproot_' + item).deactivate();
                    }
                });
            }
        });
    });

    wp.customize( 'taproot_site_tagline_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_site_tagline_font',
                styles: '.site-description { font-family: {{value}}; }',
                value: to
            });
        });
    });

    // tagline color
    wp.customize( 'taproot_tagline_font_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        });
    });

    // tagline color fixed
    wp.customize( 'taproot_tagline_font_color_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-font-color-fixed',
                device: 'laptop-and-up',
                styles: '#header.fixed .site-description { color: {{value}}; }',
                value: to
            });
        });
    });


    // Setting: Tagline Font Style
    wp.customize( 'taproot_tagline_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_tagline_font_style',
                device: 'default',
                styles: '.site-description {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });


    // mobile branding layout
    wp.customize( 'taproot_branding_layout_mobile', function( value ) {
        value.bind( function( to ) {

            if('stacked' == to) {
                $('#header-content').removeClass('m-spread').addClass('m-stacked');
            } else if('spread' == to) {
                $('#header-content').removeClass('m-stacked').addClass('m-spread');
            }

        });
    });

    // mobile landscape branding layout
    wp.customize( 'taproot_branding_layout_mobile_landscape', function( value ) {
        value.bind( function( to ) {

            if('stacked' == to) {
                $('#header-content').removeClass('ml-spread').addClass('ml-stacked');
            } else if('spread' == to) {
                $('#header-content').removeClass('ml-stacked').addClass('ml-spread');
            }

        });
    });

    // tablet branding layout
    wp.customize( 'taproot_branding_layout_tablet', function( value ) {
        value.bind( function( to ) {

            if('stacked' == to) {
                $('#header-content').removeClass('t-spread').addClass('t-stacked');
            } else if('spread' == to) {
                $('#header-content').removeClass('t-stacked').addClass('t-spread');
            }
        });
    });


    // gutter_spacing

    wp.customize( 'taproot_gutter_spacing_mobile', function( value ){
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-gutter-spacing',
                device: 'mobile',
                styles: '.header-nav__menu > .menu-item > a, .branding, .search-container { padding: {{value}}em 0; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_gutter_spacing_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-gutter-spacing',
                device: 'mobile-landscape-and-up',
                styles: '.header-nav__menu > .menu-item > a, .branding, .search-container { padding: {{value}}em 0; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_gutter_spacing_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-gutter-spacing',
                device: 'tablet-and-up',
                styles: '.header-nav__menu > .menu-item > a, .branding, .search-container { padding: {{value}}em 0; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_gutter_spacing_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-gutter-spacing',
                device: 'laptop-and-up',
                styles: '.header-nav__menu > .menu-item > a, .branding, .search-container { padding: {{value}}em 0; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_gutter_spacing_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-gutter-spacing',
                device: 'desktop',
                styles: '.header-nav__menu > .menu-item > a, .branding, .search-container { padding: {{value}}em 0; }',
                value: to
            });
        });
    });


    // logo gutter

    wp.customize( 'taproot_logo_gutter_mobile', function( value ){
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-gutter',
                device: 'mobile',
                styles: '.m-spread .logo-wrapper { margin-right: {{value}}em; } .m-stacked .has-titles .logo-wrapper { margin-bottom: {{value}}em; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_logo_gutter_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-gutter',
                device: 'mobile-landscape',
                styles: '.ml-spread .logo-wrapper { margin-right: {{value}}em; } .ml-stacked .has-titles .logo-wrapper { margin-bottom: {{value}}em; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_logo_gutter_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-gutter',
                device: 'tablet',
                styles: '.t-spread .logo-wrapper { margin-right: {{value}}em; } .t-stacked .has-titles .logo-wrapper { margin-bottom: {{value}}em; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_logo_gutter_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-gutter',
                device: 'laptop-and-up',
                styles: '#branding .logo-wrapper, #branding .title-wrapper { margin-right: {{value}}em; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_logo_gutter_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-gutter',
                device: 'desktop',
                styles: '#branding .logo-wrapper, #branding .title-wrapper { margin-right: {{value}}em; }',
                value: to
            });
        });
    });


 


    // logo_height

    wp.customize( 'taproot_logo_height_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-height',
                device: 'mobile',
                styles: '.logo-wrapper #logo, .logo-wrapper svg { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_logo_height_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-height',
                device: 'mobile-landscape',
                styles: '.logo-wrapper #logo, .logo-wrapper svg { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_logo_height_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-height',
                device: 'tablet',
                styles: '.logo-wrapper #logo, .logo-wrapper svg { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_logo_height_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-height',
                device: 'laptop',
                styles: '.logo-wrapper #logo, .logo-wrapper svg { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_logo_height_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-height',
                device: 'desktop',
                styles: '.logo-wrapper #logo, .logo-wrapper svg { font-size: {{value}}px; }',
                value: to
            });
        });
    });


    // title_font_size

    wp.customize( 'taproot_title_font_size_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-font-size',
                device: 'mobile',
                styles: '.site-title { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_font_size_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-font-size',
                device: 'mobile-landscape',
                styles: '.site-title { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_font_size_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-font-size',
                device: 'tablet',
                styles: '.site-title { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_font_size_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-font-size',
                device: 'laptop',
                styles: '.site-title { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_font_size_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-font-size',
                device: 'desktop',
                styles: '.site-title { font-size: {{value}}px; }',
                value: to
            });
        });
    });


    // title_spacing

    wp.customize( 'taproot_title_spacing_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-spacing',
                device: 'mobile',
                styles: '.site-title { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_spacing_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-spacing',
                device: 'mobile-landscape',
                styles: '.site-title { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_spacing_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-spacing',
                device: 'tablet',
                styles: '.site-title { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_spacing_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-spacing',
                device: 'laptop',
                styles: '.site-title { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_spacing_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-spacing',
                device: 'desktop',
                styles: '.site-title { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });


    // title_line_height

    wp.customize( 'taproot_title_line_height_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_title_line_height',
                device: 'mobile',
                styles: '.site-title { line-height: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_line_height_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-line-height',
                device: 'mobile-landscape',
                styles: '.site-title { line-height: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_line_height_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-line-height',
                device: 'tablet',
                styles: '.site-title { line-height: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_line_height_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-line-height',
                device: 'laptop',
                styles: '.site-title { line-height: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_title_line_height_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-line-height-desktop',
                device: 'desktop',
                styles: '.site-title { line-height: {{value}}; }',
                value: to
            });
        });
    });


    // tagline_font_size

    wp.customize( 'taproot_tagline_font_size_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-font-size',
                device: 'mobile',
                styles: '.site-description { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_font_size_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-font-size',
                device: 'mobile-landscape',
                styles: '.site-description { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_font_size_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-font-size',
                device: 'tablet',
                styles: '.site-description { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_font_size_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-font-size',
                device: 'laptop',
                styles: '.site-description { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_font_size_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-font-size',
                device: 'desktop',
                styles: '.site-description { font-size: {{value}}px; }',
                value: to
            });
        });
    });


    // tagline_spacing

    wp.customize( 'taproot_tagline_spacing_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-spacing',
                device: 'mobile',
                styles: '.site-description { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_spacing_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-spacing',
                device: 'mobile-landscape',
                styles: '.site-description { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_spacing_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-spacing',
                device: 'tablet',
                styles: '.site-description { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_spacing_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-spacing',
                device: 'laptop',
                styles: '.site-description { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_spacing_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-spacing',
                device: 'desktop',
                styles: '.site-description { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });


    // tagline_line_height

    wp.customize( 'taproot_tagline_line_height_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-line-height',
                device: 'mobile',
                styles: '.site-description { line-height: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_line_height_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-line-height',
                device: 'mobile-landscape',
                styles: '.site-description { line-height: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_line_height_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-line-height',
                device: 'tablet',
                styles: '.site-description { line-height: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_line_height_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-line-height',
                device: 'laptop',
                styles: '.site-description { line-height: {{value}}; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_line_height_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-line-height',
                device: 'desktop',
                styles: '.site-description { line-height: {{value}}; }',
                value: to
            });
        });
    });

    // tagline_top_margin

    wp.customize( 'taproot_tagline_top_margin_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-top-margin',
                device: 'mobile',
                styles: '.site-description { margin-top: {{value}}em; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_top_margin_mobile_landscape', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-top-margin',
                device: 'mobile-landscape',
                styles: '.site-description { margin-top: {{value}}em; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_top_margin_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-top-margin',
                device: 'tablet',
                styles: '.site-description { margin-top: {{value}}em; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_top_margin_laptop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-top-margin',
                device: 'laptop',
                styles: '.site-description { margin-top: {{value}}em; }',
                value: to
            });
        });
    });

    wp.customize( 'taproot_tagline_top_margin_desktop', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-top-margin',
                device: 'desktop',
                styles: '.site-description { margin-top: {{value}}em; }',
                value: to
            });
        });
    });


// Fixed Header Styles


    // logo control laptop array
    var taprootLogoControlsLaptop = [
        'taproot_logo_height_laptop_fixed',
        'taproot_logo_gutter_laptop_fixed'
    ];


    // logo control desktop array
    var taprootLogoControlsDesktop = [
        'taproot_logo_height_desktop_fixed',
        'taproot_logo_gutter_desktop_fixed'
    ];



    // title control laptop array
    var taprootTitleControlsLaptop = [
        'taproot_title_spacing_laptop_fixed',
        'taproot_title_font_size_laptop_fixed',
        'taproot_title_line_height_laptop_fixed'
    ];

    // title control desktop array
    var taprootTitleControlsDesktop = [
        'taproot_title_spacing_desktop_fixed',
        'taproot_title_font_size_desktop_fixed',
        'taproot_title_line_height_desktop_fixed'
    ];



    // tagline control laptop array
    var taprootTaglineControlsLaptop = [
        'taproot_tagline_font_size_laptop_fixed',
        'taproot_tagline_spacing_laptop_fixed',
        'taproot_tagline_line_height_laptop_fixed',
        'taproot_tagline_top_margin_laptop_fixed'
    ];

    // tagline control desktop array
    var taprootTaglineControlsDesktop = [
        'taproot_tagline_font_size_desktop_fixed',
        'taproot_tagline_spacing_desktop_fixed',
        'taproot_tagline_line_height_desktop_fixed',
        'taproot_tagline_top_margin_desktop_fixed'
    ];


    // gutter spacing laptop fixed
    wp.customize( 'taproot_gutter_spacing_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-gutter-spacing-fixed',
                device: 'laptop',
                styles: '.fixed .header-nav__menu > .menu-item > a, .fixed .branding, .fixed .search-container { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
                value: to
            });
        });
    });

    // gutter spacing desktop fixed
    wp.customize( 'taproot_gutter_spacing_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-gutter-spacing-fixed',
                device: 'desktop',
                styles: '.fixed .header-nav__menu > .menu-item > a, .fixed .branding, .fixed .search-container { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
                value: to
            });
        });
    });

    // logo gutter laptop fixed
    wp.customize( 'taproot_logo_gutter_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-gutter',
                device: 'laptop-and-up',
                styles: '#header.fixed .logo-wrapper { margin-right: {{value}}em; }',
                value: to
            });
        });
    });

    // logo gutter desktop fixed
    wp.customize( 'taproot_logo_gutter_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-gutter',
                device: 'desktop',
                styles: '#header.fixed .logo-wrapper { margin-right: {{value}}em; }',
                value: to
            });
        });
    });

    // hide logo laptop fixed
    wp.customize( 'taproot_hide_logo_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            var style;
            if(to == 1) {
                style = 'none';

                // hide all title controls
                taprootLogoControlsLaptop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).deactivate();
                    }
                });
            } else {
                style = 'block';

                // show all title controls
                taprootLogoControlsLaptop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).activate();
                    }
                });
            }
            rootstrap.style({
                id: 'taproot-custom-hide-logo-fixed',
                device: 'laptop',
                styles: '#header.fixed .logo-wrapper { display: {{value}}; }',
                value: style
            });
        });
    });

    // hide logo desktop fixed
    wp.customize( 'taproot_hide_logo_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            var display;
            if(to == 1) {
                display = 'none';

                // hide all title controls
                taprootLogoControlsDesktop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).deactivate();
                    }
                });
            } else {
                display = 'block';

                // show all title controls
                taprootLogoControlsDesktop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).activate();
                    }
                });
            }
            rootstrap.style({
                id: 'taproot-custom-hide-logo-fixed',
                device: 'desktop',
                styles: '#header.fixed .logo-wrapper { display: {{value}}; }',
                value: display
            });
        });
    });

    // logo height laptop fixed
    wp.customize( 'taproot_logo_height_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-height-fixed',
                device: 'laptop',
                styles: '#header.fixed .logo-wrapper { max-height: {{value}}px; }',
                value: to
            });
        });
    });

    // logo height desktop fixed
    wp.customize( 'taproot_logo_height_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-logo-height-fixed',
                device: 'desktop',
                styles: '#header.fixed .logo-wrapper { max-height: {{value}}px; }',
                value: to
            });
        });
    });

    // hide site title laptop fixed
    wp.customize( 'taproot_hide_site_title_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            var display;
            if(to == 1) {
                display = 'none';

                // hide all title controls
                taprootTitleControlsLaptop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).deactivate();
                    }
                });
            } else {
                display = 'block';

                // show all title controls
                taprootTitleControlsLaptop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).activate();
                    }
                });
            }
            rootstrap.style({
                id: 'taproot-custom-hide-site-title-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-title { display: {{value}}; }',
                value: display
            });
        });
    });

    // hide site title desktop fixed
    wp.customize( 'taproot_hide_site_title_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            var display;
            if(to == 1) {
                display = 'none';

                // hide all title controls
                taprootTitleControlsDesktop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).deactivate();
                    }
                });
            } else {
                display = 'block';

                // show all title controls
                taprootTitleControlsDesktop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).activate();
                    }
                });
            }
            rootstrap.style({
                id: 'taproot-custom-hide-site-title-fixed',
                device: 'desktop',
                styles: '#header.fixed .site-title { display: {{value}}; }',
                value: display
            });
        });
    });

    // title font size laptop fixed
    wp.customize( 'taproot_title_font_size_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-font-size-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-title { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    // title font size desktop fixed
    wp.customize( 'taproot_title_font_size_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-font-size-fixed',
                device: 'desktop',
                styles: '#header.fixed .site-title { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    // title spacing laptop fixed
    wp.customize( 'taproot_title_spacing_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-spacing-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-title { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    // title spacing desktop fixed
    wp.customize( 'taproot_title_spacing_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-spacing-desktop',
                device: 'desktop',
                styles: '#header.fixed .site-title { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    // title line height laptop fixed
    wp.customize( 'taproot_title_line_height_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-line-height-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-title { line-height: {{value}}; }',
                value: to
            });
        });
    });

    // title line height desktop fixed
    wp.customize( 'taproot_title_line_height_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-line-height-fixed',
                device: 'desktop',
                styles: '#header.fixed .site-title { line-height: {{value}}; }',
                value: to
            });
        });
    });

    // hide site tagline laptop fixed
    wp.customize( 'taproot_hide_site_tagline_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            var display;
            if(to == 1) {
                display = 'none';

                // hide all tagline controls
                taprootTaglineControlsLaptop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).deactivate();
                    }
                });
            } else {
                display = 'block';

                // show all tagline controls
                taprootTaglineControlsLaptop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).activate();
                    }
                });
            }
            rootstrap.style({
                id: 'taproot-custom-hide-site-tagline-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-description { display: {{value}}; }',
                value: display
            });
        });
    });

    // hide site tagline desktop fixed
    wp.customize( 'taproot_hide_site_tagline_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            var display;
            if(to == 1) {
                display = 'none';

                // hide all tagline controls
                taprootTaglineControlsDesktop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).deactivate();
                    }
                });
            } else {
                display = 'block';

                // show all tagline controls
                taprootTaglineControlsDesktop.forEach(function(item){
                    if( parent.wp.customize.control(item) ){
                        parent.wp.customize.control(item).activate();
                    }
                });
            }
            rootstrap.style({
                id: 'taproot-custom-hide-site-tagline-fixed',
                device: 'desktop',
                styles: '#header.fixed .site-description { display: {{value}}; }',
                value: display
            });
        });
    });

    // tagline_font_size_laptop_fixed
    wp.customize( 'taproot_tagline_font_size_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_tagline-font-size-laptop-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-description { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    // tagline_font_size_desktop_fixed
    wp.customize( 'taproot_tagline_font_size_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-font-size-fixed',
                device: 'desktop',
                styles: '#header.fixed .site-description { font-size: {{value}}px; }',
                value: to
            });
        });
    });

    // tagline_spacing_laptop_fixed
    wp.customize( 'taproot_tagline_spacing_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-spacing-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-description { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    // tagline_spacing_desktop_fixed
    wp.customize( 'taproot_tagline_spacing_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-spacing-fixed',
                device: 'desktop',
                styles: '#header.fixed .site-description { letter-spacing: {{value}}px; }',
                value: to
            });
        });
    });

    // tagline_line_height_laptop_fixed
    wp.customize( 'taproot_tagline_line_height_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-line-height-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-description { line-height: {{value}}; }',
                value: to
            });
        });
    });

    // tagline_line_height_desktop_fixed
    wp.customize( 'taproot_tagline_line_height_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-line-height-fixed',
                device: 'desktop',
                styles: '#header.fixed .site-description { line-height: {{value}}; }',
                value: to
            });
        });
    });

    // tagline_top_margin_laptop_fixed
    wp.customize( 'taproot_tagline_top_margin_laptop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-top-margin-fixed',
                device: 'laptop',
                styles: '#header.fixed .site-description { margin-top: {{value}}em; }',
                value: to
            });
        });
    });

    // tagline_top_margin_desktop_fixed
    wp.customize( 'taproot_tagline_top_margin_desktop_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-top-margin-fixed',
                device: 'desktop',
                styles: '#header.fixed .site-description { margin-top: {{value}}em; }',
                value: to
            });
        });
    });

    // title_font_color_fixed
    wp.customize( 'taproot_title_font_color_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-title-color-fixed',
                device: 'laptop-and-up',
                styles: '#header.fixed .site-title { color: {{value}}; }',
                value: to
            });
        });
    });

    // tagline_font_color_fixed
    wp.customize( 'taproot_tagline_font_color_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-custom-tagline-color-fixed',
                device: 'laptop-and-up',
                styles: '#header.fixed .site-description { color: {{value}}; }',
                value: to
            });
        });
    });


} )( jQuery );
