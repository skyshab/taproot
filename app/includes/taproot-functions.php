<?php
/**
 * Functions that are used in templates and other theme functionality
 *
 * @package taproot
 * @since 0.8.0
 */


if( !function_exists( 'taproot_entry_header' ) )
{
    /**
     * Action: Get Entry Header
     *
     * @since 0.8.0
     * @return void
     */    
    function taproot_entry_header()
    {
        if( has_action( 'taproot_entry_header' ) )
        {
            echo '<header class="entry-header">';
                do_action( 'taproot_entry_header' );
            echo '</header>';
        }
    }
}


if( !function_exists( 'taproot_entry_footer' ) )
{
    /**
     * Action: Get Entry Footer
     *
     * @since 0.8.0
     * @return void
     */      
    function taproot_entry_footer()
    {
        if( has_action( 'taproot_entry_footer' ) )
        {
            echo '<footer class="entry-footer">';
                 do_action( 'taproot_entry_footer' );
            echo '</footer>';        
        }
    }
}


/**
 *  Action: Get Entry Title
 *
 * @since 0.8.0
 */  
function taproot_title()
{
    do_action('taproot_title');
}


/**
 *  Action: Get Post Details
 *
 * @since 0.8.0
 */  
function taproot_post_details( $args = array() )
{
    do_action('taproot_post_details', $args );
}


/**
 *  Get Featured Image Size
 *
 * @since 0.8.0
 * @return string 
 */  
function taproot_get_post_thumbnail_size()
{
    if( is_single() )
    {
        $featured_image_size = get_theme_mod( 'taproot_featured_image_size' );
        $featured_image_location = get_theme_mod( 'taproot_featured_image_location' );
        return ( $featured_image_size &&  'feature-area' !== $featured_image_location ) ? $featured_image_size : 'full';
    }
    else
    {
        $featured_image_size = get_theme_mod( 'taproot_post_box_featured_image_size' );

        if( $featured_image_size )
        {
            return $featured_image_size;
        }
    }
}


/**
 *  Print post thumbnail markup
 *
 * @since 0.8.2
 * @return string 
 */ 
function taproot_post_thumbnail()
{
    if( has_post_thumbnail() ):
        $thumbnail_size = taproot_get_post_thumbnail_size();
        $thumbnail_class_array = array( 'class' => taproot_class( 'post-thumbnail-image', '', false ) );
    ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
            <?php the_post_thumbnail( $thumbnail_size, $thumbnail_class_array ); ?>
        </a>
    <?php
    endif;
}


/**
 *  Print top post navigation markup
 *
 * @since 0.8.2
 * @return void
 */ 
function taproot_post_nav_top()
{
    do_action('taproot_top_post_navigation');
}


/**
 *  Print bottom post navigation markup
 *
 * @since 0.8.2
 * @return void
 */ 
function taproot_post_nav_bottom()
{
    do_action('taproot_bottom_post_navigation');
}


/**
 * Print Post Pagination
 *
 * @since 0.8.0
 * @return void 
 */  
function taproot_pagination()
{
    if( is_home() || is_search() || is_archive() )
    {
        $current = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        global $wp_query;
        $total = $wp_query->max_num_pages;
        if( $total < $current ) return;

        // args to format pagination
        $pagenavi_args = array(
            'base' => str_replace(999999999, '%#%', get_pagenum_link(999999999)),
            'total' => $total,
            'current' => $current,
            'mid_size' => 1,
            'end_size' => 1,
            'prev_text' => do_taproot_icon('paginate_prev'),
            'next_text' => do_taproot_icon('paginate_next'),
        );

        printf( '<div class="taproot-pagenavi"><span class="pages">Page %s of %s</span>%s</div>', 
            esc_html( $current ), 
            esc_html( $total ), 
            paginate_links( $pagenavi_args ) 
        );        
    }
}


/**
 * Get The Proper Sidebar ID
 *
 * @since 0.8.0
 * 
 * @return string Returns the sidebar id
 */  
