/**
 * Theme Customizer functionality for the elements panel
 */
( function( $ ) {

    var rootstrap = rootstrapPreview;

// blog page styles

    // Button Color
    wp.customize( 'taproot_button_background_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_background_color',
                styles: '.taproot-button { background: {{value}}; }',
                value: to
            });
        });
    });


    // Button Border Color
    wp.customize( 'taproot_button_border_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_border_color',
                styles: '.taproot-button { border-color: {{value}}; }',
                value: to
            });
        });
    });


    // Button Border Color
    wp.customize( 'taproot_button_text_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_text_color',
                styles: '.taproot-button { color: {{value}}; }',
                value: to
            });
        });
    });


    // Button Border Width
    wp.customize( 'taproot_button_border_width', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_border_width',
                styles: '.taproot-button { border-width: {{value}}px; }',
                value: to
            });
        });
    });


    // Button Border Radius
    wp.customize( 'taproot_button_border_radius', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_border_radius',
                styles: '.taproot-button { border-radius: {{value}}em; }',
                value: to
            });
        });
    });


    // Setting: Button Font Family
    wp.customize( 'taproot_button_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_font',
                styles: '.taproot-button { font-family: {{value}}; }',
                value: to
            });
        });
    });


    // Setting: Button Font Style
    wp.customize( 'taproot_button_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_font_style',
                device: 'default',
                styles: '.taproot-button {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });

// Hover Styles

    // Button Color: Hover
    wp.customize( 'taproot_button_background_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_background_color_hover',
                styles: '.taproot-button:hover { background: {{value}}; }',
                value: to
            });
        });
    });


    // Button Border Color: Hover
    wp.customize( 'taproot_button_border_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_border_color_hover',
                styles: '.taproot-button:hover { border-color: {{value}}; }',
                value: to
            });
        });
    });


    // Button Border Color: Hover
    wp.customize( 'taproot_button_text_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_text_color_hover',
                styles: '.taproot-button:hover { color: {{value}}; }',
                value: to
            });
        });
    });

// Secondary Buttons

    // Button Color
    wp.customize( 'taproot_secondary_button_background_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_secondary_button_background_color',
                styles: '.taproot-button.taproot-button--secondary { background: {{value}}; }',
                value: to
            });
        });
    });


    // Button Border Color
    wp.customize( 'taproot_secondary_button_border_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_secondary_button_border_color',
                styles: '.taproot-button.taproot-button--secondary { border-color: {{value}}; }',
                value: to
            });
        });
    });


    // Button Text Color
    wp.customize( 'taproot_secondary_button_text_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_secondary_button_text_color',
                styles: '.taproot-button.taproot-button--secondary { color: {{value}}; }',
                value: to
            });
        });
    });


    // Button Border Width
    wp.customize( 'taproot_secondary_button_border_width', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_border_width',
                styles: '.taproot-button.taproot-button--secondary { border-width: {{value}}px; }',
                value: to
            });
        });
    });


    // Button Border Radius
    wp.customize( 'taproot_secondary_button_border_radius', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_secondary_button_border_radius',
                styles: '.taproot-button.taproot-button--secondary { border-radius: {{value}}em; }',
                value: to
            });
        });
    });


    // Setting: Secondary Button Font Family
    wp.customize( 'taproot_secondary_button_font', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_secondary_button_font',
                styles: '.taproot-button.taproot-button--secondary { font-family: {{value}}; }',
                value: to
            });
        });
    });


    // Setting: Button Font Style
    wp.customize( 'taproot_secondary_button_font_style', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_button_font_style',
                device: 'default',
                styles: '.taproot-button.taproot-button--secondary {' + taprootFontStyles(to) + '}',
                value: to
            });
        });
    });


    // Button Color: Hover
    wp.customize( 'taproot_secondary_button_background_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_secondary_button_background_color_hover',
                styles: '.taproot-button.taproot-button--secondary:hover { background: {{value}}; }',
                value: to
            });
        });
    });


    // Button Border Color
    wp.customize( 'taproot_secondary_button_border_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_secondary_button_border_color_hover',
                styles: '.taproot-button.taproot-button--secondary:hover { border-color: {{value}}; }',
                value: to
            });
        });
    });


    // Button Text Color
    wp.customize( 'taproot_secondary_button_text_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_secondary_button_text_color_hover',
                styles: '.taproot-button.taproot-button--secondary:hover { color: {{value}}; }',
                value: to
            });
        });
    });

