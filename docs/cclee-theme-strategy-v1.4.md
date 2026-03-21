# cclee-theme 策略决策文档

> 版本：v1.4 | 定位：轻量 FSE 开源主题 | 对标：GeneratePress 路线

---

## 零、核心定义（评审基准，所有文档以此为准）

| 术语 | 定义 |
|------|------|
| **目标用户** | 开发者（含代理商、自由职业者、独立开发者），非大众用户 |
| **轻电商** | 主题层保证 WP+Woo 核心页面样式正常，不重写 Woo 模板。主题管样式，Woo 管功能 |
| **替代 Shopify** | 面向出海企业，WP+Woo+cclee-theme 组合在总拥有成本、灵活性、本地化上优于 Shopify |
| **Style Variations** | 免费提供 2-3 套配色方案，超出部分为付费扩展 |

---

## 一、定位

**极致轻量 + FSE 原生 + 开发者友好**

| 对标 | Astra | GeneratePress | **cclee-theme** |
|------|-------|---------------|-----------------|
| 架构 | Classic + FSE 混合 | Classic 为主 | 纯 FSE 原生 |
| 体积 | ~50KB | <10KB | 目标 <20KB |
| 用户 | 大众 | 开发者 | 开发者 |
| AI | 有（建站） | 无 | 内置内容辅助层 |
| 开源 | 免费+Pro | 免费+Pro | 完全开源免费 |

> **定位说明**：目标用户收窄为开发者（含代理商、自由职业者、独立开发者）。WP 生态已分层固化，大众用户依赖 Elementor / 成品模板，初学者是过渡态非稳定群体。服务好开发者，通过其项目复用和社区传播实现增长。

---

## 二、核心原则

### 1. SEO / GEO 友好

**目标：对搜索引擎和生成式 AI 引擎（ChatGPT/Perplexity等）都友好**

实现要求：

- 所有模板使用语义化 HTML5 标签（`<article>` `<main>` `<nav>` `<aside>`）
- 每个 pattern 内置 FAQ schema 占位注释，提示用户填入结构化数据
- `<head>` 区域干净，不输出冗余 meta
- Open Graph / Twitter Card 基础支持（通过 `inc/seo.php` 轻量实现）
- 页面标题结构：`文章标题 | 站点名`，由 `title-tag` theme support 控制
- GEO 专项：正文内容区使用 `<article>` 包裹，段落语义清晰，有利于 AI 抓取引用

```
inc/
└── seo.php    # 新增：OG标签 + 基础schema输出
```

---

### 2. 开发者友好（代码即文档）

**原则：结构清晰、约束明确、可直接作为客户项目底座**

| 层级 | 开发者操作 | 效果 |
|------|-----------|------|
| `theme.json` | 直接编辑 token | 全局样式实时同步 |
| `templates/` | 编辑 HTML 文件 | Site Editor 模板同步 |
| `patterns/` | 编写 PHP pattern | 预制区块可复用 |
| `parts/` | 编辑 header/footer | 模板部件同步 |

**约束（禁止事项）：**
- 禁止为可视化功能引入额外 PHP 逻辑层
- 禁止使用 Customizer（FSE 架构中已废弃）
- 禁止硬编码颜色/字体，全部引用 `var(--wp--preset--*)` token

**代码注释规范：**

每个 pattern 文件顶部必须包含：
```php
<?php
/**
 * Title: Hero Centered
 * Slug: cclee-theme/hero-centered
 * Categories: cclee-featured
 * Description: 居中布局 Hero 区块，适合首页主视觉。
 * 可视化用户：直接插入使用，修改文字和背景图即可。
 * 开发者：修改 Cover 块属性或替换为自定义 HTML。
 */
```

---

### 3. 三端同步（响应式）

**方案：FSE 原生响应式，不引入额外依赖**

- 断点策略完全依赖 WordPress block editor 原生响应式控制
- `theme.json` 的 `layout.contentSize` 和 `layout.wideSize` 作为唯一宽度基准
- patterns 布局使用 `core/columns` 的响应式堆叠，不写自定义媒体查询
- 例外：`assets/css/custom.css` 可补充 theme.json 无法覆盖的细节断点

