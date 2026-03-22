<?php
/**
 * AI 编辑器辅助 — 后端支持
 *
 * 功能：
 * - 加载 editor-ai.js 脚本（仅编辑器）
 * - 提供 API Key 配置选项
 * - 可选：后端代理 API 调用（生产环境推荐）
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 在块编辑器中加载 AI 辅助脚本
 * 仅在编辑器环境加载，不影响前端性能
 */
add_action( 'enqueue_block_editor_assets', function () {
	$ver = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'cclee-editor-ai',
		get_template_directory_uri() . '/assets/js/editor-ai.js',
		[ 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-api' ],
		$ver,
		true
	);

	// 传递配置到前端
	wp_localize_script(
		'cclee-editor-ai',
		'ccleeAIConfig',
		[
			'apiKey'    => get_option( 'cclee_ai_api_key', '' ),
			'isEnabled' => get_option( 'cclee_ai_enabled', false ),
		]
	);
} );

/**
 * 添加设置页面到「设置」菜单
 */
add_action( 'admin_menu', function () {
	add_options_page(
		'CCLEE AI Settings',
		'CCLEE AI',
		'manage_options',
		'cclee-ai-settings',
		'cclee_ai_settings_page_callback'
	);
} );

/**
 * 注册设置字段（使用 Settings API）
 */
add_action( 'admin_init', function () {
	// 注册设置组
	register_setting( 'cclee_ai_settings', 'cclee_ai_api_key', [
		'type'              => 'string',
		'sanitize_callback' => 'sanitize_text_field',
		'show_in_rest'      => false,
	] );

	register_setting( 'cclee_ai_settings', 'cclee_ai_enabled', [
		'type'              => 'boolean',
		'sanitize_callback' => 'rest_sanitize_boolean',
		'default'           => false,
	] );

	// 添加设置区域
	add_settings_section(
		'cclee_ai_main_section',
		'AI Assistant Configuration',
		null,
		'cclee-ai-settings'
	);

	// 添加启用开关字段
	add_settings_field(
		'cclee_ai_enabled',
		'Enable AI Assistant',
		'cclee_ai_enabled_field_callback',
		'cclee-ai-settings',
		'cclee_ai_main_section'
	);

	// 添加 API Key 字段
	add_settings_field(
		'cclee_ai_api_key',
		'API Key',
		'cclee_ai_api_key_field_callback',
		'cclee-ai-settings',
		'cclee_ai_main_section'
	);
} );

/**
 * 启用开关字段回调
 */
function cclee_ai_enabled_field_callback() {
	$value = get_option( 'cclee_ai_enabled', false );
	?>
	<label>
		<input type="checkbox"
			   name="cclee_ai_enabled"
			   value="1"
			<?php checked( $value, true ); ?>>
		Enable AI content generation in editor
	</label>
	<?php
}

/**
 * API Key 字段回调
 */
function cclee_ai_api_key_field_callback() {
	$value = get_option( 'cclee_ai_api_key', '' );
	?>
	<input type="password"
		   name="cclee_ai_api_key"
		   value="<?php echo esc_attr( $value ); ?>"
		   class="regular-text">
	<p class="description">Your OpenAI API key (or compatible service)</p>
	<?php
}

/**
 * 设置页面回调
 */
function cclee_ai_settings_page_callback() {
	?>
	<div class="wrap">
		<h1>CCLEE AI Settings</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'cclee_ai_settings' );
			do_settings_sections( 'cclee-ai-settings' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * 后端代理 API 调用
 * 避免在前端暴露 API Key
 */
add_action( 'rest_api_init', function () {
	register_rest_route( 'cclee/v1', '/ai/generate', [
		'methods'             => 'POST',
		'callback'            => 'cclee_ai_generate_content',
		'permission_callback' => function () {
			return current_user_can( 'edit_posts' );
		},
	] );
} );

function cclee_ai_generate_content( WP_REST_Request $request ) {
	$prompt = $request->get_param( 'prompt' );
	$type   = $request->get_param( 'type' ) ?: 'paragraph';

	$api_key = get_option( 'cclee_ai_api_key', '' );
	if ( empty( $api_key ) ) {
		return new WP_Error( 'no_api_key', 'API Key not configured', [ 'status' => 400 ] );
	}

	$prompts = [
		'paragraph' => 'Write a clear, SEO-friendly paragraph about: ',
		'headline'  => 'Write an attention-grabbing headline for: ',
		'list'      => 'Create a list of key points about: ',
		'cta'       => 'Write a compelling call-to-action for: ',
		'faq'       => 'Generate 3 FAQ items with answers about: ',
	];

	$full_prompt = ( $prompts[ $type ] ?? '' ) . $prompt;

	$response = wp_remote_post( 'https://api.openai.com/v1/chat/completions', [
		'headers' => [
			'Content-Type'  => 'application/json',
			'Authorization' => 'Bearer ' . $api_key,
		],
		'body'    => json_encode( [
			'model'      => 'gpt-3.5-turbo',
			'messages'   => [
				[ 'role' => 'system', 'content' => 'You are a helpful content writing assistant.' ],
				[ 'role' => 'user', 'content' => $full_prompt ],
			],
			'max_tokens' => 500,
		] ),
	] );

	if ( is_wp_error( $response ) ) {
		return new WP_Error( 'api_error', $response->get_error_message(), [ 'status' => 500 ] );
	}

	$body = json_decode( wp_remote_retrieve_body( $response ), true );

	return [
		'content' => $body['choices'][0]['message']['content'] ?? '',
	];
}
