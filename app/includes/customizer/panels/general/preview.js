/**
 * Theme Customizer functionality for the general panel
 */
( function( $ ) {

    var rootstrap = rootstrapPreview;

    // enable/disable boxed layout
    wp.customize( 'taproot_boxed_layout', function( value ) {
        value.bind( function( to ) {
            if(to == 1) {
                $('body').addClass( 'taproot-boxed-layout').removeClass( 'taproot-fullwidth-layout');
                $('.main, .main-container, #footer').addClass( 'layout-boxed').removeClass( 'layout-full');
            } else {
                $('body').addClass( 'taproot-fullwidth-layout').removeClass( 'taproot-boxed-layout');
                $('.main, .main-container, #footer').addClass( 'layout-full').removeClass( 'layout-boxed');
            }
        } );
    } );


    // max content width
    wp.customize( 'taproot_max_content_width', function( value ) {
        value.bind( function( to ) {

            rootstrap.style({
                id: 'taproot-max-content-width',
                device: 'default',
                styles: '.container { max-width: {{value}}px; }',
                value: to
            });

            rootstrap.style({
                id: 'taproot-max-content-width',
                device: 'laptop-and-up',
                styles: '.taproot-boxed-layout .main-wrapper, .taproot-boxed-layout #footer { max-width: {{value}}px; }',
                value: to
            });

            rootstrap.style({
                id: 'taproot-max-content-width',
                device: 'laptop-and-up',
                styles: '.et_divi_builder #et_builder_outer_content .et_pb_row { max-width: {{value}}px; }',
                value: to
            });
        });
    });

    // sidebar width
    wp.customize( 'taproot_sidebar_width', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'sidebar-width',
                device: 'laptop-and-up',
                styles: '.main--has-sidebar + .sidebar { width: {{value}}%; }',
                value: to
            });
        });
    });


    // sidebar gutter
    wp.customize( 'taproot_sidebar_gutter', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_sidebar_gutter',
                device: 'laptop-and-up',
                styles: '.main--has-sidebar--right,  .main--has-sidebar--left + .sidebar { padding-right: {{value}}%; } .main--has-sidebar--left, .main--has-sidebar--right + .sidebar { padding-left: {{value}}%; }',
                value: to
            });
        });
    });

    // boxed layout padding
    wp.customize( 'taproot_boxed_layout_padding', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_boxed_layout_padding',
                device: 'laptop-and-up',
                styles: '.taproot-boxed-layout { padding: {{value}}%; }' +
                        '#footer.footer--style-fixed.layout-boxed { margin-bottom: {{value}}%; left: {{value}}%; right: {{value}}%; }',
                value: to
            });

            $('#footer.footer--style-fixed.layout-boxed').css('padding-bottom', $('#footer').outerHeight(true) + 'px');

            var headerWidth = ( 100 - ( to * 2 ) );
            rootstrap.style({
                id: 'taproot_boxed_layout_padding_fixed_header',
                device: 'laptop-and-up',
                styles: '.taproot-boxed-layout #header.fixed { width: {{value}}%; }',
                value: headerWidth
            });
        });
    });

    // background color
    wp.customize( 'taproot_background_color', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'taproot_background_color',
                styles: 'body { background-color: {{value}}; }',
                value: to
            });
        } );
    } );

} )( jQuery );
