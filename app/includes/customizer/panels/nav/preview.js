/**
 * Theme Customizer functionality for the navigation panel
 */
( function( $ ) {

    var rootstrap = rootstrapPreview;

    // utility for working with mobile nav classes
    // built when nav classes applied to body. Needs to change to each nav
    function toggleNavClasses( nav, type ) {
        var navClasses,
            classPrefix = nav,
            body = $('body'),
            types = ['fullscreen', 'slide', 'dropdown-fade', 'dropdown-slide'];

        navClasses = classPrefix + '--fullscreen ';
        navClasses += classPrefix + '--slide ';
        navClasses += classPrefix + '--dropdown-fade ';
        navClasses += classPrefix + '--dropdown-slide ';

        $('body').removeClass(navClasses);

        if( $.inArray( type, types ) >= 0 ) {
            body.addClass( classPrefix + '--' + type );
        }
    }

// Navbar

    // background color
    wp.customize( 'taproot_navbar_background', function( value ) {
        value.bind( function( to ) {
            $('#taproot-navbar').css( 'background', to );
        });
    });


    wp.customize( 'taproot_navbar_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_navbar_font',
                styles: '#taproot-navbar { font-family: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Post Title Font Style
    wp.customize( 'taproot_navbar_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_navbar_font_style',
                device: 'default',
                styles: '#taproot-navbar .menu-item a {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });

    // font size
    wp.customize( 'taproot_navbar_font_size', function( value ) {
        value.bind( function( to ) {
            $('#taproot-navbar').css( 'font-size', to + 'px' );
        });
    });

    // menu item color
    wp.customize( 'taproot_navbar_menu_item_color', function( value ) {
        value.bind( function( to ) {
            $('#taproot-navbar .menu-item').css( 'color', to );
        });
    });

    // menu item color: hover
    wp.customize( 'taproot_navbar_menu_item_color_hover', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp, false );
            rootstrap.style({
                id: 'taproot_navbar_menu_item_color_hover',
                device: screen,
                styles: '#taproot-navbar .menu-item:hover a { color: {{value}}; }',
                value: to
            });
        });
    });


    // submenu bkg color
    wp.customize( 'taproot_navbar_submenu_bkg_color', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp, false );

            rootstrap.style({
                id: 'taproot_navbar_submenu_bkg_color',
                device: screen,
                styles: '.navbar__menu .sub-menu { border-color: {{value}}; background-color: {{value}};}',
                value: to
            });
        });
    });

    // submenu item color
    wp.customize( 'taproot_navbar_submenu_item_color', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp, false );

            rootstrap.style({
                id: 'taproot_navbar_submenu_item_color',
                device: screen,
                styles: '.navbar__menu .sub-menu .menu-item > a { color: {{value}}; }',
                value: to
            });
        });
    });

    // submenu item color Hover
    wp.customize( 'taproot_navbar_submenu_item_color_hover', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp, false );

            rootstrap.style({
                id: 'taproot_navbar_submenu_item_color_hover',
                device: screen,
                styles: '.navbar__menu .sub-menu .menu-item:hover > a { color: {{value}}; }',
                value: to
            });
        });
    });

    // Navbar has pointers
    wp.customize( 'taproot_navbar_enable_dropdown_pointers', function( value ) {
        value.bind( function( to ) {

            if(to) {
                $('#taproot-navbar').addClass('has-pointers');
            }
            else {
                $('#taproot-navbar').removeClass('has-pointers');
            }
        });
    });

    // navbar height
    wp.customize( 'taproot_navbar_height', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-navbar-height',
                device: 'laptop-and-up',
                styles: '#taproot-navbar .menu > .menu-item > a { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
                value: to
            });
        });
    });

    // navbar menu item spacing
    wp.customize( 'taproot_navbar_item_spacing', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-navbar-item-spacing',
                device: 'laptop-and-up',
                styles: '#taproot-navbar .menu > .menu-item > a { padding-left: {{value}}em; padding-right: {{value}}em; }',
                value: to
            });
        });
    });


    // navbar menu item alignment
    wp.customize( 'taproot_navbar_align', function( value ) {
        value.bind( function( to ) {

            $('#taproot-navbar').removeClass('nav-align-left nav-align-right nav-align-center nav-align-fill').addClass( 'nav-align-' + to );

        });
    });


    // mobile navbar styles


    // Navbar mobile nav breakpoint
    wp.customize( 'taproot_navbar_mobile_breakpoint', function( value ) {
        value.bind( function( to ) {
            $('body').removeClass('navbar-bp-none navbar-bp-m navbar-bp-ml navbar-bp-t navbar-bp-l navbar-bp-always').addClass( 'navbar-' + to );
        });
    });


    // Navbar Hide on Mobile 
    wp.customize( 'taproot_navbar_hide_when_mobile', function( value ) {
        value.bind( function( to ) {
            if( to ){
                $('#taproot-navbar').addClass( 'taproot-nav-hidden-when-mobile');
            }
            else {
                $('#taproot-navbar').removeClass( 'taproot-nav-hidden-when-mobile');
            }
        });
    });
    

    // Navbar Hide on Desktop
    wp.customize( 'taproot_navbar_hide_when_not_mobile', function( value ) {
        value.bind( function( to ) {
            if( to ){
                $('#taproot-navbar').addClass( 'taproot-nav-hidden-when-not-mobile');
            }
            else {
                $('#taproot-navbar').removeClass( 'taproot-nav-hidden-when-not-mobile');
            }
        });
    });     


    // Navbar Type
    wp.customize( 'taproot_navbar_nav_type', function( value ) {
        value.bind( function( to ) {
            toggleNavClasses( 'navbar', to );
            $('#taproot-navbar .menu').css({'right' : '', 'left' : '', 'top' : ''});
        });
    });


    // mobile icon color
    wp.customize( 'taproot_navbar_mobile_icon_color', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );

            rootstrap.style({
                id: 'taproot-navbar-mobile-icon-color',
                device: screen,
                styles: '#taproot-navbar .label-toggle { color: {{value}}; }',
                value: to
            });
        });
    });

    // mobile icon size
    wp.customize( 'taproot_navbar_mobile_icon_size', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );

            rootstrap.style({
                id: 'taproot-navbar-height',
                device: screen,
                styles: '#taproot-navbar .label-toggle { font-size: {{value}}em; }',
                value: to
            });
        });
    });

    // mobile navbar height
    wp.customize( 'taproot_navbar_height_mobile', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );

            rootstrap.style({
                id: 'taproot-navbar-height-mobile',
                device: screen,
                styles: '#taproot-navbar .label-toggle { margin: {{value}}em 0; }',
                value: to
            });
        });
    });


    // Navbar Mobile Menubar Background Color
    wp.customize( 'taproot_navbar_mobile_dropdown_bkg', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );

            rootstrap.style({
                id: 'taproot-navbar-mobile-dropdown-bkg',
                device: screen,
                styles: '#taproot-navbar .menu { background-color: {{value}}; }',
                value: to
            });

        });
    });


    // Navbar Mobile Menubar Separator Color
    wp.customize( 'taproot_navbar_mobile_separator_color', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance( 'taproot_navbar_mobile_breakpoint' ).get();
            var screen = getScreenFromBp( navbarBp );
            rootstrap.style({
                id: 'taproot_navbar_mobile_separator_color',
                device: screen,
                styles: '#taproot-navbar .menu-item { border-color: {{value}}; }',
                value: to
            });
        });
    });


    // Navbar Mobile Menu Item Height
    wp.customize( 'taproot_navbar_mobile_dropdown_item_height', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );
            rootstrap.style({
                id: 'taproot_navbar_mobile_dropdown_item_height',
                device: screen,
                styles: '#taproot-navbar .menu-item a { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
                value: to
            });
        });
    });


    // Navbar Mobile Menu Item Padding
    wp.customize( 'taproot_navbar_mobile_dropdown_item_padding', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );
            rootstrap.style({
                id: 'taproot_navbar_mobile_dropdown_item_padding',
                device: screen,
                styles: '#taproot-navbar .menu-item a { padding-left: {{value}}em; padding-right: {{value}}em; }',
                value: to
            });
        });
    });


    // Navbar Mobile Menubar Text Color
    wp.customize( 'taproot_navbar_mobile_dropdown_text_color', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );

            rootstrap.style({
                id: 'taproot-navbar-mobile-dropdown-text-color',
                device: screen,
                styles: '#taproot-navbar .menu-item a { color: {{value}}; }',
                value: to
            });

        });
    });

    // Navbar Mobile Menubar Background Color: Hover
    wp.customize( 'taproot_navbar_mobile_dropdown_bkg_hover', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );

            rootstrap.style({
                id: 'taproot-navbar-mobile-dropdown-bkg-hover',
                device: screen,
                styles: '#taproot-navbar .menu-item:hover { background-color: {{value}}; }',
                value: to
            });
        });
    });

    // Navbar Mobile Menubar Text Color: Hover
    wp.customize( 'taproot_navbar_mobile_dropdown_text_color_hover', function( value ) {
        value.bind( function( to ) {
            var navbarBp = wp.customize.instance('taproot_navbar_mobile_breakpoint').get();
            var screen = getScreenFromBp( navbarBp );

            rootstrap.style({
                id: 'taproot-navbar-mobile-dropdown-text-color-hover',
                device: screen,
                styles: '#taproot-navbar .menu-item:hover a { color: {{value}}; }',
                value: to
            });
        });
    });


    // fixed styles

    // Show Navbar when fixed
    wp.customize( 'taproot_navbar_display_when_fixed', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                rootstrap.style({
                    id: 'taproot-navbar-display-when-fixed',
                    device: 'laptop-and-up',
                    styles: '#header.fixed #taproot-navbar { display: block; }',
                });
            }
            else {
                rootstrap.style({
                    id: 'taproot-navbar-display-when-fixed',
                    device: 'laptop-and-up',
                    styles: '#header.fixed #taproot-navbar { display: none; }',
                });
            }
        });
    });


    // background color
    wp.customize( 'taproot_fixed_navbar_background', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_fixed_navbar_background',
                styles: '#header.fixed #taproot-navbar { background: {{value}}; }',
                value: to
            });            
        });
    });

    // menu item color
    wp.customize( 'taproot_fixed_navbar_menu_item_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_fixed_navbar_menu_item_color',
                styles: '#header.fixed #taproot-navbar .menu-item { color: {{value}}; }',
                value: to
            });            
        });
    });

    // menu item color: hover
    wp.customize( 'taproot_fixed_navbar_menu_item_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_fixed_navbar_menu_item_color_hover',
                styles: '#header.fixed #taproot-navbar .menu-item:hover a { color: {{value}}; }',
                value: to
            });
        });
    });


