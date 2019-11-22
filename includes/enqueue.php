<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };




/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function events_multisite_scripts() {
	wp_enqueue_script( 'events-multisite-main', EVENTS_MULTISITE_URL . 'scripts/main.js', array( 'jquery', 'fancybox' ), EVENTS_MULTISITE_VERSION, true );
	wp_localize_script( 'events-multisite-main', 'events-multisiteTheme', array( 'toTopBtn' => 'Наверх' ) );
	wp_enqueue_script( 'lazyload', EVENTS_MULTISITE_URL . 'scripts/lazyload.js', array( 'jquery' ), '1.7.6', true );
	wp_enqueue_script( 'fancybox', EVENTS_MULTISITE_URL . 'scripts/fancybox.js', array( 'jquery' ), '3.3.5', true );
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	wp_add_inline_script( 'lazyload', "jQuery( '.lazy' ).lazy();", 'after' );
	wp_enqueue_script( 'superembed', EVENTS_MULTISITE_URL . 'scripts/superembed.js', array( 'jquery' ), '3.1', true );
}
add_action( 'wp_enqueue_scripts', 'events_multisite_scripts' );






/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function events_multisite_styles() {
	wp_enqueue_style( 'events-multisite-main', EVENTS_MULTISITE_URL . 'styles/main.css', array(), EVENTS_MULTISITE_VERSION, 'all' );
	wp_enqueue_style( 'events-multisite-font', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&amp;display=swap&amp;subset=cyrillic,cyrillic-ext', array(), '14', 'all' );
	wp_enqueue_style( 'fancybox', EVENTS_MULTISITE_URL . 'styles/fancybox.css', array(), '3.3.5', 'all' );
	wp_enqueue_style( 'slick', EVENTS_MULTISITE_URL . 'styles/slick.css', array(), '1.8.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'events_multisite_styles', 10, 0 );







function events_multisite_ctitical_styles() {
	if ( file_exists( EVENTS_MULTISITE_DIR . 'styles/critical.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( EVENTS_MULTISITE_DIR . 'styles/critical.css' ) . '</style>';
	}
}
add_action( 'wp_head', 'events_multisite_ctitical_styles', 10, 0 );