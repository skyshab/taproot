<?php
/**
 * Generate styles from the customizer controls in the typography panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Setting: Body Text
$styles->set_style( array(
    'selector' => 'body',
    'styles' => array(
        'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_body_font' ) ),
        'color: %s;' => get_theme_mod( 'taproot_text_color' ),
    ),
));

// Setting: Line Height 
$styles->set_style( array(
    'selector' => 'body, input, textarea, select, button',
    'styles' => array(
        'line-height: %s;' => get_theme_mod( 'taproot_line_height' ),
    ),
));


// Setting: Line Height - Bottom Margin
$styles->set_style( array(
    'selector' => 'p, ul, ol, hr, pre, blockquote, address, dd, table, .single .embed-wrap, .post-navigation--top',
    'styles' => array(
        'margin-bottom: %sem;' => get_theme_mod( 'taproot_line_height' ),
    ),
));

// Setting: Heading Styles
$styles->set_style( array(
    'selector' => 'h1, h2, h3, h4, h5, h6',
    'styles' => array(
        'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_heading_font' ) ),
        'color: %s;' => get_theme_mod( 'taproot_heading_color' ),
        'line-height: %s;' => get_theme_mod( 'taproot_heading_line_height' ),
        taproot_get_font_styles( get_theme_mod( 'taproot_heading_font_style' ) ) => 'echo',
    ),
));

$post_title_line_height = get_theme_mod( 'taproot_title_line_height', 1.2 );

// Setting: Post Title Styles
$styles->set_style( array(
    'selector' => '.post-title',
    'styles' => array(
        'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_post_title_font' ) ),
        'color: %s;' => get_theme_mod( 'taproot_post_title_color' ),
        'line-height: %s;' => $post_title_line_height,
        'margin-top: -%sem;' => ( ( intval( $post_title_line_height ) - 1 ) / 2 ),
        taproot_get_font_styles( get_theme_mod( 'taproot_title_font_style' ) ) => 'echo',
    ),
));

$devices = $rootstrap->get_devices();

foreach ( $devices as $device => $args )
{
    if( $device == 'mobile' )
    {
        $screen = 'default';
    }
    elseif( $device == 'desktop' )
    {
        $screen = 'desktop';
    }
    else {
        $screen = sprintf( '%s-and-up', $device );
    }

    $device_id = str_replace( '-', '_', $device );

    // body font size
    $styles->set_style( array(
        'screen' => $screen,
        'selector' => 'body',
        'styles' => array(
            'font-size: %spx;' => get_theme_mod( sprintf( 'taproot_font_size_%s', $device_id ) ),
        ),
    ));

    // post title font size
    $styles->set_style( array(
        'screen' => $screen,
        'selector' => '.post-title',
        'styles' => array(
            'font-size: %sem;' => get_theme_mod( sprintf( 'taproot_post_title_font_size_%s', $device_id ) ),
        ),
    ));

    // heading sizes
    $base_heading_size = get_theme_mod( 'taproot_heading_font_size_' . $device_id, 2 );

    $styles->set_style( array(
        'screen' => $screen,
        'selector' => 'h1',
        'styles' => array(
            'font-size: %sem;' => taproot_heading_styles( 'h1', $base_heading_size ),
        ),
    ));

    $styles->set_style( array(
        'screen' => $screen,
        'selector' => 'h2',
        'styles' => array(
            'font-size: %sem;' => taproot_heading_styles( 'h2', $base_heading_size ),
        ),
    ));

    $styles->set_style( array(
        'screen' => $screen,
        'selector' => 'h3',
        'styles' => array(
            'font-size: %sem;' => taproot_heading_styles( 'h3', $base_heading_size ),
        ),
    ));

    $styles->set_style( array(
        'screen' => $screen,
        'selector' => 'h4',
        'styles' => array(
            'font-size: %sem;' => taproot_heading_styles( 'h4', $base_heading_size ),
        ),
    ));

    $styles->set_style( array(
        'screen' => $screen,
        'selector' => 'h5',
        'styles' => array(
            'font-size: %sem;' => taproot_heading_styles( 'h5', $base_heading_size ),
        ),
    ));

    $styles->set_style( array(
        'screen' => $screen,
        'selector' => 'h6',
        'styles' => array(
            'font-size: %sem;' => taproot_heading_styles( 'h6', $base_heading_size ),
        ),
    ));

    // laptop & desktop only - sidebar layout styles

    if( 'laptop' == $device || 'desktop' == $device )
    {
        // body font size
        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar, .sidebar + main',
            'styles' => array(
                'font-size: %spx;' => get_theme_mod( sprintf( 'taproot_sidebar_layout_font_size_%s', $device_id ) ),
            ),
        ));

        // post title font size
        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar + main .post-title',
            'styles' => array(
                'font-size: %sem;' => get_theme_mod( sprintf( 'taproot_sidebar_layout_post_title_font_size_%s', $device_id ) ),
            ),
        ));

        // Sidebar font size
        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar .widget-group',
            'styles' => array(
                'font-size: %sem;' => get_theme_mod( sprintf( 'taproot_sidebar_layout_sidebar_font_size_%s', $device_id ) ),
            ),
        ));        

        // heading sizes
        $sidebar_layout_base_heading_size = get_theme_mod( 'taproot_sidebar_layout_heading_font_size_' . $device_id, 2 );

        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar h1, .sidebar + main h1',
            'styles' => array(
                'font-size: %sem;' => taproot_heading_styles( 'h1', $sidebar_layout_base_heading_size ),
            ),
        ));

        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar h2, .sidebar + main h2',
            'styles' => array(
                'font-size: %sem;' => taproot_heading_styles( 'h2', $sidebar_layout_base_heading_size ),
            ),
        ));

        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar h3, .sidebar + main h3',
            'styles' => array(
                'font-size: %sem;' => taproot_heading_styles( 'h3', $sidebar_layout_base_heading_size ),
            ),
        ));

        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar h4, .sidebar + main h4',
            'styles' => array(
                'font-size: %sem;' => taproot_heading_styles( 'h4', $sidebar_layout_base_heading_size ),
            ),
        ));

        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar h5, .sidebar + main h5',
            'styles' => array(
                'font-size: %sem;' => taproot_heading_styles( 'h5', $sidebar_layout_base_heading_size ),
            ),
        ));

        $styles->set_style( array(
            'screen' => $screen,
            'selector' => '.sidebar h6, .sidebar + main h6',
            'styles' => array(
                'font-size: %sem;' => taproot_heading_styles( 'h6', $sidebar_layout_base_heading_size ),
            ),
        ));

    } // end laptop desktop

} // end each device
