# CCLEE Theme 缺口清单设计

> **状态**: 已确认 | **日期**: 2026-03-22 | **优先级**: P0-P2

## 概述

基于 `cclee-theme-dev.md` 缺口清单，设计 5 项缺失功能，面向 B 端/企业场景的高级感 UI。

---

## 1. Landing Page 模板 (P0)

### 模板文件

`templates/page-landing.html`

### 设计原则

- 无 header/footer，纯净转化页
- 全屏沉浸式设计
- 最小化导航（仅 Logo + CTA）
- 单一焦点，减少干扰
- 高对比度 CTA 按钮
- 移动端优先

### 模板结构

```html
<!-- wp:html -->
<a class="cclee-landing-back" href="/">← Back to Site</a>
<!-- /wp:html -->

<!-- wp:post-content {"layout":{"type":"default"}} /-->

<!-- wp:html -->
<footer class="cclee-landing-footer">
  <span>© 2026 CCLEE</span>
</footer>
<!-- /wp:html -->
```

### 新增 Patterns

| Pattern | Slug | 用途 |
|---------|------|------|
| Landing Hero Form | `cclee-theme/landing-hero-form` | Hero + 侧边表单（线索收集） |
| Video Hero | `cclee-theme/landing-video-hero` | 视频背景 Hero |
| Simple Pricing | `cclee-theme/landing-pricing-simple` | 简化定价表（2-3档） |
| Trust Bar | `cclee-theme/landing-trust-bar` | 信任徽章横条 |
| Countdown | `cclee-theme/landing-countdown` | 倒计时组件 |

### CSS 组件

```css
/* 返回链接 */
.cclee-landing-back {
  position: fixed;
  top: 20px;
  left: 20px;
  z-index: 100;
  color: var(--wp--preset--color--neutral-400);
  text-decoration: none;
  font-size: var(--wp--preset--font-size--small);
}

/* 底部版权 */
.cclee-landing-footer {
  position: fixed;
  bottom: 20px;
  left: 0;
  right: 0;
  text-align: center;
  font-size: var(--wp--preset--font-size--small);
  color: var(--wp--preset--color--neutral-500);
}
```

---

## 2. Case Study 详情模板 (P1)

### CPT 注册

**文章类型**: `case-study`

```php
register_post_type('case-study', [
  'labels' => [
    'name' => 'Case Studies',
    'singular_name' => 'Case Study',
  ],
  'public' => true,
  'has_archive' => true,
  'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
  'rewrite' => ['slug' => 'case-studies'],
  'menu_icon' => 'dashicons-portfolio',
]);
```

### ACF 字段

| 字段 | 类型 | 说明 |
|------|------|------|
| `client_name` | text | 客户名称 |
| `client_logo` | image | 客户 Logo |
| `client_industry` | select | 行业 |
| `client_size` | select | 规模 |
| `project_duration` | text | 项目周期 |
| `challenge` | textarea | 挑战描述 |
| `solution` | wysiwyg | 解决方案 |
| `metrics` | group | 成果数据 |
| `metrics.metric_1_label` | text | 指标1标签 |
| `metrics.metric_1_value` | text | 指标1数值 |
| `metrics.metric_2_label` | text | 指标2标签 |
| `metrics.metric_2_value` | text | 指标2数值 |
| `metrics.metric_3_label` | text | 指标3标签 |
| `metrics.metric_3_value` | text | 指标3数值 |
| `metrics.metric_4_label` | text | 指标4标签 |
| `metrics.metric_4_value` | text | 指标4数值 |
| `testimonial` | group | 客户评价 |
| `testimonial.content` | textarea | 评价内容 |
| `testimonial.name` | text | 姓名 |
| `testimonial.title` | text | 职位 |
| `gallery` | gallery | 项目图片 |

### 模板结构

```
┌─────────────────────────────────────┐
│  Header                             │
├─────────────────────────────────────┤
│  Hero: 客户 Logo + 标题 + 标签      │
├─────────────────────────────────────┤
│  概览: 行业/规模/周期 (3列图标)     │
├─────────────────────────────────────┤
│  挑战: 问题背景                      │
├─────────────────────────────────────┤
│  解决方案: 图文混排                  │
├─────────────────────────────────────┤
│  成果数据: 4个指标卡片               │
├─────────────────────────────────────┤
│  客户评价: 引用 + 头像               │
├─────────────────────────────────────┤
│  项目图片: 2-4张                    │
├─────────────────────────────────────┤
│  CTA: 联系我们获取类似方案          │
├─────────────────────────────────────┤
│  相关案例: 3个卡片                  │
├─────────────────────────────────────┤
│  Footer                             │
└─────────────────────────────────────┘
```

### 模板文件

`templates/single-case-study.html`

### 新增 Patterns

| Pattern | Slug | 用途 |
|---------|------|------|
| Case Study Metrics | `cclee-theme/case-study-metrics` | 成果数据展示（4列数字） |
| Case Study Testimonial | `cclee-theme/case-study-testimonial` | 客户评价卡片 |

---

## 3. WooCommerce Cart/Checkout (P1)

### 模板文件

- `templates/cart.html`
- `templates/checkout.html`