// Header Nav

// menu item color
wp.customize( 'taproot_header_nav_menu_item_color', function( value ) {
    value.bind( function( to ) {
        $('#taproot-header-nav .menu-item').css( 'color', to );
    });
});

// menu item color: hover
wp.customize( 'taproot_header_nav_menu_item_color_hover', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp, false );
        rootstrap.style({
            id: 'taproot_header_nav_menu_item_color_hover',
            device: screen,
            styles: '#taproot-header-nav .menu-item:hover a { color: {{value}}; }',
            value: to
        });
    });
});

// submenu bkg color
wp.customize( 'taproot_header_nav_submenu_bkg_color', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp, false );

        rootstrap.style({
            id: 'taproot_header_nav_submenu_bkg_color',
            device: screen,
            styles: '.header-nav__menu .sub-menu { border-color: {{value}}; background-color: {{value}}; }',
            value: to
        });
    });
});

// submenu item color
wp.customize( 'taproot_header_nav_submenu_item_color', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp, false );

        rootstrap.style({
            id: 'taproot_header_nav_submenu_item_color',
            device: screen,
            styles: '.header-nav__menu .sub-menu .menu-item > a { color: {{value}}; }',
            value: to
        });
    });
});

// submenu item color Hover
wp.customize( 'taproot_header_nav_submenu_item_color_hover', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp, false );

        rootstrap.style({
            id: 'taproot_header_nav_submenu_item_color_hover',
            device: screen,
            styles: '.header-nav__menu .sub-menu .menu-item:hover > a { color: {{value}}; }',
            value: to
        });
    });
});


