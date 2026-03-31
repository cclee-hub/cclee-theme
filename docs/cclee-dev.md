---
paths:
  - wp/wordpress/wp-content/themes/cclee/**
---

# CCLEE Theme 开发文档

WordPress 6.4+ / PHP 8.0+ | 版本 1.1.1

cclee 是面向 **B 端多行业**的通用 Block Theme（FSE），覆盖制造、SaaS、专业服务等B端场景，目标上架 WordPress.org + WooCommerce Marketplace，开箱即用。


---

## 模块加载顺序

```
functions.php
    ├─→ inc/setup.php           # 主题基础设置（最先）
    ├─→ inc/block-styles.php    # 块样式变体
    ├─→ inc/block-patterns.php  # Pattern 分类注册
    └─→ inc/woocommerce.php     # WooCommerce 兼容
```

---

## inc/ 模块职责

### setup.php

| 钩子 | 作用 |
|------|------|
| `after_setup_theme` | 注册 theme support、导航菜单、加载编辑器样式 |
| `wp_enqueue_scripts` | 加载 `custom.css` + `theme.js` |
| `wp_footer:99` | 触发 `cclee_float_widget` hook |
| `after_switch_theme` | 主题激活时创建默认导航菜单（Primary/Footer） |

**Theme Support：** `wp-block-styles`, `editor-styles`, `post-thumbnails`, `responsive-embeds`, `title-tag`, `custom-logo`

**菜单位置：** `primary`, `footer`

**自动创建导航：** 激活主题时检测是否存在 `wp_navigation` 帖子，不存在则自动创建 Primary Menu（Home/About/Products/Blog/Contact）和 Footer Menu（About/Contact/Blog）

---

### block-styles.php

| 块 | 样式名 | 用途 |
|----|--------|------|
| `core/button` | `outline` | 透明背景+边框按钮 |
| `core/group` | `card` | 卡片容器（边框+阴影） |
| `core/separator` | `thick` | 粗分隔线 |
| `core/quote` | `accent-border` | 左侧强调色边框引用 |
| `core/image` | `rounded` | 圆角图片 |
| `core/image` | `shadow` | 阴影图片 |
| `core/list` | `checkmark` | 勾选列表（功能特性） |

---

### block-patterns.php

注册 `cclee` pattern 分类

---

### woocommerce.php

| 钩子/过滤器 | 作用 |
|-------------|------|
| `after_setup_theme` | 声明 Woo 支持 |
| `wp_enqueue_scripts` | 条件加载 `assets/css/woocommerce.css` |
| `woocommerce_enqueue_styles` | 移除 Woo 默认样式（保留 general） |
| `woocommerce_before_main_content` | 替换包装器为主题布局 |
| `gettext` | B2B 文字替换（Shop → Products） |
| `woocommerce_page_title` | 修改归档页标题 |
| `woocommerce_helper_suppress_admin_notice` | 隐藏 WooCommerce.com 登录提示 |
| `woocommerce_get_page_permalink` | 强制 Shop 页面 URL 使用 `/products/` |

**设计原则：** 主题管样式，Woo 管功能；不重写 Woo 模板文件，仅通过 CSS 覆盖

---

## Design System (theme.json)

| Token | Slugs |
|-------|-------|
| Colors | `primary`, `secondary`, `accent`, `base`, `contrast`, `surface` |
| Neutral | `neutral-50` ~ `neutral-900`（10 级） |
| Gradients | `primary`, `accent`, `hero`, `subtle`, `glass`, `warm`, `cool` |
| Shadows | `sm`, `md`, `lg` |
| Font Families | `heading`(DM Serif Display), `body`(Inter), `system`, `mono` |
| Font Sizes | `small`, `medium`, `large`, `x-large`, `xx-large`, `h1`~`h6` |
| Spacing | `10`(0.25rem) ~ `100`(8rem) |
| Layout | `contentSize: 800px`, `wideSize: 1200px` |

**Custom Tokens（CSS 变量）：**

| Token | 值 |
|-------|-----|
| `--wp--custom--breakpoints--mobile` | 640px |
| `--wp--custom--breakpoints--tablet` | 768px |
| `--wp--custom--breakpoints--desktop` | 1024px |
| `--wp--custom--breakpoints--wide` | 1280px |
| `--wp--custom--border--radius--sm/md/lg/full` | 4px/8px/12px/9999px |
| `--wp--custom--transition--fast/normal/slow` | 150ms/250ms/400ms |
| `--wp--custom--easing--default/bounce` | cubic-bezier 曲线 |

**颜色语义：**

| Token | 用途 |
|-------|------|
| `primary` | 品牌主色（Logo、主按钮、强调文字） |
| `secondary` | 次要元素 |
| `accent` | 行动召唤（CTA 按钮、链接） |
| `base` | 页面主背景 |
| `contrast` | 与 base 形成对比的区块背景（浅色场景） |
| `surface` | 深色区块背景（Footer、暗色 CTA、暗色 Hero） |

---

## 文件结构

```
cclee/
├── style.css              # 主题声明（无业务样式）
├── theme.json             # 设计系统
├── functions.php          # 入口（仅 require）
├── index.php              # 兼容占位
│
├── templates/             # 20 个模板
│   ├── 404.html
│   ├── archive.html
│   ├── archive-product.html       # WooCommerce 产品归档
│   ├── author.html
│   ├── cart.html                  # WooCommerce 购物车
│   ├── checkout.html              # WooCommerce 结算
│   ├── coming-soon.html           # 即将上线页（无 header/footer）
│   ├── compare.html               # 产品对比页
│   ├── front-page.html
│   ├── home.html
│   ├── index.html
│   ├── maintenance.html           # 维护页（无 header/footer）
│   ├── my-account.html            # WooCommerce 账户中心
│   ├── order-received.html        # WooCommerce 订单确认
│   ├── page.html
│   ├── page-about-us.html
│   ├── page-contact.html
│   ├── page-landing.html          # Landing Page（无 header/footer）
│   ├── product-search.html        # WooCommerce 产品搜索
│   ├── search.html
│   ├── single.html
│   ├── single-product.html        # WooCommerce 单品页
│   ├── single-product-wide.html   # WooCommerce 全宽单品页
│   └── wishlist.html              # 收藏夹
│
├── parts/
│   ├── header.html              # 默认页头
│   ├── header-centered.html     # 居中导航页头
│   ├── footer.html              # 默认页脚
│   ├── footer-columns.html      # 多列页脚
│   ├── footer-newsletter.html   # 带订阅的页脚
│   ├── footer-simple.html       # 简化页脚
│   └── sidebar.html
│
├── patterns/              # 29 个预制区块
│   ├── breadcrumb.php             # 面包屑导航
│   ├── contact.php
│   ├── cta-banner.php
│   ├── faq.php
│   ├── features-grid.php
│   ├── footer-columns.php
│   ├── header-account.php         # 页头账户&购物车
│   ├── header-search.php          # 页头搜索
│   ├── header-social.php          # 页头社交链接
│   ├── hero-centered.php
│   ├── hero-simple.php
│   ├── landing-video-hero.php
│   ├── logo-cloud.php
│   ├── page-header.php            # 通用页面标题头
│   ├── portfolio.php
│   ├── post-list.php
│   ├── post-magazine.php
│   ├── pricing.php
│   ├── services.php
│   ├── stats.php
│   ├── team.php
│   ├── testimonial.php
│   ├── timeline.php
│   ├── view-toggle.php            # 网格/列表视图切换
│   ├── woo-account-nav.php
│   ├── woo-account-user-info.php  # 账户页用户信息
│   ├── woo-progress-steps.php
│   └── woo-trust-badges.php
│
├── styles/                # Style Variations
│   ├── commerce.json      # 商务蓝
│   ├── industrial.json    # 工业灰
│   ├── nature.json        # 自然绿
│   ├── professional.json  # 专业黑
│   └── tech.json          # 科技紫
│
├── assets/
│   ├── css/
│   │   ├── custom.css     # 补充样式
│   │   └── woocommerce.css
│   └── js/
│       └── theme.js       # 主题脚本
│
└── inc/
    ├── setup.php
    ├── block-styles.php
    ├── block-patterns.php
    └── woocommerce.php
```

---

## 文件职责边界

| 文件 | 职责 | 禁止 |
|------|------|------|
| `theme.json` | 设计 token | PHP、CSS |
| `style.css` | 主题声明头 | 业务样式 |
| `functions.php` | 仅 require | 功能代码 |
| `templates/*.html` | 页面结构 | PHP 逻辑 |
| `parts/*.html` | 模板片段 | 完整页面 |
| `patterns/*.php` | 预制区块 | 必须含注释头 |
| `assets/css/custom.css` | 补充样式 | 重复 theme.json |

---

## 命名规范

| 类型 | 前缀 | 示例 |
|------|------|------|
| Pattern slug | `cclee/` | `cclee/hero-simple` |
| Pattern 分类 | `cclee` | - |
| CSS handle | `cclee-` | `cclee-custom` |
| JS handle | `cclee-` | `cclee-js` |
| 选项名 | `cclee_` | `cclee_ai_api_key` |
| Text domain | `cclee` | - |

---

## 无障碍

- `parts/header.html` 包含 Skip to Content 链接
- 所有模板主内容区 `anchor:"main"`

---

## 开发命令

```bash
cd wp && docker-compose up -d
# 访问 http://localhost:8080

# WP-CLI
docker exec wp_cli wp [command] --allow-root

# 清除缓存
docker exec wp_cli wp cache flush --allow-root

# 激活主题
docker exec wp_cli wp theme activate cclee --allow-root
```

---

## Pattern 调试

### 块验证失败定位方法

当 Site Editor 报 "This block has encountered an error" 时：

**1. DevTools Console 定位（首选）**
- 打开浏览器 DevTools > Console
- 查找 `Block validation failed` 日志
- 对比 Expected / Actual 找到差异

**2. 最小内容法（二分法）**
```
1. 替换整个 pattern 为单段落 > 无报错 > 确认 pattern 有问题
2. 加外层 Group 块 > 报错 > 定位到外层
3. 逐步还原内容 > 报错 > 定位具体行
4. 定位后对比编辑器生成的正确代码
```

### 常见报错原因

| 现象 | 原因 | 解决 |
|------|------|------|
| gradient 背景失效 | 旧命名 `has-{slug}-gradient-background` | 用编辑器重新生成 |
| paragraph 块报错 | 内含 `<span>` 标签 | 拆分为多个块 |
| 属性不生效 | JSON 单引号/尾随逗号 | 修复 JSON 格式 |
| 块未闭合 | `<!-- wp:xxx -->` 缺少 `<!-- /wp:xxx -->` | 补全闭合标签 |

### 自动检查的局限性

- 只检查根标签属性
- 不检查块内子元素（如 `<p>` 里的 `<span>`）
- 最终以 DevTools Console 为准

---

## 子主题扩展

```css
/* style.css */
Theme Name: Your Child Theme
Template: cclee
```

```php
/* functions.php */
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('child-style', get_stylesheet_uri(), ['cclee-custom']);
});
```

---

## WooCommerce 测试数据

### 导入官方样本数据

```bash
# 安装导入器插件
docker exec wp_wordpress mkdir -p /var/www/html/wp-content/upgrade
docker exec -u root wp_wordpress chown -R www-data:www-data /var/www/html/wp-content/upgrade
docker exec wp_cli wp plugin install wordpress-importer --activate --allow-root

