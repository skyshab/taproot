/**
 * Theme Customizer functionality for the posts panel
 */
( function( $ ) {

    var rootstrap = rootstrapPreview;

    // blog page styles

    // Blog Page Title Color
    wp.customize( 'taproot_blog_page_title_color', function( value ) {
        value.bind( function( to ) {
            $('.blog .post-title').css( 'color', to );
        });
    });

    // Pagination size
    wp.customize( 'taproot_blog_page_pagination_size', function( value ) {
        value.bind( function( to ) {
            $('.taproot-pagenavi').css( 'font-size', to + 'em' );
        });
    });

    // Pagination Radius
    wp.customize( 'taproot_blog_page_pagination_radius', function( value ) {
        value.bind( function( to ) {
            $('.taproot-pagenavi .page-numbers').css( 'border-radius', to + '%' );
        });
    });    

    // Pagination Color
    wp.customize( 'taproot_blog_page_pagination_color', function( value ) {
        value.bind( function( to ) {
            $('.taproot-pagenavi').css( 'color', to );
            rootstrap.style({
                id: 'taproot_blog_page_pagination_color',
                styles: '.taproot-pagenavi .page-numbers:hover, .taproot-pagenavi .page-numbers.current { background: {{value}}; }',
                value: to
            });
        });
    });


    // Post Navigation Styles

    // Title Bar Height
    wp.customize( 'taproot_post_nav_height', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_post_nav_height',
                styles: '.post-navigation--above { padding: {{value}}em 0; }',
                value: to
            });
        });
    });

    // Post Navigation Bar Background
    wp.customize( 'taproot_post_nav_background_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_post_nav_background_color',
                styles: '.post-navigation-bar { background-color: {{value}}; }',
                value: to
            });
        });
    });


    // top post navigation

    // Post Navigation Font Size
    wp.customize( 'taproot_top_post_navigation_link_size', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_top_post_navigation_link_size',
                styles: '.post-navigation--top .post-navigation__link { font-size: {{value}}em; }',
                value: to
            });
        });
    });


    // Post Navigation Link Color
    wp.customize( 'taproot_top_post_navigation_link_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_top_post_navigation_link_color',
                styles: '.post-navigation--top .post-navigation__link > a, .post-navigation--top .post-navigation__link > a:visited { color: {{value}}; }',
                value: to
            });
        });
    });

    // Post Navigation Link Color Hover
    wp.customize( 'taproot_top_post_navigation_link_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_top_post_navigation_link_color_hover',
                styles: '.post-navigation--top .post-navigation__link > a:hover { color: {{value}}; }',
                value: to
            });
        });
    });


    // Post Navigation Separators
    wp.customize( 'taproot_enable_top_post_nav_separators', function( value ) {
        value.bind( function( to ) {
            if(to) {
                $('.post-navigation--top').addClass('post-navigation--has-separators');
            } else {
                $('.post-navigation--top').removeClass('post-navigation--has-separators');                
            }
        });
    });



    // bottom post navigation

    // Post Navigation Font Size
    wp.customize( 'taproot_bottom_post_navigation_link_size', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_bottom_post_navigation_link_size',
                styles: '.post-navigation--bottom .post-navigation__link { font-size: {{value}}em; }',
                value: to
            });
        });
    });


    // Post Navigation Link Color
    wp.customize( 'taproot_bottom_post_navigation_link_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_bottom_post_navigation_link_color',
                styles: '.post-navigation--bottom .post-navigation__link > a, .post-navigation--bottom .post-navigation__link > a:visited { color: {{value}}; }',
                value: to
            });
        });
    });

    // Post Navigation Link Color Hover
    wp.customize( 'taproot_bottom_post_navigation_link_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_bottom_post_navigation_link_color_hover',
                styles: '.post-navigation--bottom .post-navigation__link > a:hover { color: {{value}}; }',
                value: to
            });
        });
    });


    // Post Navigation Separators
    wp.customize( 'taproot_enable_bottom_post_nav_separators', function( value ) {
        value.bind( function( to ) {
            if(to) {
                $('.post-navigation--bottom').addClass('post-navigation--has-separators');
            } else {
                $('.post-navigation--bottom').removeClass('post-navigation--has-separators');                
            }
        });
    });



    // Post Box Styles

    // Title Color
    wp.customize( 'taproot_post_box_title_color', function( value ) {
        value.bind( function( to ) {
            $('.post-box .entry-title').css( 'color', to );
        });
    });

    // Title Color: Hover
    wp.customize( 'taproot_post_box_title_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_post_box_title_color_hover',
                styles: '.post-box .entry-title:hover { color: {{value}}; }',
                value: to
            });            
        });
    });

    // Text Color
    wp.customize( 'taproot_post_box_text_color', function( value ) {
        value.bind( function( to ) {
            $('.post-box').css( 'color', to );
        });
    });

    // Meta size
    wp.customize( 'taproot_post_box_meta_size', function( value ) {
        value.bind( function( to ) {
            $('.post-box .taproot-meta').css( 'font-size', to + 'em' );
        });
    });

    // Meta Color
    wp.customize( 'taproot_post_box_meta_color', function( value ) {
        value.bind( function( to ) {
            $('.post-box .taproot-meta').css( 'color', to );
        });
    });

    // Meta Color
    wp.customize( 'taproot_post_box_meta_icon_color', function( value ) {
        value.bind( function( to ) {
            $('.post-box .taproot-meta i').css( 'color', to );
        });
    });

    // Link Color
    wp.customize( 'taproot_post_box_link_color', function( value ) {
        value.bind( function( to ) {
            $('.post-box .entry-action a').css( 'color', to );
        });
    });

    // Post Box Link style
    wp.customize( 'taproot_post_box_link_style', function( value ) {
        value.bind( function( to ) {
            if( 'button' === to ) {
                $('.post-box .entry-action a').addClass('taproot-button divsion-button--post-box-action');
            } else {
                $('.post-box .entry-action a').removeClass('taproot-button divsion-button--post-box-action');                
            }
        });
    });

    // Post Box Link position
    wp.customize( 'taproot_post_box_link_position', function( value ) {
        value.bind( function( to ) {
            if( 'right' === to ) {
                $('.post-box .entry-action a').addClass('alignright');
                $('.post-box .entry-action').addClass('cf').removeClass('clear');
            } else if( 'hard-left' === to ) {
                $('.post-box .entry-action a').removeClass('alignright');   
                $('.post-box .entry-action').removeClass('cf').addClass('clear');
            } else {
                $('.post-box .entry-action a').removeClass('alignright');   
                $('.post-box .entry-action').removeClass('cf clear');                
            }
        });
    });

} )( jQuery );
