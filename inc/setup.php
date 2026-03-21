<?php
/**
 * 主题基础设置
 */

add_action( 'after_setup_theme', function () {
    load_theme_textdomain( 'cclee-theme', get_template_directory() . '/languages' );

    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );

    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'cclee-theme' ),
        'footer'  => __( 'Footer Menu', 'cclee-theme' ),
    ] );
} );

add_action( 'wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get( 'Version' );
    wp_enqueue_style(
        'cclee-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        [],
        $ver
    );
} );

add_action( 'wp_footer', function() {
    do_action( 'cclee_float_widget' );
}, 99 );
