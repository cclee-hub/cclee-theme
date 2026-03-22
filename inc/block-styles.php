<?php
/**
 * 自定义块样式注册
 * 使用 register_block_style() 扩展核心块的样式变体
 */

add_action( 'init', function () {

    // Button: Outline
    register_block_style( 'core/button', [
        'name'  => 'outline',
        'label' => __( 'Outline', 'cclee-theme' ),
    ] );

    // Group: Card
    register_block_style( 'core/group', [
        'name'  => 'card',
        'label' => __( 'Card', 'cclee-theme' ),
    ] );

    // Separator: Thick
    register_block_style( 'core/separator', [
        'name'  => 'thick',
        'label' => __( 'Thick', 'cclee-theme' ),
    ] );

    // Quote: Accent Border
    register_block_style( 'core/quote', [
        'name'  => 'accent-border',
        'label' => __( 'Accent Border', 'cclee-theme' ),
    ] );

} );
