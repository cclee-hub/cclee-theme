/**
 * CCLEE Theme — AI Editor Assistant
 *
 * 功能：编辑器侧边栏 AI 辅助面板
 * 仅在编辑器内加载，不影响前端性能
 *
 * 使用方式：
 * 1. 在主题设置中配置 API Key（或直接修改下方配置）
 * 2. 在编辑器中使用侧边栏面板生成内容
 */

( function ( wp ) {
	const { registerPlugin } = wp.plugins;
	const { PluginSidebar, PluginSidebarMoreMenuItem } = wp.editPost;
	const { createElement, useState } = wp.element;
	const { TextareaControl, Button, Spinner, Notice } = wp.components;

	// ===== 配置区域 =====
	const CONFIG = {
		// API 端点（可替换为其他兼容 API）
		apiEndpoint: 'https://api.openai.com/v1/chat/completions',
		// 模型选择
		model: 'gpt-3.5-turbo',
		// 默认 prompt 模板
		prompts: {
			paragraph: 'Write a clear, SEO-friendly paragraph about: ',
			headline: 'Write an attention-grabbing headline for: ',
			list: 'Create a list of key points about: ',
			cta: 'Write a compelling call-to-action for: ',
			faq: 'Generate 3 FAQ items with answers about: ',
		},
	};

	/**
	 * AI 辅助侧边栏组件
	 */
	function CCLEEAISidebar() {
		const [ prompt, setPrompt ] = useState( '' );
		const [ promptType, setPromptType ] = useState( 'paragraph' );
		const [ result, setResult ] = useState( '' );
		const [ loading, setLoading ] = useState( false );
		const [ error, setError ] = useState( '' );

		/**
		 * 调用 AI API
		 */
		async function generateContent() {
			if ( ! prompt.trim() ) {
				setError( 'Please enter a topic or prompt.' );
				return;
			}

			setLoading( true );
			setError( '' );
			setResult( '' );

			const fullPrompt = CONFIG.prompts[ promptType ] + prompt;

			try {
				// 注意：实际使用时 API Key 应从安全配置中获取
				// 这里仅作为示例，生产环境需要后端代理
				const apiKey = window.ccleeAI?.apiKey || '';

				if ( ! apiKey ) {
					throw new Error(
						'API Key not configured. Please add your API key in theme settings.'
					);
				}

				const response = await fetch( CONFIG.apiEndpoint, {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						Authorization: `Bearer ${ apiKey }`,
					},
					body: JSON.stringify( {
						model: CONFIG.model,
						messages: [
							{
								role: 'system',
								content:
									'You are a helpful content writing assistant. Write clear, engaging, and SEO-friendly content.',
							},
							{
								role: 'user',
								content: fullPrompt,
							},
						],
						max_tokens: 500,
						temperature: 0.7,
					} ),
				} );

				if ( ! response.ok ) {
					throw new Error( `API Error: ${ response.status }` );
				}

				const data = await response.json();
				const generatedText =
					data.choices?.[ 0 ]?.message?.content || 'No content generated.';

				setResult( generatedText );
			} catch ( err ) {
				setError( err.message || 'Failed to generate content.' );
			} finally {
				setLoading( false );
			}
		}

		/**
		 * 复制到剪贴板
		 */
		function copyToClipboard() {
			if ( result ) {
				navigator.clipboard.writeText( result );
			}
		}

		return createElement(
			PluginSidebar,
			{
				name: 'cclee-ai-sidebar',
				title: 'CCLEE AI Assistant',
				icon: 'editor-help',
			},
			createElement(
				'div',
				{ className: 'cclee-ai-panel', style: { padding: '16px' } },

				// Prompt 类型选择
				createElement( 'div', { style: { marginBottom: '16px' } }, [
					createElement( 'strong', null, 'Content Type' ),
					createElement(
						'select',
						{
							value: promptType,
							onChange: ( e ) => setPromptType( e.target.value ),
							style: {
								width: '100%',
								marginTop: '8px',
								padding: '8px',
							},
						},
						Object.keys( CONFIG.prompts ).map( ( type ) =>
							createElement(
								'option',
								{ key: type, value: type },
								type.charAt( 0 ).toUpperCase() + type.slice( 1 )
							)
						)
					),
				] ),

				// Prompt 输入
				createElement( TextareaControl, {
					label: 'Topic / Prompt',
					value: prompt,
					onChange: setPrompt,
					placeholder: 'Enter your topic or specific prompt...',
					rows: 3,
				} ),

				// 生成按钮
				createElement(
					Button,
					{
						isPrimary: true,
						onClick: generateContent,
						disabled: loading,
						style: { marginTop: '8px', width: '100%' },
					},
					loading ? 'Generating...' : 'Generate Content'
				),

				// 错误提示
				error &&
					createElement(
						Notice,
						{
							status: 'error',
							isDismissible: true,
							onRemove: () => setError( '' ),
							style: { marginTop: '16px' },
						},
						error
					),

				// 加载状态
				loading &&
					createElement(
						'div',
						{
							style: {
								display: 'flex',
								justifyContent: 'center',
								padding: '24px',
							},
						},
						createElement( Spinner )
					),

				// 生成结果
				result &&
					createElement(
						'div',
						{ style: { marginTop: '16px' } },
						createElement( 'strong', null, 'Generated Content:' ),
						createElement(
							'div',
							{
								style: {
									background: '#f5f5f5',
									padding: '12px',
									borderRadius: '4px',
									marginTop: '8px',
									whiteSpace: 'pre-wrap',
									fontSize: '14px',
								},
							},
							result
						),
						createElement(
							Button,
							{
								isSecondary: true,
								onClick: copyToClipboard,
								style: { marginTop: '8px' },
							},
							'Copy to Clipboard'
						)
					),

				// 使用说明
				createElement(
					'div',
					{
						style: {
							marginTop: '24px',
							paddingTop: '16px',
							borderTop: '1px solid #ddd',
							fontSize: '12px',
							color: '#666',
						},
					},
					createElement( 'strong', null, 'Setup:' ),
					createElement(
						'p',
						null,
						'Add your API key via theme settings or modify window.ccleeAI.apiKey in your custom scripts.'
					)
				)
			)
		);
	}

	// 注册插件
	registerPlugin( 'cclee-ai-assistant', {
		render: CCLEEAISidebar,
	} );
} )( window.wp );
