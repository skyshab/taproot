<?php
/**
 * Template for displaying search forms
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<form role="search" method="get" class="taproot-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>

		<span class="visuallyhidden"><?php esc_html_e( 'Search for:', 'taproot' ); ?></span>
		<div class="input-group">
			<input type="search" class="taproot-search__field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'taproot' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

			<button type="submit" class="taproot-search__button"><?php do_taproot_icon( 'search_widget', true ); ?></button>
		</div>

	</label>
</form>
