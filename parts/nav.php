<?php


namespace events_multisite;



if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<nav class="nav nav" id="nav">
	<div class="bg"></div>
	<div class="overlay">
		<div class="text-right">
			<button class="close pull-right" id="close">
				<span class="sr-only"><?php _e( 'Закрыть меню', EVENTS_MULTISITE_TEXTDOMAIN ); ?></span>
			</button>
		</div>
		<?php echo get_languages_list(); ?>
		<?php if ( has_nav_menu( 'main' ) ) : ?>
			<h2><?php _e( 'Меню', EVENTS_MULTISITE_TEXTDOMAIN ); ?></h2>
			<?php
				wp_nav_menu( array(
					'theme_location'  => 'main',
					'menu'            => 'main',
					'container'       => false,
					'menu_class'      => 'nav__list list',
					'echo'            => true,
					'depth'           => 2,
				) );
			?>
		<?php endif; ?>
	</div>
</nav>