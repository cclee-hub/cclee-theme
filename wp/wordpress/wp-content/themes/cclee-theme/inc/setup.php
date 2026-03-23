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

    // 加载编辑器样式，确保后台与前台一致
    add_editor_style( 'assets/css/custom.css' );

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
    wp_enqueue_script(
        'cclee-theme',
        get_template_directory_uri() . '/assets/js/theme.js',
        [],
        $ver,
        true
    );
} );

add_action( 'wp_footer', function() {
    do_action( 'cclee_float_widget' );
}, 99 );

/**
 * 主题激活时创建默认导航菜单
 */
add_action( 'after_switch_theme', function () {
    // 检查是否已存在导航
    $existing = get_posts( [
        'post_type'      => 'wp_navigation',
        'posts_per_page' => 1,
    ] );

    if ( ! empty( $existing ) ) {
        return;
    }

    // 页面 slug 映射
    $pages = [
        'home'      => get_page_by_path( 'home' ),
        'about-us'  => get_page_by_path( 'about-us' ),
        'products'  => get_page_by_path( 'products' ),
        'blog'      => get_page_by_path( 'blog' ),
        'contact'   => get_page_by_path( 'contact' ),
    ];

    // 构建 Primary 导航内容
    $primary_links = [];

    // Home - 自定义链接
    $primary_links[] = '<!-- wp:navigation-link {"label":"Home","url":"/","type":"custom"} /-->';

    // 其他页面链接
    foreach ( [ 'about-us', 'products', 'blog', 'contact' ] as $slug ) {
        if ( ! empty( $pages[ $slug ] ) ) {
            $page = $pages[ $slug ];
            $primary_links[] = sprintf(
                '<!-- wp:navigation-link {"label":"%s","type":"page","id":%d,"kind":"post-type","url":"%s"} /-->',
                esc_attr( $page->post_title ),
                $page->ID,
                esc_url( get_permalink( $page->ID ) )
            );
        }
    }

    // 创建 Primary 导航
    $primary_id = wp_insert_post( [
        'post_title'   => 'Main Menu',
        'post_name'    => 'main-menu',
        'post_type'    => 'wp_navigation',
        'post_status'  => 'publish',
        'post_content' => implode( '', $primary_links ),
    ] );

    // 构建 Footer 导航内容
    $footer_links = [];
    foreach ( [ 'about-us', 'contact', 'blog' ] as $slug ) {
        if ( ! empty( $pages[ $slug ] ) ) {
            $page = $pages[ $slug ];
            $footer_links[] = sprintf(
                '<!-- wp:navigation-link {"label":"%s","type":"page","id":%d,"kind":"post-type","url":"%s"} /-->',
                esc_attr( $page->post_title ),
                $page->ID,
                esc_url( get_permalink( $page->ID ) )
            );
        }
    }

    // 创建 Footer 导航
    $footer_id = wp_insert_post( [
        'post_title'   => 'Footer Menu',
        'post_name'    => 'footer-menu',
        'post_type'    => 'wp_navigation',
        'post_status'  => 'publish',
        'post_content' => implode( '', $footer_links ),
    ] );

    // 将导航分配到菜单位置（关键！）
    if ( $primary_id && $footer_id ) {
        set_theme_mod( 'nav_menu_locations', [
            'primary' => $primary_id,
            'footer'  => $footer_id,
        ] );
    }
} );