**目标验证：**
- Mobile（375px）：单列，触控友好
- Tablet（768px）：自适应过渡
- Desktop（1200px+）：宽布局展开

---

### 4. AI 接入（分层策略）

**第一层（随主题发布）：编辑器侧边栏辅助**

- `editor-ai.js` 通过 `enqueue_block_editor_assets` hook 加载，**仅操作编辑器 UI 层**（侧边栏 Panel），不操作内容 iframe
- `patterns/ai-content-block.php` 提供**可直接运行的最小示例**：预填 prompt 模板 + API 调用示例代码，用户替换 API Key 即可跑通
- 开发者可直接扩展或作为客户项目集成起点
- **不增加前端体积**，`editor-ai.js` 仅在编辑器内加载

> **技术约束说明**：WordPress Site Editor 始终处于 iframe 中，`enqueue_block_editor_assets` 脚本挂载在父级 window，无法直接操作内容区 iframe。因此 AI 功能范围限定为编辑器 UI 层交互（侧边栏按钮、提示面板），内容插入由用户手动完成。

**第二层（v2 规划）：前端 AI Widget**

- 独立 plugin 形式发布，不耦合主题
- 通过 `wp_footer` hook 挂载
- 支持接入 Claude / OpenAI / 本地模型

---

## 三、架构文件

```
cclee-theme/
├── style.css
├── theme.json                  # 设计 token 唯一来源
├── functions.php
├── index.php
│
├── templates/
│   ├── index.html
│   ├── single.html
│   ├── page.html
│   ├── archive.html
│   ├── search.html
│   └── 404.html
│
├── parts/
│   ├── header.html
│   ├── footer.html
│   └── sidebar.html
│
├── patterns/
│   ├── hero-simple.php
│   ├── hero-centered.php
│   ├── features-grid.php
│   ├── cta-banner.php
│   ├── footer-columns.php
│   └── ai-content-block.php
│
├── assets/
│   ├── css/custom.css
│   ├── js/
│   │   ├── theme.js
│   │   └── editor-ai.js
│   └── images/
│
└── inc/
    ├── setup.php
    ├── block-styles.php
    ├── block-patterns.php
    └── seo.php
```

---

## 四、开发阶段规划

### 阶段一：核心可用
- [ ] 模板填充（header/footer parts 引用）
- [ ] theme.json 色彩中性化
- [ ] custom.css 极简重置
- [ ] `inc/seo.php` 基础实现

### 阶段二：轻量化验证
- [ ] 页面体积 <20KB
- [ ] block-styles 按需注册
- [ ] theme.js 最小化或移除
- [ ] Core Web Vitals：LCP <2.5s，CLS <0.1

### 阶段三：扩展性
- [ ] Style Variations（2-3套，见核心定义）
- [ ] 补充 patterns：contact、testimonial、pricing、team
- [ ] WooCommerce 样式兼容（见核心定义：轻电商）
- [ ] `editor-ai.js` + `ai-content-block.php`

### 阶段四：发布准备
- [ ] README.md 双语，含开发者入门案例
- [ ] screenshot.png
- [ ] GitHub Release v1.0.0
- [ ] WordPress.org 规范审查（可选）

---

## 五、变现路径

**优先级：服务溢价 → 付费扩展 → 赞助**

| 路径 | 时机 | 说明 |
|------|------|------|
| 技术服务溢价 | 当前 | 主题作为 Upwork 接单背书，间接提升报价空间 |
| 付费扩展包 | 中期 | cclee-theme-woo 子主题、高级 Variations、Pattern 库、AI Widget 插件 |
| GitHub Sponsors | 长期 | 依赖用户基数，冷启动期不作为目标 |

---

## 六、命名与代码规范

- 文本域：`cclee-theme`
- 函数前缀：`cclee_`
- CSS 自定义属性：优先 `var(--wp--preset--*)`，自定义用 `--cclee-*`
- PHP ≥ 8.0，WordPress ≥ 6.4

---

*v1.4 — 新增「零、核心定义」节作为评审基准；精简冗余说明*
