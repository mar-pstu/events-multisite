<?php



namespace events_multisite;



if ( ! defined( 'ABSPATH' ) ) { exit; };



the_archive_title( '<h1>', '</h1>' );

the_breadcrumb();

if ( have_posts() ) {

	while ( have_posts() ) {
		
		the_post();

		?>

			<div id="post-<?php the_ID(); ?>" <?php post_class( 'archive__entry entry' ); ?>>
				<div class="row center-xs">
					<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
						<a class="entry__thumbnail thumbnail" href="<?php the_permalink( get_the_ID() ); ?>">
							<?php the_thumbnail_image( get_the_ID(), 'medium', 'src' ); ?>
						</a>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<?php the_title( '<h3 class="entry__title title">', '</h3>', true ); ?>
						<div class="entry__excerpt excerpt">
							<?php the_excerpt(); ?>
						</div>
						<p class="text-right">
							<a class="entry__permalink permalink" href="<?php the_permalink( get_the_ID() ); ?>">
								<?php _e( 'Подробней', EVENTS_MULTISITE ); ?>
							</a>
						</p>
					</div>
				</div>
			</div>

		<?php

	}


	the_posts_pagination(  );

}