### Cart 页面结构

```
┌─────────────────────────────────────┐
│  Header                             │
├─────────────────────────────────────┤
│  进度条: 购物车 → 结算 → 完成       │
├───────────────────┬─────────────────┤
│  商品列表         │  订单摘要       │
│  - 商品图/名/价   │  - 小计         │
│  - 数量调节       │  - 运费         │
│  - 删除           │  - 优惠券       │
│                   │  - 总计         │
│                   │  [去结算]       │
│                   │  信任徽章       │
├───────────────────┴─────────────────┤
│  Footer                             │
└─────────────────────────────────────┘
```

### Checkout 页面结构

```
┌─────────────────────────────────────┐
│  Header                             │
├─────────────────────────────────────┤
│  进度条: 购物车 → 结算 → 完成       │
├───────────────────┬─────────────────┤
│  表单区           │  订单确认       │
│  - 账单信息       │  - 商品列表     │
│  - 配送地址       │  - 总计         │
│  - 配送方式       │                 │
│  - 支付方式       │  [确认支付]     │
│                   │  安全支付标识   │
├───────────────────┴─────────────────┤
│  Footer (简化)                      │
└─────────────────────────────────────┘
```

### 新增 Patterns

| Pattern | Slug | 用途 |
|---------|------|------|
| Woo Progress Steps | `cclee-theme/woo-progress-steps` | 结算进度条 |
| Woo Trust Badges | `cclee-theme/woo-trust-badges` | 信任徽章 |

### 设计规范

- 进度条固定在 Header 下方
- 双栏布局（70/30）
- 移动端堆叠
- 表单字段圆角统一 8px
- CTA 按钮全宽（移动端）

---

## 4. Author/Date 归档 (P2)

### 实现方式

基于现有 `archive.html`，通过 PHP 动态检测归档类型输出不同头部。

### Author 归档头部

```
┌─────────────────────────────────────┐
│  ┌──────────┐                       │
│  │  头像    │  作者名称             │
│  │  80x80   │  职位                 │
│  └──────────┘  简介                 │
│                社交链接              │
└─────────────────────────────────────┘
```

### Date 归档头部

```
┌─────────────────────────────────────┐
│  2026年3月                          │
│  ─────────────                      │
│  12 篇文章                          │
└─────────────────────────────────────┘
```

### PHP 实现

在 `inc/setup.php` 添加归档头部钩子，检测 `is_author()` / `is_date()` 输出对应头部。

---

## 5. 归档布局变体 (P2)

### 新增 Patterns

| Pattern | Slug | 用途 |
|---------|------|------|
| Post List | `cclee-theme/post-list` | 列表布局（图文横排） |
| Post Magazine | `cclee-theme/post-magazine` | 杂志布局（1大+4小） |
| Post Masonry | `cclee-theme/post-masonry` | 瀑布流布局 |

### 列表布局

```
┌─────────────────────────────────────┐
│  ┌────┐  标题                        │
│  │ 图 │  摘要摘要摘要摘要...         │
│  │ 片 │  日期 · 分类                 │
│  └────┘                              │
├─────────────────────────────────────┤
│  ┌────┐  标题                        │
│  │ 图 │  摘要摘要摘要摘要...         │
│  └────┘  日期 · 分类                 │
└─────────────────────────────────────┘
```

### 杂志布局

```
┌───────────────────┬─────────────────┐
│                   │  ┌───┐ 标题     │
│   大图 + 标题     │  │图 │          │
│   + 摘要          │  └───┘          │
│                   ├─────────────────┤
│                   │  ┌───┐ 标题     │
│                   │  │图 │          │
│                   │  └───┘          │
└───────────────────┴─────────────────┘
```

---

## 实施阶段

| 阶段 | 内容 | 新增文件 | 工作量 |
|------|------|----------|--------|
| Phase 1 | Landing Page | 1 template + 5 patterns | 中 |
| Phase 2 | Case Study | 1 template + 2 patterns + CPT + ACF | 高 |
| Phase 3 | Cart/Checkout | 2 templates + 2 patterns | 中 |
| Phase 4 | Archive Enhancement | PHP hooks + 3 patterns | 低 |

---

## 文件清单

### Templates (4 新增)

- `templates/page-landing.html`
- `templates/single-case-study.html`
- `templates/cart.html`
- `templates/checkout.html`

### Patterns (12 新增)

- `patterns/landing-hero-form.php`
- `patterns/landing-video-hero.php`
- `patterns/landing-pricing-simple.php`
- `patterns/landing-trust-bar.php`
- `patterns/landing-countdown.php`
- `patterns/case-study-metrics.php`
- `patterns/case-study-testimonial.php`
- `patterns/woo-progress-steps.php`
- `patterns/woo-trust-badges.php`
- `patterns/post-list.php`
- `patterns/post-magazine.php`
- `patterns/post-masonry.php`

### PHP Modules (1 新增)

- `inc/case-study.php` — CPT + ACF 注册

### CSS Updates

- `assets/css/custom.css` — Landing/Cart/Checkout 样式
- `assets/css/woocommerce.css` — Cart/Checkout 增强
