<?php
/**
 * Pattern 分类注册
 * 具体 pattern 文件放在 patterns/ 目录，WP 自动加载
 */

add_action( 'init', function () {
    register_block_pattern_category( 'cclee', [
        'label' => __( 'Yougu Theme', 'cclee' ),
    ] );
} );
