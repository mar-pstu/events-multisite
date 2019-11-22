<?php


define( 'EVENTS_MULTISITE_URL', get_template_directory_uri() . '/' );
define( 'EVENTS_MULTISITE_DIR', get_template_directory() . '/' );
define( 'EVENTS_MULTISITE_TEXTDOMAIN', 'starter' );
define( 'EVENTS_MULTISITE_VERSION', '0.0.2' );
define( 'EVENTS_MULTISITE_SLUG', 'events-multisite' );




get_template_part( 'includes/enqueue' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/gutenberg' );




/**
 * Регистрация переводов строк
 */
if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}




/**
 * Регистрация настроек кастомайзера
 */
if ( is_customize_preview() ) {
	add_action( 'customize_register', function ( $wp_customize ) {
		$slug = EVENTS_MULTISITE_SLUG;
		$wp_customize->add_panel(
			$slug,
			array(
				'capability'      => 'edit_theme_options',
				'title'           => __( 'Настройки темы', EVENTS_MULTISITE_TEXTDOMAIN ),
				'priority'        => 200
			)
		);
		if ( is_multisite() && is_main_site() ) {
			$sites = get_sites( array(
				'site__not_in'  => array( get_main_site_id() ),
			) );
			if ( is_array( $sites ) && ! empty( $sites ) ) {
				$wp_customize->add_panel(
					"{$slug}_multisite",
					array(
						'capability'      => 'edit_theme_options',
						'title'           => __( 'Настройки сайтов сети', EVENTS_MULTISITE_TEXTDOMAIN ),
						'priority'        => 200
					)
				);
				include get_theme_file_path( 'customizer/categories.php' );
				foreach ( $sites as $site ) {
					$bloginfo = get_blog_details( $site->blog_id );
					include get_theme_file_path( 'customizer/site.php' );
				}
			}
		}
		include get_theme_file_path( 'customizer/404.php' );
	} );
}




function starter_theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
	add_image_size( 'thumbnail-3x2', 600, 400, true );
}
add_action( 'after_setup_theme', 'starter_theme_supports' );



/**
 * Загрузка "переводов"
 */
function starter_load_textdomain() {
	load_theme_textdomain( EVENTS_MULTISITE_TEXTDOMAIN, EVENTS_MULTISITE_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'starter_load_textdomain' );



/**
 * Регистрация меню
 */
function resume_register_nav_menus() {
	register_nav_menus( array(
		'main'      => __( 'Главное меню', EVENTS_MULTISITE_TEXTDOMAIN ),
	) );
}
add_action( 'after_setup_theme', 'resume_register_nav_menus' );




/**
 * Регистрация "сайдбаров"
 */
function starter_register_sidebars() {
	register_sidebar( array(
		'name'             => __( 'Колонка', EVENTS_MULTISITE_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
}
add_action( 'widgets_init', 'starter_register_sidebars' );





/**
 * Редирект на запись со страницы поиска, если найдена всего одна запись
 */
function starter_single_result(){  
	if( ! is_search() ) return;
	global $wp_query;
	if( $wp_query->post_count == 1 ) {  
		wp_redirect( get_permalink( reset( $wp_query->posts )->ID ) );
		die;
	}  
}
add_action( 'template_redirect', 'starter_single_result' );