function taproot_get_sidebar()
{
    $sidebar = false;

    if( is_home() )
    {
        $sidebar = get_theme_mod('taproot_blog_page_sidebar', 'sidebar-1');
    }
    elseif( is_archive() )
    {
        if( is_category() )
        {
            $cat = get_term_by( 'name', single_cat_title("", false), 'category' );
            $cat_sidebar_id = sprintf( 'category-%s', $cat->slug );
            $sidebar = ( is_active_sidebar( $cat_sidebar_id ) ) ? $cat_sidebar_id : false;
        }
        elseif( is_tag() )
        {
            $tag = get_term_by( 'name', single_tag_title("", false), 'post_tag' );
            $tag_sidebar_id = sprintf( 'tag-%s', $tag->slug );
            $sidebar = ( is_active_sidebar( $tag_sidebar_id ) ) ? $tag_sidebar_id : false;
        }
        elseif( is_post_type_archive() )
        {
            $post_type = get_query_var('post_type');
            $post_type_sidebar_id = sprintf( 'post-type-%s', $post_type );
            $sidebar = ( is_active_sidebar( $post_type_sidebar_id ) ) ? $post_type_sidebar_id : false;
        }
        elseif( is_tax() )
        {
            $tax = get_term_by( 'name', single_term_title( '', false ), get_queried_object()->taxonomy );
            $tax_name = str_replace( '_', '-', get_queried_object()->taxonomy );
            $tax_sidebar_id = sprintf( '%s-%s', $tax_name, $tax->slug );
            $sidebar = ( is_active_sidebar( $tax_sidebar_id ) ) ? $tax_sidebar_id : false;
        }

        $sidebar = ($sidebar) ? $sidebar : get_theme_mod('taproot_blog_page_sidebar', 'sidebar-1');
    }
    else
    {
        $sidebar = ( 'full' === get_theme_mod( 'taproot_single_layout' ) ) 
            ? false 
            : get_theme_mod( 'taproot_single_sidebar' );
    }

    return ( isset($sidebar) && $sidebar !== '') ? $sidebar : false;
}


/**
 * Get Post Layout Type
 *
 * @since 0.8.0
 * 
 * @return string Returns the layout type for the current post. 
 */  
function taproot_get_layout()
{
    if( is_home() || is_archive() )
    {
        $layout = get_theme_mod('taproot_blog_layout');
    }
    else
    {
        $layout = get_theme_mod( 'taproot_single_layout' );
    }

    return ($layout) ? $layout : false;
}


/**
 * Output CSS Class attributes or return a string of classes
 *
 * @since 0.8.0
 * 
 * @param string $id - the id of the element we're getting classes for. 
 * @param mixed $class - string or array of classes to add. 
 * @param bool $print - should we echo the classes or return them?
 * @return string Returns classes in a space separated string.
 */  
function taproot_class( $id = false, $class = '',  $print = true )
{
    if( !$id ) return;

    if( ! empty( $class ) )
    {
        if( !is_array( $class ) )
        {
            $class = preg_split( '#\s+#', $class );
            $classes = array_merge( array(), $class );
        }
        else 
        {
            $classes = $class;
        }
    }

    $classes[] = $id;

    $classes = array_map( 'esc_attr', $classes );

    $filter = sprintf( 'taproot-class-filter--%s', $id );

    $classes = apply_filters( $filter, $classes );
    
    $classes = join( ' ', array_unique( $classes ) );

    if( $print )
    {
        printf( 'class="%s"', esc_attr( $classes ) );        
    }
    else 
    {
        return $classes;
    }
}


/**
 * Is Taproot Pro Active?
 *
 * @since 0.8.0
 * @return bool
 */  
function is_taproot_pro()
{
    return ( defined('TAPROOT_PRO_PLUGIN_NAME') ) ? true : false;
}


/**
 * Output post box link
 *
 * @since 0.8.0
 * @return void
 */  
function taproot_post_box_link()
{
    $pb_link_style = get_theme_mod('taproot_post_box_link_style');
    if( get_theme_mod('taproot_post_show_all') || 'inline' === $pb_link_style || 'none' === $pb_link_style ) 
        return false;

    $pb_link_text = esc_html( get_theme_mod( 'taproot_post_box_link_text', esc_html__( 'read more', 'taproot' ) ) );
    $pb_link_position = get_theme_mod( 'taproot_post_box_link_position' );

    $link_class = ( 'button' === $pb_link_style ) ? 'taproot-button post-box-action-button ' : '';
    $link_class .= ( 'right' === $pb_link_position ) ? 'alignright' : '';

    $action_class = 'entry-action';

    if( 'hard-left' == $pb_link_position ) 
        $action_class .= ' clear';

    elseif( 'right' == $pb_link_position ) 
        $action_class .= ' cf';

    printf( '<p class="%s">', esc_attr( $action_class ) );
    printf( '<a href="%s" class="%s"><span class="visuallyhidden">%s</span>%s</a>',  esc_url( get_permalink() ), esc_attr( $link_class ), get_the_title(), esc_html( $pb_link_text ) );
    echo '</p>';
}
