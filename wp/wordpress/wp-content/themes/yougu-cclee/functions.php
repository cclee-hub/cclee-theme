<?php
/**
 * Yougu CCLEE Child Theme
 *
 * 子主题函数文件
 * 继承父主题 cclee-theme 的所有功能
 */

// 防止直接访问
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 加载父主题和子主题样式
 */
function yougu_cclee_enqueue_styles(): void
{
    // 加载父主题样式
    wp_enqueue_style(
        'cclee-theme-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme(get_template())->get('Version')
    );

    // 加载子主题样式（如有自定义样式）
    wp_enqueue_style(
        'yougu-cclee-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('cclee-theme-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'yougu_cclee_enqueue_styles');
