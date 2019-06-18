<?php if ( is_home() ) : ?>

	<div class="archive-header archive-header--blog">
		<h1 class="archive-header__title archive-header__title--blog"><?php Taproot\Template\blog_title() ?></h1>
	</div>

<?php elseif ( ! is_front_page() ) : ?>

	<div class="archive-header">

		<h1 class="archive-header__title"><?php the_archive_title() ?></h1>

		<?php if ( ! is_paged() && get_the_archive_description() ) : ?>

			<div class="archive-header__description">
				<?php the_archive_description() ?>
			</div>

		<?php endif ?>

	</div>

<?php endif; ?>