// Header Nav has pointers
wp.customize( 'taproot_header_nav_enable_dropdown_pointers', function( value ) {
    value.bind( function( to ) {

        if(to) {
            $('#taproot-header-nav').addClass('has-pointers');
        }
        else {
            $('#taproot-header-nav').removeClass('has-pointers');
        }
    });
});


wp.customize( 'taproot_header_nav_font', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot_header_nav_font',
            styles: '#taproot-header-nav { font-family: {{value}}; }',
            value: to
        });
    });
});

// Setting: Header Nav Font Style
wp.customize( 'taproot_header_nav_font_style', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot_header_nav_font_style',
            device: 'default',
            styles: '#taproot-header-nav .menu-item a {' + taprootFontStyles(to) + '}',
            value: to
        });
    });
});

// font size
wp.customize( 'taproot_header_nav_font_size', function( value ) {
    value.bind( function( to ) {
        $('#taproot-header-nav').css( 'font-size', to + 'px' );
    });
});


// menu item height
wp.customize( 'taproot_header_nav_height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot_header_nav_height',
            device: 'laptop-and-up',
            styles: '#taproot-header-nav .menu-item a { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
            value: to
        });
    });
});

// menu item spacing
wp.customize( 'taproot_header_nav_item_spacing', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot_header_nav_item_spacing',
            device: 'laptop-and-up',
            styles: '#taproot-header-nav .menu-item a { padding-left: {{value}}em; padding-right: {{value}}em; }',
            value: to
        });
    });
});