# 导入 WooCommerce 样本产品（约 18 个产品）
docker exec wp_cli wp import /var/www/html/wp-content/plugins/woocommerce/sample-data/sample_products.xml --authors=create --allow-root
```

### 样本数据包含

| 类型 | 数量 |
|------|------|
| 产品 | 18 个 |
| 分类 | 7 个（Clothing, Accessories, Decor, Music 等） |
| 属性 | 颜色、尺寸 |

样本数据不包含实际图片，需手动补充或使用占位图。

---

## 功能清单

### 模板能力矩阵

| 模板 | 用途 | Header | Footer | 布局 | 特性 |
|------|------|--------|--------|------|------|
| `front-page.html` | 静态首页 | Y | Y | Pattern 组装 | hero-centered + features-grid + cta-banner |
| `home.html` | 博客列表首页 | Y | Y | 3列网格 | hero-simple + post-grid + cta-banner + 分页 + 空状态 |
| `index.html` | 通用回退 | Y | Y | 3列网格 | post-grid + 分页 + 空状态 |
| `archive.html` | 归档页（分类/标签/日期） | Y | Y | 3列网格 | 标题 + post-grid + 分页 + 空状态 |
| `author.html` | 作者归档 | Y | Y | 单栏 | 作者头像/简介 + post-grid + 分页 + 空状态 |
| `search.html` | 搜索结果 | Y | Y | 3列网格 | 搜索标题 + post-grid + 空状态含二次搜索 |
| `single.html` | 单篇文章 | Y | Y | 70/30 两栏 | 标题 + 日期/分类 + 特色图 + 内容 + 上下篇导航 + 评论 + sidebar |
| `page.html` | 通用页面 | Y | Y | 单栏 | 标题 + 特色图 + 内容 |
| `page-about-us.html` | 关于我们 | Y | Y | Pattern 组装 | hero-simple + content + features-grid + cta-banner |
| `page-contact.html` | 联系我们 | Y | Y | Pattern 组装 | hero-simple + contact form + cta-banner |
| `page-landing.html` | Landing Page | N | N | Pattern 组装 | 无 header/footer，最小导航 + 微型页脚 |
| `404.html` | 404 页面 | Y | Y | 单栏 | 标题 + 描述 + 搜索框 |
| `coming-soon.html` | 即将上线 | N | N | 全屏居中 | 无 header/footer，倒计时 + 订阅按钮 |
| `maintenance.html` | 维护页 | N | N | 全屏居中 | 无 header/footer，维护提示 + 预计时间 |
| `compare.html` | 产品对比 | Y | Y | 单栏 | page-header + 对比表格 + cta-banner |
| `wishlist.html` | 收藏夹 | Y | Y | 单栏 | page-header + 收藏列表 + 空状态 + cta-banner |
| `archive-product.html` | WooCommerce 产品归档 | Y | Y | 70/30 两栏 | hero-simple + 3列产品网格 + sidebar（分类/价格过滤）+ cta-banner |
| `single-product.html` | WooCommerce 单品页 | Y | Y | 单栏 | legacy-template + 相关产品 + cta-banner |
| `single-product-wide.html` | WooCommerce 全宽单品页 | Y | Y | 单栏 | product-hero + legacy-template + 相关产品 + cta-banner |
| `cart.html` | WooCommerce 购物车 | Y | Y | 65/35 两栏 | progress-steps + cart + order-summary + trust-badges |
| `checkout.html` | WooCommerce 结算 | Y | Y | 60/40 两栏 | progress-steps + checkout + order-summary + trust-badges |
| `my-account.html` | WooCommerce 账户中心 | Y | Y | 25/75 两栏 | woo-account-nav + my-account block |
| `order-received.html` | WooCommerce 订单确认 | Y | Y | 60/40 两栏 | progress-steps(第3步高亮) + thank-you + order-details + order-info + trust-badges |
| `product-search.html` | WooCommerce 产品搜索 | Y | Y | 70/30 两栏 | search-results 标题 + 产品网格 + sidebar（分类/价格过滤）+ cta-banner |

### Patterns 清单

| Pattern | Slug | 分类 | 用途 |
|---------|------|------|------|
| Hero Centered | `cclee/hero-centered` | cclee, featured | 居中大标题，渐变背景，装饰元素 |
| Hero Simple | `cclee/hero-simple` | cclee, featured | 左对齐简单 Hero，浅色背景 |
| Features Grid | `cclee/features-grid` | cclee, featured | 三列特性卡片网格 |
| Services | `cclee/services` | cclee | 垂直服务列表，图标+描述 |
| Stats Section | `cclee/stats` | cclee, featured | 关键数据展示，渐变背景 |
| Portfolio | `cclee/portfolio` | cclee | 项目展示网格，卡片+标签 |
| Logo Cloud | `cclee/logo-cloud` | cclee, featured | 合作伙伴 Logo 静态展示，hover 缩放效果 |
| Team Members | `cclee/team` | cclee, featured | 四列团队成员卡片 |
| Testimonials | `cclee/testimonial` | cclee, featured | 三列客户评价卡片 |
| Pricing Table | `cclee/pricing` | cclee, featured | 三列价格表 |
| Timeline Section | `cclee/timeline` | cclee, featured | 公司历程/里程碑时间线 |
| FAQ Section | `cclee/faq` | cclee, featured | 手风琴式常见问题，原生 details 元素 |
| Contact Section | `cclee/contact` | cclee, featured | 联系表单 + 信息区块 |
| CTA Banner | `cclee/cta-banner` | cclee, featured | 全宽行动召唤横幅 |
| Footer Columns | `cclee/footer-columns` | cclee, footer | 四列页脚区块（可独立使用） |
| Landing Video Hero | `cclee/landing-video-hero` | cclee, featured | 全屏视频背景 Hero |
| Header Account & Cart | `cclee/header-account-cart` | cclee, header | 页头账户图标 + 购物车图标 |
| Header Search | `cclee/header-search` | cclee, header | 页头搜索按钮/表单 |
| Header Social Links | `cclee/header-social` | cclee, header | 页头社交链接图标 |
| Breadcrumb | `cclee/breadcrumb` | cclee, navigation | 面包屑导航 + 结果计数 |
| Page Header | `cclee/page-header` | cclee, featured | 通用页面标题头（标题 + 更新日期） |
| View Toggle | `cclee/view-toggle` | cclee, woocommerce | 网格/列表视图切换按钮 |
| WooCommerce Progress Steps | `cclee/woo-progress-steps` | cclee, woocommerce | 结算进度条（购物车 > 结算 > 完成） |
| WooCommerce Trust Badges | `cclee/woo-trust-badges` | cclee, woocommerce | 信任徽章（安全支付/退换货/快速配送） |
| WooCommerce Account Navigation | `cclee/woo-account-nav` | cclee, woocommerce | 账户中心侧边栏导航（Dashboard/Orders/Downloads/Addresses/Account/Logout） |
| WooCommerce Account User Info | `cclee/woo-account-user-info` | cclee, woocommerce | 账户页用户信息卡片（头像 + 欢迎语 + 角色） |
| Post List Layout | `cclee/post-list` | cclee | 列表式文章归档（左图右文） |
| Post Magazine Layout | `cclee/post-magazine` | cclee | 杂志式文章归档（特色文章+网格） |

### Parts 清单

| Part | 用途 | 特性 |
|------|------|------|
| `header.html` | 站点头部（默认） | skip-link + sticky + site-title + navigation + mini-cart |
| `header-centered.html` | 居中导航页头 | Logo 居中 + 导航两侧分布 |
| `footer.html` | 站点底部（默认） | site-title + tagline + navigation + 版权 |
| `footer-columns.html` | 多列页脚 | 四列布局（导航/链接/联系方式/社交） |
| `footer-newsletter.html` | 订阅页脚 | 邮箱订阅表单 + 社交链接 |
| `footer-simple.html` | 简化页脚 | 仅版权 + 隐私/条款链接 |
| `sidebar.html` | 侧边栏 | 搜索框 + 分类列表 + 最新文章 + 归档 |

### 已实现功能特性

| 特性 | 状态 | 说明 |
|------|------|------|
| 空状态设计 | Y | search.html 含二次搜索框，其他模板含提示文字 |
| 分页 | Y | query-pagination 块 |
| 文章导航 | Y | single.html 上下篇导航 |
| 评论区 | Y | single.html comments 块 |
| WooCommerce 兼容 | Y | 产品归档/单品页 + mini-cart |
| 无障碍 | Y | skip-link + anchor:main |

---

## Links

- [GitHub](https://github.com/cclee-hub/cclee)
