<?php
/**
 * Title: AI Content Block
 * Slug: cclee-theme/ai-content-block
 * Categories: cclee-theme, featured
 * Description: AI 辅助内容区块示例，展示如何集成 AI 生成内容
 *
 * 使用说明：
 * 1. 此 pattern 展示 AI 生成内容的基本结构
 * 2. 实际 AI 功能通过 editor-ai.js 在编辑器侧边栏实现
 * 3. 用户可替换 API Key 后直接使用
 *
 * 开发者扩展：
 * - 修改 assets/js/editor-ai.js 中的 CONFIG 对象配置 API
 * - 可替换为其他 AI 服务（Claude、本地模型等）
 * - 生产环境建议通过后端代理调用 API，避免暴露密钥
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}},"border":{"radius":"8px"}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-contrast-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">

		<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
		<p class="has-text-align-center has-large-font-size">🤖</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":3} -->
		<h3 class="wp-block-heading has-text-align-center">AI-Generated Content</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"secondary"} -->
		<p class="has-text-align-center has-secondary-color has-text-color">Replace this block with AI-generated content from the sidebar assistant.</p>
		<!-- /wp:paragraph -->

		<!-- wp:separator {"backgroundColor":"secondary","className":"is-style-wide"} -->
		<hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background is-style-wide"/>
		<!-- /wp:separator -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">Use the <strong>CCLEE AI Assistant</strong> panel in the editor sidebar to generate custom content. Configure your API key, enter a topic, and click generate.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
			<!-- wp:button {"backgroundColor":"accent","textColor":"base"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Try AI Assistant</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">

	<!-- wp:heading {"level":4} -->
	<h4 class="wp-block-heading">📝 Developer Notes</h4>
	<!-- /wp:heading -->

	<!-- wp:list -->
	<ul>
		<li><strong>API Configuration:</strong> Edit <code>assets/js/editor-ai.js</code> CONFIG object</li>
		<li><strong>Security:</strong> For production, proxy API calls through your backend</li>
		<li><strong>Customization:</strong> Add your own prompt templates to the prompts object</li>
		<li><strong>Alternative APIs:</strong> Compatible with Claude, local LLMs, or any OpenAI-compatible endpoint</li>
	</ul>
	<!-- /wp:list -->

	<!-- wp:code -->
	<pre class="wp-block-code"><code>// Example: Configure API in your functions.php or custom script
add_action( 'admin_head', function() {
    ?&gt;
    &lt;script&gt;
    window.ccleeAI = {
        apiKey: '&lt;?php echo esc_js( get_option( 'cclee_ai_api_key' ) ); ?&gt;'
    };
    &lt;/script&gt;
    &lt;?php
} );</code></pre>
	<!-- /wp:code -->

</div>
<!-- /wp:group -->
