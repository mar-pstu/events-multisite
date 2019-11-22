<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


if ( is_front_page() && is_multisite() && is_main_site() ) {

	get_template_part( 'parts/sites' );

} else {

	?>

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

					<?php

						if ( is_singular() ) {
							get_template_part( 'parts/singular' );
						} else {
							get_template_part( 'parts/archive' );
						}

					?>

				</div>
				<?php if ( is_active_sidebar( 'column' ) ) : ?>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

	<?php

}


get_footer();