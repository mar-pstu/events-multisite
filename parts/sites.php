<?php


// namespace events_multisite;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$sites = get_sites( array(
	'site__not_in'  => array( get_main_site_id() ),
) );


?>



<?php if ( is_array( $sites ) && ! empty( $sites ) ) : ?>
	<div class="sites">
		<div class="container">
			<div class="sites">
				<div class="row center-xs">
					<?php foreach ( $sites as $site ) : ?>
						<?php
							$bloginfo = get_blog_details( $site->blog_id );
							$blogmods = get_theme_mod( "site_{$bloginfo->blog_id}", array() );
							$thumbnail_src = __return_empty_string();
							if ( ! isset( $blogmods[ 'thumbnail' ] ) || empty( $blogmods[ 'thumbnail' ] ) ) {
								$thumbnail_src = EVENTS_MULTISITE_URL . 'images/thumbnail.png';
							} else {
								$attachment_id = attachment_url_to_postid( $blogmods[ 'thumbnail' ] );
								$thumbnail_src = wp_get_attachment_image_url( $attachment_id, 'thumbnail-3x2', false );
							}
							switch_to_blog( $site->blog_id );
						?>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
							<a class="sites__item item" href="<?php echo home_url( '/' ); ?>">
								<img class="thumbnail lazy" src="#" data-src="<?php echo $thumbnail_src; ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>"/>
								<div class="wrap">
									<h3 class="title"><?php bloginfo( 'name' ); ?></h3>
								</div>
							</a>
						</div>
						<?php restore_current_blog(); ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>