<?php
/**
 * 自定义块样式注册
 * 使用 register_block_style() 扩展核心块的样式变体
 */

add_action( 'init', function () {
    // 示例：为按钮块注册"轮廓"样式变体
    // register_block_style( 'core/button', [
    //     'name'  => 'outline',
    //     'label' => __( 'Outline', 'cclee-theme' ),
    // ] );
} );
