/**
 * Theme Customizer functionality for the header panel
 */
( function( $ ) {

    var rootstrap = rootstrapPreview;

    // Fullwidth Header
    wp.customize( 'taproot_main_header_fullwidth', function( value ) {
        value.bind( function( to ) {
            $('#header').toggleClass('header--fullwidth');
        });
    });

    // background color
    wp.customize( 'taproot_header_background_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_header_background_color',
                styles: '.main-header { background-color: {{value}}; }',
                value: to,
            });            
        } );
    } );

    // default color
    wp.customize( 'taproot_header_default_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_header_default_color',
                styles: '.header-content .container { color: {{value}}; }',
                value: to,
            });
        });
    });

    // Header default color
    wp.customize( 'taproot_header_default_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_header_default_color_hover',
                styles: '.header-nav__menu > .menu-item:hover > a { color: {{value}}; }',
                value: to,
            });
        });
    });


    // background image
    wp.customize( 'taproot_header_background_image', function( value ) {
        value.bind( function( to ) {
            $('.header-content').css( 'background-image', 'url(' + to + ')' );
        } );
    } );


    // background image repeat
    wp.customize( 'taproot_header_background_repeat', function( value ) {
        value.bind( function( to ) {
            $('.header-content').css( 'background-repeat', to );
        } );
    } );


    // background image size
    wp.customize( 'taproot_header_background_size', function( value ) {
        value.bind( function( to ) {
            $('.header-content').css( 'background-size', to );
        } );
    } );


    // background image position
    wp.customize( 'taproot_header_background_position', function( value ) {
        value.bind( function( to ) {
            $('.header-content').css( 'background-position', 'top ' + to );
        } );
    } );


    // search icon/text color
    wp.customize( 'taproot_header_search_color', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) to = 'inherit';
            rootstrap.style({
                id: 'taproot-header-search-color',
                styles: 'header.static .search-container, header.static .search-toggle { color: {{value}}; }',
                value: to,
            });

        });
    });


    // search icon size
    wp.customize( 'taproot_header_search_size', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-header-search-size',
                styles: 'header .search-toggle, .search-container .taproot-search__field { font-size: {{value}}px; }',
                value: to,
            });
        });
    });





    // fixed styles

    // Show main header when fixed
    wp.customize( 'taproot_main_header_display_when_fixed', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                rootstrap.style({
                    id: 'taproot-main-header-display-when-fixed',
                    device: 'laptop-and-up',
                    styles: '#header.fixed .header-content { display: block; }',
                });
            }
            else {
                rootstrap.style({
                    id: 'taproot-main-header-display-when-fixed',
                    device: 'laptop-and-up',
                    styles: '#header.fixed .header-content { display: none; }',
                });
            }
        } );
    } );



    // fixed header animation type
    wp.customize( 'taproot_fixed_header_type', function( value ) {
        value.bind( function( to ) {
            
            $('#header').removeClass('header--has-fixed--fade header--has-fixed--slide header--has-fixed--sticky');

            if(to == 'sticky') {
                $('#header').addClass('header--has-fixed--sticky');
                fixedHeaderType = 'sticky';
            } else if(to == 'slide') {
                $('#header').addClass('header--has-fixed--slide');
                fixedHeaderType = 'slide';
            } else {
                $('#header').addClass('header--has-fixed--fade');
                 fixedHeaderType = 'fade';
            }

        });
    });


    // background color
    wp.customize( 'taproot_header_background_color_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-header-background-color-fixed',
                device: 'laptop-and-up',
                styles: '#header.fixed { background-color: {{value}}; }',
                value: to,
            });
        } );
    });

    // Fixed Header default color
    wp.customize( 'taproot_fixed_header_default_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_fixed_header_default_color',
                device: 'laptop-and-up',
                styles: '.main-header.fixed .header-content .container { color: {{value}}; }',
                value: to,
            });
        });
    });

    // Fixed Header default color
    wp.customize( 'taproot_fixed_header_default_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_fixed_header_default_color_hover',
                device: 'laptop-and-up',
                styles: '.main-header.fixed .menu > .menu-item:hover > a, .main-header.fixed .search-toggle:hover, .main-header.fixed .label-toggle:hover { color: {{value}}; }',
                value: to,
            });
        });
    });


    // search icon/text color
    wp.customize( 'taproot_search_color_fixed', function( value ) {
        value.bind( function( to ) {

            if( to == '' ) to = 'inherit';

            rootstrap.style({
                id: 'taproot-fixed-header-search-color',
                device: 'laptop-and-up',
                styles: '#header.fixed .search-container, #header.fixed .search-toggle { color: {{value}}; }',
                value: to,
            });

        });
    });


    // search icon size
    wp.customize( 'taproot_search_size_fixed', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot-fixed-header-search-size',
                styles: 'header.fixed .search-toggle, header.fixed .search-container .taproot-search__field { font-size: {{value}}px; }',
                value: to,
            });
        });
    });


    // static header search 
    wp.customize( 'taproot_enable_header_search', function( value ) {
        value.bind( function( to ) {

            if( to == 1 ) {

                rootstrap.style({
                    id: 'taproot_enable_header_search',
                    styles: '.main-header.static .search-container, .main-header.static .search-toggle { display: flex!important; }',
                    value: to,
                });   

            } else {

                rootstrap.style({
                    id: 'taproot_enable_header_search',
                    styles: '.main-header.static .search-container, .main-header.static .search-toggle { display: none!important; }',
                    value: to,
                });
            }

        });
    });


    // fixed header search 
    wp.customize( 'taproot_enable_fixed_header_search', function( value ) {
        value.bind( function( to ) {

            console.log('yo');

            if( to == 1 ) {

                rootstrap.style({
                    id: 'taproot_enable_fixed_header_search',
                    styles: '.main-header.fixed .search-container, .main-header.fixed .search-toggle { display: flex!important; }',
                    value: to,
                });   

            } else {

                rootstrap.style({
                    id: 'taproot_enable_fixed_header_search',
                    styles: '.main-header.fixed .search-container, .main-header.fixed .search-toggle { display: none!important; }',
                    value: to,
                });
            }

        });
    });


} )( jQuery );