// navbar menu item alignment
wp.customize( 'taproot_header_nav_align', function( value ) {
    value.bind( function( to ) {
        $('#taproot-header-nav').removeClass('nav-align-left nav-align-right nav-align-center nav-align-fill').addClass( 'nav-align-' + to );
    });
});


// Header Nav Mobile Styles


// Header Nav mobile nav breakpoint
wp.customize( 'taproot_header_nav_mobile_breakpoint', function( value ) {
    value.bind( function( to ) {
        $('body').removeClass('header-nav-bp-none header-nav-bp-m header-nav-bp-ml header-nav-bp-t header-nav-bp-l header-nav-bp-always').addClass( 'header-nav-' + to );
    });
});


// Header Nav Hide on Mobile 
wp.customize( 'taproot_header_nav_hide_when_mobile', function( value ) {
    value.bind( function( to ) {
        if( to ){
            $('#taproot-header-nav').addClass( 'taproot-nav-hidden-when-mobile');
        }
        else {
            $('#taproot-header-nav').removeClass( 'taproot-nav-hidden-when-mobile');
        }
    });
});  


// Header Nav Hide on Desktop
wp.customize( 'taproot_header_nav_hide_when_not_mobile', function( value ) {
    value.bind( function( to ) {
        if( to ){
            $('#taproot-header-nav').addClass( 'taproot-nav-hidden-when-not-mobile');
        }
        else {
            $('#taproot-header-nav').removeClass( 'taproot-nav-hidden-when-not-mobile');
        }
    });
}); 


// Header Nav Type
wp.customize( 'taproot_header_nav_type', function( value ) {
    value.bind( function( to ) {
        toggleNavClasses( 'header-nav', to );
        $('#taproot-header-nav .menu').css({'right' : '', 'left' : '', 'top' : ''});
    });
});


// header nav mobile icon size
wp.customize( 'taproot_header_nav_mobile_icon_size', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );

        rootstrap.style({
            id: 'taproot-header-nav-mobile-icon-size',
            device: screen,
            styles: '.header-nav .label-toggle { font-size: {{value}}em; }',
            value: to,
        });
    });
});


// header nav mobile icon color
wp.customize( 'taproot_header_nav_mobile_icon_color', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );

        rootstrap.style({
            id: 'taproot-header-nav-mobile-icon-color',
            device: screen,
            styles: '.header-nav .label-toggle { color: {{value}}; }',
            value: to,
        });
    });
});


// header nav mobile background color
wp.customize( 'taproot_header_nav_mobile_background', function( value ){
    value.bind( function( to ){
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );

        rootstrap.style({
            id: 'taproot-header-nav-mobile-background',
            device: screen,
            styles: '#taproot-header-nav .menu { background: {{value}}; }',
            value: to,
        });
    });
});


// Header Nav Mobile Menubar Separator Color
wp.customize( 'taproot_header_nav_mobile_separator_color', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance( 'taproot_header_nav_mobile_breakpoint' ).get();
        var screen = getScreenFromBp( headerNavBp );
        rootstrap.style({
            id: 'taproot_header_nav_mobile_separator_color',
            device: screen,
            styles: '#taproot-header-nav .menu-item { border-color: {{value}}; }',
            value: to
        });
    });
});

// header nav mobile item color
wp.customize( 'taproot_header_nav_mobile_item_color', function( value ){
    value.bind( function( to ){
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );

        rootstrap.style({
            id: 'taproot-header-nav-mobile-item-color',
            device: screen,
            styles: '#taproot-header-nav .menu-item a { color: {{value}}; }',
            value: to,
        });
    });
});


