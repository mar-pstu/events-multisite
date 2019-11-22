<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };






/**
 * Перевод сблоков
 * */
foreach ( array(
    '_error404_title',
    '_error404_description',
    '_aboutus_title',
    '_aboutus_label',
) as $key ) {
    $value = wp_strip_all_tags( get_theme_mod( EVENTS_MULTISITE_SLUG . '_' . $key, '' ) );
    if ( ! empty( $value ) ) {
        pll_register_string( $key, $value, EVENTS_MULTISITE_TEXTDOMAIN, false );
    }
}