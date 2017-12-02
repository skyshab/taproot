/**
 * Theme Customizer functionality for the widgets panel
 */
( function( $ ){

    var rootstrap = rootstrapPreview;

    var currentSidebar = $('#sidebar').data('current-sidebar');

    if( currentSidebar ){
        var sbPrefix = 'taproot_' + currentSidebar,
        sbWidth = sbPrefix + '_width',
        sbGutter = sbPrefix + '_gutter_width',
        sbBkg = sbPrefix + '_bkg',
        sbTextColor = sbPrefix + '_text',
        sbHeadingColor = sbPrefix + '_heading',
        sbActionColor = sbPrefix + '_action',
        sbActionColorHover = sbPrefix + '_action_hover',
        sbAccentColor = sbPrefix + '_accent_color',
        sbAccentTextColor = sbPrefix + '_accent_text_color';
        sbSeparatorColor = sbPrefix + '_separator_color';


        wp.customize( sbWidth , function( value ){
            value.bind( function( to ){

                if( to == 0 ) {
                    rootstrap.style({
                        id: 'sidebar-width',
                        device: 'laptop-and-up',
                        styles: ' ',
                    });

                    rootstrap.style({
                        id: 'main-width',
                        device: 'laptop-and-up',
                        styles: ' ',
                    });                    
                }
                else {
                    rootstrap.style({
                        id: 'sidebar-width',
                        device: 'laptop-and-up',
                        styles: '#sidebar { width: {{value}}%; }',
                        value: to
                    });

                    rootstrap.style({
                        id: 'main-width',
                        device: 'laptop-and-up',
                        styles: '#sidebar + .main { width: {{value}}%; }',
                        value: ( 100 - parseInt(to) )
                    });
                }
            });
        });

        // gutter width
        wp.customize( sbGutter , function( value ){
            value.bind( function( to ){

                if( to == 0 ) {
                    rootstrap.style({
                        id: 'sidebar-gutter-width-right',
                        device: 'laptop-and-up',
                        styles: ' ',
                    });

                    rootstrap.style({
                        id: 'sidebar-gutter-width-left',
                        device: 'laptop-and-up',
                        styles: ' ',
                    });                    
                }
                else {
                    rootstrap.style({
                        id: 'sidebar-gutter-width-right',
                        device: 'laptop-and-up',
                        styles: '.sidebar--right + .main, .sidebar--left { padding-right: {{value}}%; }',
                        value: to
                    });

                    rootstrap.style({
                        id: 'sidebar-gutter-width-left',
                        device: 'laptop-and-up',
                        styles: '.sidebar--left + .main, .sidebar--right { padding-left: {{value}}%; }',
                        value: to
                    });
                }
            });
        });        


        wp.customize( sbBkg, function( value ){
            value.bind( function( to ){

                to = (to) ? to : 'transparent';

                rootstrap.style({
                    id: 'sidebar-bkg-mobile',
                    device: 'tablet-and-under',
                    styles: '#sidebar { background: {{value}}; }',
                    value: to
                });

                rootstrap.style({
                    id: 'sidebar-bkg',
                    device: 'laptop-and-up',
                    styles: '#sidebar.layout-boxed, #sidebar.layout-full:before { background: {{value}}!important; }',
                    value: to
                });
            });
        });

        wp.customize( sbTextColor, function( value ){
            value.bind( function( to ){
                $( '#sidebar' ).css( 'color', to );
            });
        });

        wp.customize( sbHeadingColor, function( value ){
            value.bind( function( to ){
                $( '#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6' ).css( 'color', to );
            });
        });

        wp.customize( sbActionColor, function( value ){
            value.bind( function( to ){
                rootstrap.style({
                    id: 'sidebar-link',
                    styles: '#sidebar a, #sidebar a:visited { color: {{value}}; }',
                    value: to
                });
            });
        });

        wp.customize( sbActionColorHover, function( value ){
            value.bind( function( to ){
                rootstrap.style({
                    id: 'sidebar-link-hover',
                    styles: '#sidebar a:hover { color: {{value}}; }',
                    value: to
                });
            });
        });


        wp.customize( sbAccentColor, function( value ){
            value.bind( function( to ){
                rootstrap.style({
                    id: 'sidebar-accent-color',
                    styles: '#sidebar .taproot-search__button { color: {{value}}; } #sidebar .calendar_wrap caption, #sidebar .widget_archive select, #sidebar .widget_categories select { background-color: {{value}}; }',
                    value: to
                });
            });
        });


        wp.customize( sbAccentTextColor, function( value ){
            value.bind( function( to ){
                rootstrap.style({
                    id: 'sidebar-accent-text-color',
                    styles: '#sidebar .taproot-search__button .icon, #sidebar .calendar_wrap caption, #sidebar .widget_archive select, #sidebar .widget_categories select { color: {{value}}; }',
                    value: to
                });
            });
        });


        wp.customize( sbSeparatorColor, function( value ){
            value.bind( function( to ){
                rootstrap.style({
                    id: 'sidebar-separator-color',
                    styles: '#sidebar .taproot-search__field, #sidebar .calendar_wrap thead, #sidebar .calendar_wrap tfoot td { border-color: {{value}}; }',
                    value: to
                });
            });
        });


    } // end if current sidebar

} )( jQuery );