// Header Nav Mobile Menu Item Height
wp.customize( 'taproot_header_nav_mobile_dropdown_item_height', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );
        rootstrap.style({
            id: 'taproot_header_nav_mobile_dropdown_item_height',
            device: screen,
            styles: '#taproot-header-nav .menu-item a { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
            value: to
        });
    });
});


// Header Nav Mobile Menu Item Padding
wp.customize( 'taproot_header_nav_mobile_dropdown_item_padding', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );
        rootstrap.style({
            id: 'taproot_header_nav_mobile_dropdown_item_padding',
            device: screen,
            styles: '#taproot-header-nav .menu-item a { padding-left: {{value}}em; padding-right: {{value}}em; }',
            value: to
        });
    });
});


// Header Nav Mobile Menubar Text Color
wp.customize( 'taproot_header_nav_mobile_dropdown_text_color', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );

        rootstrap.style({
            id: 'taproot_header_nav_mobile_dropdown_text_color',
            device: screen,
            styles: '#taproot-header-nav .menu-item a { color: {{value}}; }',
            value: to
        });
    });
});


// Header Nav Mobile Menubar Background Color: Hover
wp.customize( 'taproot_header_nav_mobile_dropdown_bkg_hover', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );

        rootstrap.style({
            id: 'taproot_header_nav_mobile_dropdown_bkg_hover',
            device: screen,
            styles: '#taproot-header-nav .menu-item:hover { background-color: {{value}}; }',
            value: to
        });
    });
});


// Header Nav Mobile Menubar Text Color: Hover
wp.customize( 'taproot_header_nav_mobile_dropdown_text_color_hover', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp );

        rootstrap.style({
            id: 'taproot_header_nav_mobile_dropdown_text_color_hover',
            device: screen,
            styles: '#taproot-header-nav .menu-item:hover a { color: {{value}}; }',
            value: to
        });
    });
});


// Header Nav Mobile Menubar Background
wp.customize( 'taproot_header_nav_mobile_menubar_background', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot_header_nav_mobile_menubar_background',
            device: 'mobile',
            styles: '.m-stacked #taproot-header-nav { background-color: {{value}}; }',
            value: to
        });
        rootstrap.style({
            id: 'taproot_header_nav_mobile_menubar_background',
            device: 'mobile-landscape',
            styles: '.ml-stacked #taproot-header-nav { background-color: {{value}}; }',
            value: to
        });
        rootstrap.style({
            id: 'taproot_header_nav_mobile_menubar_background',
            device: 'tablet',
            styles: '.t-stacked #taproot-header-nav { background-color: {{value}}; }',
            value: to
        });
    });
});


// fixed styles


// Show Header Nav when fixed
wp.customize( 'taproot_header_nav_display_when_fixed', function( value ) {
    value.bind( function( to ) {
        if( to ) {
            rootstrap.style({
                id: 'taproot-header-nav-display-when-fixed',
                device: 'laptop-and-up',
                styles: '#header.fixed #taproot-header-nav { display: block; }',
            });
        }
        else {
            rootstrap.style({
                id: 'taproot-header-nav-display-when-fixed',
                device: 'laptop-and-up',
                styles: '#header.fixed #taproot-header-nav { display: none; }',
            });
        }
    });
});

// menu item color
wp.customize( 'taproot_header_nav_menu_item_color_fixed', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot-header-nav-menu-item-color-fixed',
            device: 'laptop-and-up',
            styles: '#header.fixed #header-content { color: {{value}}; }',
            value: to,
        });
    });
});

// menu item hover color
wp.customize( 'taproot_header_nav_menu_item_color_hover_fixed', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot_header_nav_menu_item_color_hover_fixed',
            device: 'laptop-and-up',
            styles: '#header.fixed #header-content .menu-item:hover a { color: {{value}}; }',
            value: to,
        });
    });
});


// font size
wp.customize( 'taproot_header_nav_font_size_fixed', function( value ) {
    value.bind( function( to ) {

        rootstrap.style({
            id: 'taproot-header-nav-font-size-fixed',
            device: 'laptop-and-up',
            styles: '#header.fixed #taproot-header-nav { font-size: {{value}}px; }',
            value: to,
        });

    });
});


// menu item height
wp.customize( 'taproot_header_nav_height_fixed', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot-header-nav-height',
            device: 'laptop-and-up',
            styles: '#header.fixed  #taproot-header-nav .menu-item a { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
            value: to
        });
    });
});

