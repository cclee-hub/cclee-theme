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
    wp_localize_script( 'cclee-theme', 'ccleeTheme', [
        'restUrl' => esc_url_raw( rest_url() ),
    ] );
} );

add_action( 'wp_footer', function() {
    do_action( 'cclee_float_widget' );
}, 99 );

/**
 * Mobile Bottom Navigation (仅前台显示，不在编辑器中)
 * 样式在 assets/css/custom.css 中定义
 */
add_action( 'wp_footer', function() {
    // 仅在 WooCommerce 激活时显示
    if ( ! function_exists( 'WC' ) ) {
        return;
    }

    // 获取购物车数量
    $cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    ?>
    <nav class="cclee-mobile-bottom-nav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'cclee-theme' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cclee-mobile-bottom-nav__item" aria-label="<?php esc_attr_e( 'Home', 'cclee-theme' ); ?>">
            <?php echo cclee_svg( 'home' ); ?>
            <span><?php esc_html_e( 'Home', 'cclee-theme' ); ?></span>
        </a>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="cclee-mobile-bottom-nav__item" aria-label="<?php esc_attr_e( 'Shop', 'cclee-theme' ); ?>">
            <?php echo cclee_svg( 'shopping-cart' ); ?>
            <span><?php esc_html_e( 'Shop', 'cclee-theme' ); ?></span>
        </a>
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cclee-mobile-bottom-nav__item cclee-mobile-bottom-nav__item--cart" aria-label="<?php esc_attr_e( 'Cart', 'cclee-theme' ); ?>">
            <?php echo cclee_svg( 'shopping-cart' ); ?>
            <span><?php esc_html_e( 'Cart', 'cclee-theme' ); ?></span>
            <span class="cclee-mobile-bottom-nav__cart-count" aria-hidden="true"><?php echo absint( $cart_count ); ?></span>
        </a>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="cclee-mobile-bottom-nav__item" aria-label="<?php esc_attr_e( 'Account', 'cclee-theme' ); ?>">
            <?php echo cclee_svg( 'user' ); ?>
            <span><?php esc_html_e( 'Account', 'cclee-theme' ); ?></span>
        </a>
    </nav>
    <?php
}, 98 );

/**
 * 输出内联 SVG（主题自带静态资源，不需 wp_kses）
 *
 * @param string $name 图标文件名（不含 .svg 后缀），仅允许 a-z 0-9 - .
 * @return string SVG markup 或空字符串
 */
function cclee_svg( $name ) {
    $name = sanitize_key( $name );
    if ( ! $name ) {
        return '';
    }

    static $cache = [];
    if ( isset( $cache[ $name ] ) ) {
        return $cache[ $name ];
    }

    $path = get_theme_file_path( 'assets/icons/' . $name . '.svg' );
    if ( ! file_exists( $path ) ) {
        $cache[ $name ] = '';
        return '';
    }

    $svg = file_get_contents( $path );
    // 移除 XML 声明（如有）
    $svg = preg_replace( '/<\?xml[^?]*\?>\s*/', '', $svg );
    // 装饰性图标对屏幕阅读器隐藏
    $svg = str_replace( '<svg ', '<svg aria-hidden="true" ', $svg );

    $cache[ $name ] = $svg;
    return $svg;
}

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
