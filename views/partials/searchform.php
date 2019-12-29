<?php
/**
 * Template for displaying search forms
 *
 * @package taproot
 * @since 1.0.0
 */
?>

<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="visuallyhidden"><?php esc_html_e( 'Search for:', 'taproot' ); ?></span>
        <div class="searchform__inputs">
            <input type="search" class="searchform__search" placeholder="<?php esc_attr_e( 'Search &hellip;', 'taproot' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="searchform__submit">
                <?php echo Hybrid\app('icons')->location('search-submit', ['icon' => 'search']) ?>
            </button>
        </div>
    </label>
</form>