<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_error404",
    array(
        'title'            => __( 'Страница ошибки 404', EVENTS_MULTISITE_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Якорь #error404', EVENTS_MULTISITE_TEXTDOMAIN ),
        'panel'            => $slug,
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_error404_title",
    array(
        'default'           => __( 'Ошибка 404', EVENTS_MULTISITE_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_error404_title",
    array(
        'section'           => "{$slug}_error404",
        'label'             => __( 'Заголовок', EVENTS_MULTISITE_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_error404_description",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_error404_description",
    array(
        'section'           => "{$slug}_error404",
        'label'             => __( 'Подзаголовок', EVENTS_MULTISITE_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/


