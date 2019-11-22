<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body <?php body_class(); ?> data-nav="inactive">
		<?php get_template_part( 'parts/nav' ); ?>
		<div class="wrapper" id="wrapper">
			<header class="wrapper__item wrapper__item--header header" id="header">
				<div class="container">
					<div class="row center-xs middle-xs">
						<div class="col-xs-8">
							<div class="bloginfo">
								<?php if ( has_custom_logo() ) : ?>
									<a class="custom-logo-link" href="<?php echo home_url( '/' ); ?>">
										<?php echo events_multisite\get_custom_logo_img(); ?>
									</a>
								<?php endif; ?>
								<div class="wrap">
									<?php
										printf(
											'<%1$s class="name"><a href="%2$s">%3$s</a></%1$s>',
											( is_front_page() ) ? 'h1' : 'div',
											home_url( '/' ),
											get_bloginfo( 'name' )
										);
									?>
									<p class="description"><?php bloginfo( 'description' ); ?></p>
								</div>
							</div>
						</div>
						<div class="col-xs-4">
							<button class="burger" id="burger">
								<span class="bar bar1"></span>
								<span class="bar bar2"></span>
								<span class="bar bar3"></span>
								<span class="bar bar4"></span>
								<span class="sr-only"><?php _e( 'Открыть меню', EVENTS_MULTISITE_TEXTDOMAIN ); ?></span>
							</button>
						</div>
					</div>
				</div>
			</header>
			<main class="wrapper__item wrapper__item--main main" id="main">