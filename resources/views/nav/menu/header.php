<?php if ( has_nav_menu( $data->location ) ) : ?>

	<nav <?php Hybrid\Attr\display( 'menu', $data->location ) ?>>

		<h3 class="menu__title screen-reader-text">
			<?php Hybrid\Menu\display_name( $data->location ) ?>
		</h3>

        <?php Taproot\Template\menu_toggle( $data->location ); ?>

		<?php wp_nav_menu( [
            'theme_location' => $data->location,
            'menu_id'        => '',
			'container'      => false,             
			'menu_class'     => 'menu__items menu--header__items',
			'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'item_spacing'   => 'discard',
		] ) ?>

	</nav>

<?php endif ?>