// menu item spacing
wp.customize( 'taproot_header_nav_item_spacing_fixed', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'taproot-header-nav-height',
            device: 'laptop-and-up',
            styles: '#header.fixed #taproot-header-nav .menu-item a { padding-left: {{value}}em; padding-right: {{value}}em; }',
            value: to
        });
    });
});


// submenu bkg color
wp.customize( 'taproot_header_nav_fixed_submenu_bkg_color', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp, false );

        rootstrap.style({
            id: 'taproot_header_nav_fixed_submenu_bkg_color',
            device: screen,
            styles: '#header.fixed .header-nav__menu .sub-menu { border-color: {{value}}; background-color: {{value}}; }',
            value: to
        });
    });
});

// submenu item color
wp.customize( 'taproot_header_nav_fixed_submenu_item_color', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp, false );

        rootstrap.style({
            id: 'taproot_header_nav_fixed_submenu_item_color',
            device: screen,
            styles: '#header.fixed .header-nav__menu .sub-menu .menu-item > a { color: {{value}}; }',
            value: to
        });
    });
});

// submenu item color Hover
wp.customize( 'taproot_header_nav_fixed_submenu_item_color_hover', function( value ) {
    value.bind( function( to ) {
        var headerNavBp = wp.customize.instance('taproot_header_nav_mobile_breakpoint').get();
        var screen = getScreenFromBp( headerNavBp, false );

        rootstrap.style({
            id: 'taproot_header_nav_fixed_submenu_item_color_hover',
            device: screen,
            styles: '#header.fixed .header-nav__menu .sub-menu .menu-item:hover > a { color: {{value}}; }',
            value: to
        });
    });
});


// navbar menu item alignment
wp.customize( 'taproot_header_nav_align_fixed', function( value ) {
    value.bind( function( to ) {
        $('#taproot-header-nav').removeClass('fixed-nav-align-left fixed-nav-align-right fixed-nav-align-center fixed-nav-align-fill').addClass( 'fixed-nav-align-' + to );
    });
});




