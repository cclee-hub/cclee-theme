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
		// 本地代理端点（通过后端调用 OpenAI，避免暴露 API Key）
		apiEndpoint: '/wp-json/cclee/v1/ai/generate',
		// Prompt 类型
		prompts: {
			paragraph: 'paragraph',
			headline: 'headline',
			list: 'list',
			cta: 'cta',
			faq: 'faq',
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
		 * 调用 AI API（通过后端代理）
		 */
		async function generateContent() {
			if ( ! prompt.trim() ) {
				setError( 'Please enter a topic or prompt.' );
				return;
			}

			setLoading( true );
			setError( '' );
			setResult( '' );

			try {
				// 使用本地代理端点，API Key 在后端安全存储
				const apiRoot = window.wpApiSettings?.root || '/wp-json/';
				const nonce = window.wpApiSettings?.nonce || '';

				const response = await fetch( apiRoot + 'cclee/v1/ai/generate', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-WP-Nonce': nonce,
					},
					credentials: 'same-origin',
					body: JSON.stringify( {
						prompt: prompt,
						type: promptType,
					} ),
				} );

				if ( ! response.ok ) {
					const errorData = await response.json().catch( () => ( {} ) );
					throw new Error( errorData.message || `API Error: ${ response.status }` );
				}

				const data = await response.json();
				const generatedText = data.content || 'No content generated.';

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
						'API Key is securely stored on the server. Configure it via theme settings.'
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
