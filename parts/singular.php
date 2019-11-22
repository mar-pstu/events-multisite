<?php 



namespace events_multisite;



if ( ! defined( 'ABSPATH' ) ) { exit; };



if ( have_posts() ) {

	while ( have_posts() ) {
		
		the_post();

		the_title( '<h1>', '</h1>', true );

		the_breadcrumb();

		the_content();

		the_pager();

		comments_template();

	}

}