// Links

    // Setting: Link Color
    wp.customize( 'taproot_link_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_link_color',
                device: 'default',
                styles: 'a, a:visited { color: {{value}}; }',
                value: to
            });
        });
    });


    // Setting: Link Color Hover
    wp.customize( 'taproot_link_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_link_color_hover',
                device: 'default',
                styles: 'a:hover { color: {{value}}; }',
                value: to
            });
        });
    });


    // Setting: Link Color Active
    wp.customize( 'taproot_link_color_active', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_link_color_active',
                device: 'default',
                styles: 'a:active { color: {{value}}; }',
                value: to
            });
        });
    });


    // Setting:  Accent Color
    wp.customize( 'taproot_accent_color', function( value ) {
        value.bind( function(to) {
            rootstrap.style({
                id: 'taproot_accent_color',
                device: 'default',
                styles: 'blockquote { border-color: {{value}}; } :focus { box-shadow: 0 0 3px 2px %s; } .gallery--modal .gallery__icon a:after, .sidebar .calendar_wrap caption, .sidebar .widget_archive select, .sidebar .widget_categories select, #skip-link a { background-color: {{value}}; }',
                value: to
            });
        });
    });


    // Setting:  Accent Text Color
    wp.customize( 'taproot_accent_text_color', function( value ) {
        value.bind( function(to) {
            rootstrap.style({
                id: 'taproot_accent_text_color',
                device: 'default',
                styles: 'blockquote { border-color: {{value}}; } .gallery--modal .modal-overlay-content, .sidebar .calendar_wrap caption, .sidebar .widget_archive select, .sidebar .widget_categories select, #skip-link a { color: {{value}}; }',
                value: to
            });
        });
    });


    // Setting:  Accent Text Color
    wp.customize( 'taproot_separator_color', function( value ) {
        value.bind( function(to) {
            rootstrap.style({
                id: 'taproot_separator_color',
                device: 'default',
                styles: '.post-box, .post-navigation, .post-comments .comment-body, .comment-respond, .comment-respond .form-control { border-color: {{value}}; } hr { color: {{value}}; }',
                value: to
            });
        });
    });


    // Setting: Accent Background Color
    wp.customize( 'taproot_accent_background_color', function( value ) {
        value.bind( function(to) {
            rootstrap.style({
                id: 'taproot_accent_background_color',
                device: 'default',
                styles: 'blockquote, .comment-respond, pre, code, kbd, var, ins, tt { background-color: {{value}}; }',
                value: to
            });
        });
    });


    // Breadcrumbs Font Size
    wp.customize( 'taproot_breadcrumbs_size', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_breadcrumbs_size',
                styles: '.taproot-breadcrumbs { font-size: {{value}}em; }',
                value: to
            });
        });
    });

    // Breadcrumbs Font Size
    wp.customize( 'taproot_breadcrumbs_align', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_breadcrumbs_align',
                styles: '.taproot-breadcrumbs { text-align: {{value}}; }',
                value: to
            });
        });
    });    


    // Post Navigation Breadcrumbs Color
    wp.customize( 'taproot_post_nav_breadcrumbs_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_post_nav_breadcrumbs_color',
                styles: '.taproot-breadcrumbs, .taproot-breadcrumbs > a, .taproot-breadcrumbs > a:visited { color: {{value}}; }',
                value: to
            });
        });
    });


    // Post Navigation Breadcrumbs Color: Hover
    wp.customize( 'taproot_post_nav_breadcrumbs_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_post_nav_breadcrumbs_color_hover',
                styles: '.taproot-breadcrumbs > a:hover { color: {{value}}; }',
                value: to
            });
        });
    });

// Comments

    // Post Comments Text Color
    wp.customize( 'taproot_comments_text_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_comments_text_color',
                styles: '.post-comments { color: {{value}}; }',
                value: to
            });
        });
    });


    // Post Comments Link Color
    wp.customize( 'taproot_comments_link_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_comments_link_color',
                styles: '.post-comments a, .post-comments a:visited { color: {{value}}; }',
                value: to
            });
            rootstrap.style({
                id: 'taproot_comments_link_color_button',
                styles: '.post-comments .taproot-button { background-color: {{value}}; border-color: {{value}}; }',
                value: to
            });            
        });
    });


    // Color Setting: Comments Link Color:Hover
    wp.customize( 'taproot_comments_link_color_hover', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_comments_link_color_hover',
                styles: '.post-comments a:hover { color: {{value}}; }',
                value: to
            });
            rootstrap.style({
                id: 'taproot_comments_link_color_hover_button',
                styles: '.post-comments .taproot-button:hover { background-color: {{value}}; border-color: {{value}}; color: #fff; }',
                value: to
            });            
        });
    });


    // Color Setting: Comments Border Color
    wp.customize( 'taproot_comments_border_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_comments_border_color',
                styles: '.post-comments .comment-body, .comment-respond, .comment-respond .form-control { border-color: {{value}}; }',
                value: to
            });
        });
    });


    // Color Setting: Comments Form Background Color
    wp.customize( 'taproot_comments_form_background_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_comments_form_background_color',
                styles: '.comment-respond { background-color: {{value}}; }',
                value: to
            });
        });
    });

} )( jQuery );