// Top Nav

    // background color
    wp.customize( 'taproot_topnav_background', function( value ) {
        value.bind( function( to ) {
            $('#taproot-topnav').css( 'background', to );
        });
    });

    wp.customize( 'taproot_topnav_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_topnav_font',
                styles: '#taproot-topnav { font-family: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Top Nav Font Style
    wp.customize( 'taproot_topnav_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_topnav_font_style',
                device: 'default',
                styles: '#taproot-topnav .menu-item a {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });

    // font size
    wp.customize( 'taproot_topnav_font_size', function( value ) {
        value.bind( function( to ) {
            $('#taproot-topnav').css( 'font-size', to + 'px' );
        });
    });

    // menu item color
    wp.customize( 'taproot_topnav_default_color', function( value ) {
        value.bind( function( to ) {
            $('#taproot-topnav .menu-item, #taproot-topnav .additional-content').css( 'color', to );
        });
    });

    // menu item color hover
    wp.customize( 'taproot_topnav_default_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_topnav_default_color_hover',
                styles: '#taproot-topnav .menu-item:hover a, #taproot-topnav .additional-content a:hover { color: {{value}}; }',
                value: to
            });
        });
    });

    // topnav height
    wp.customize( 'taproot_topnav_height', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-topnav-height',
                device: 'laptop-and-up',
                styles: '#taproot-topnav .menu > .menu-item > a { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
                value: to
            });
        });
    });

    // topnav menu item spacing
    wp.customize( 'taproot_topnav_item_spacing', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-topnav-item-spacing',
                device: 'laptop-and-up',
                styles: '#taproot-topnav .menu > .menu-item > a { padding-left: {{value}}em; padding-right: {{value}}em; }',
                value: to
            });
        });
    });



    // Mobile Styles


    // Topnav Mobile Breakpoint
    wp.customize( 'taproot_topnav_mobile_breakpoint', function( value ) {
        value.bind( function( to ) {
            $('#taproot-topnav').removeClass('mm-none mm-m mm-ml mm-t mm-l mm-always').addClass( to );
        });
    });  


    // Topnav Hide on Mobile 
    wp.customize( 'taproot_topnav_hide_when_mobile', function( value ) {
        value.bind( function( to ) {
            if( to ){
                $('#taproot-topnav').addClass( 'taproot-nav-hidden-when-mobile');
            }
            else {
                $('#taproot-topnav').removeClass( 'taproot-nav-hidden-when-mobile');
            }
        });
    });

    // Topnav Hide on Desktop
    wp.customize( 'taproot_topnav_hide_when_not_mobile', function( value ) {
        value.bind( function( to ) {
            if( to ){
                $('#taproot-topnav').addClass( 'taproot-nav-hidden-when-not-mobile');
            }
            else {
                $('#taproot-topnav').removeClass( 'taproot-nav-hidden-when-not-mobile');
            }
        });
    });    


    // fixed styles

    // Show topnav when fixed
    wp.customize( 'taproot_topnav_display_when_fixed', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                rootstrap.style({
                    id: 'taproot-topnav-display-when-fixed',
                    device: 'laptop-and-up',
                    styles: '#header.fixed #taproot-topnav { display: block; }',
                });
            }
            else {
                rootstrap.style({
                    id: 'taproot-topnav-display-when-fixed',
                    device: 'laptop-and-up',
                    styles: '#header.fixed #taproot-topnav { display: none; }',
                });
            }
        });
    });


    // background color
    wp.customize( 'taproot_fixed_topnav_background', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_fixed_topnav_background',
                styles: '#header.fixed #taproot-topnav { background: {{value}}; }',
                value: to
            });            
        });
    });

    // menu item color
    wp.customize( 'taproot_fixed_topnav_default_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_fixed_topnav_default_color',
                styles: '#header.fixed #taproot-topnav .menu-item, #header.fixed #taproot-topnav .additional-content{ color: {{value}}; }',
                value: to
            });   
        });
    });

    // menu item color hover
    wp.customize( 'taproot_fixed_topnav_default_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_fixed_topnav_default_color_hover',
                styles: '#header.fixed #taproot-topnav .menu-item:hover a, #header.fixed #taproot-topnav .additional-content a:hover { color: {{value}}; }',
                value: to
            });
        });
    });


    // Footer Nav Styles

    // background color
    wp.customize( 'taproot_footer_nav_background', function( value ) {
        value.bind( function( to ) {
            $('#taproot-footer-nav').css( 'background', to );
        });
    });

    // font size
    wp.customize( 'taproot_footer_nav_font_size', function( value ) {
        value.bind( function( to ) {
            $('#taproot-footer-nav .menu-item').css( 'font-size', to + 'px' );
        });
    });

    // menu item color
    wp.customize( 'taproot_footer_nav_menu_item_color', function( value ) {
        value.bind( function( to ) {
            $('#taproot-footer-nav .menu-item').css( 'color', to );
        });
    });

    // menu item hover color
    wp.customize( 'taproot_footer_nav_menu_item_hover_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_footer_nav_menu_item_hover_color',
                styles: '#taproot-footer-nav .menu-item a:hover { color: {{value}}; }',
                value: to
            });
        });
    });

    // Footer Nav Font
    wp.customize( 'taproot_footer_nav_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_footer_nav_font',
                styles: '#taproot-footer-nav  { font-family: {{value}}; }',
                value: to
            });
        });
    });

    // Setting: Footer Nav Font Style
    wp.customize( 'taproot_footer_nav_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_footer_nav_font_style',
                device: 'default',
                styles: '#taproot-footer-nav .menu-item a {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });

    // footer-nav height
    wp.customize( 'taproot_footer_nav_height', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-footer-nav-height',
                device: 'laptop-and-up',
                styles: '#taproot-footer-nav .menu-item a { padding-top: {{value}}em; padding-bottom: {{value}}em; }',
                value: to
            });
        });
    });

    // footer-nav menu item spacing
    wp.customize( 'taproot_footer_nav_item_spacing', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-footer-nav-item-spacing',
                device: 'laptop-and-up',
                styles: '#taproot-footer-nav .menu-item a { padding-left: {{value}}em; padding-right: {{value}}em; }',
                value: to
            });
        });
    });

    // footer-nav menu item alignment
    wp.customize( 'taproot_footer_nav_align', function( value ) {
        value.bind( function( to ) {
            $('#taproot-footer-nav').removeClass('nav-align-left nav-align-right nav-align-center nav-align-fill').addClass( 'nav-align-' + to );
        });
    });

    // footer-nav position
    wp.customize( 'taproot_footer_nav_position', function( value ) {
        value.bind( function( to ) {
            if( 'after' == to ) {
                $('#footer').addClass('widgets-first');
            }
            else {
                $('#footer').removeClass('widgets-first');
            }
        });
    });

} )( jQuery );
