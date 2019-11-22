<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "site_{$bloginfo->blog_id}",
    array(
        'title'            => $bloginfo->blogname,
        'priority'         => 10,
        'description'      => sprintf( __( 'Настройки отображения сайта %1$s', EVENTS_MULTISITE_TEXTDOMAIN ), $bloginfo->blogname ),
        'panel'            => "{$slug}_multisite",
    )
); /**/



$wp_customize->add_setting(
    "site_{$bloginfo->blog_id}[thumbnail]",
    array(
        'default'           => EVENTS_MULTISITE_URL . 'images/thumbnail.png',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_url',
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       "site_{$bloginfo->blog_id}[thumbnail]",
       array(
           'label'      => __( 'Превью', EVENTS_MULTISITE_TEXTDOMAIN ),
           'section'    => "site_{$bloginfo->blog_id}",
           'settings'   => "site_{$bloginfo->blog_id}[thumbnail]",
       )
   )
);
