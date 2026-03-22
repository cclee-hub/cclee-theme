# CCLEE Theme 补全设计文档

> 创建日期：2026-03-22
> 状态：待实施
> 优先级：高

## 概述

基于主题评审结果，补全以下高优先级缺失项：
1. Services Pattern - B2B 服务展示
2. Portfolio Pattern - 案例/作品展示
3. WooCommerce 模板 - 产品列表页和单品页

---

## 一、Services Pattern

### 文件
`patterns/services.php`

### 布局结构
```
+------------------------------------------+
|              Our Services (h2)            |
|              简短描述段落                  |
+------------------------------------------+
| [图标64x64]  服务标题 1 (h3)              |
|              服务描述段落                  |
+------------------------------------------+
| [图标64x64]  服务标题 2 (h3)              |
|              服务描述段落                  |
+------------------------------------------+
| [图标64x64]  服务标题 3 (h3)              |
|              服务描述段落                  |
+------------------------------------------+
|              [View All Services] CTA      |
+------------------------------------------+
```

### 设计规格
| 属性 | 值 |
|------|-----|
| 背景色 | contrast (#f8fafc) |
| 图标容器 | 64x64px, neutral-100 背景, border-radius: 12px |
| 图标颜色 | primary (#0f172a) |
| 标题 | h3, primary 色 |
| 描述 | body 字体, neutral-600 色 |
| 分隔线 | 1px solid neutral-200 |
| 底部间距 | spacing-80 (4rem) |

### 块结构
```html
<!-- wp:group {"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
  <!-- wp:heading {"textAlign":"center"} -->Our Services<!-- /wp:heading -->
  <!-- wp:paragraph {"align":"center"} -->描述文字<!-- /wp:paragraph -->

  <!-- wp:group {"style":{"border":{"top":{"width":"1px","color":"neutral-200"}}}} -->
    <!-- wp:columns {"isStackedOnMobile":false} -->
      <!-- wp:column {"width":"80px"} -->
        <!-- wp:group {"style":{"border":{"radius":"12px"}},"backgroundColor":"neutral-100"} -->
          图标 SVG
        <!-- /wp:group -->
      <!-- /wp:column -->
      <!-- wp:column -->
        <!-- wp:heading {"level":3} -->服务标题<!-- /wp:heading -->
        <!-- wp:paragraph {"textColor":"neutral-600"} -->描述<!-- /wp:paragraph -->
      <!-- /wp:column -->
    <!-- /wp:columns -->
  <!-- /wp:group -->

  <!-- x2 more service items -->

  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    CTA 按钮
  <!-- /wp:buttons -->
<!-- /wp:group -->
```

---

## 二、Portfolio Pattern

### 文件
`patterns/portfolio.php`

### 布局结构
```
+------------------------------------------+
|              Our Work (h2)                |
|              简短描述段落                  |
+------------------------------------------+
| [图片]          | [图片]                  |
| 项目标题 1      | 项目标题 2              |
| 项目简介        | 项目简介                |
| [标签] [标签]   | [标签] [标签]           |
+------------------------------------------+
| [图片]          | [图片]                  |
| 项目标题 3      | 项目标题 4              |
| ...            | ...                    |
+------------------------------------------+
|              [View All Projects] CTA      |
+------------------------------------------+
```

### 设计规格
| 属性 | 值 |
|------|-----|
| 背景色 | base (#ffffff) |
| 卡片布局 | 2 列网格 |
| 图片比例 | 16:9, border-radius: 8px |
| 图片悬浮 | scale(1.02), 过渡 250ms |
| 标题 | h3, primary 色 |
| 简介 | small 字体, neutral-500 色 |
| 标签 | neutral-200 背景, small 字体 |
| 卡片间距 | spacing-50 (1.5rem) |

### 块结构
```html
<!-- wp:group {"layout":{"type":"constrained"}} -->
  <!-- wp:heading {"textAlign":"center"} -->Our Work<!-- /wp:heading -->
  <!-- wp:paragraph {"align":"center"} -->描述<!-- /wp:paragraph -->

  <!-- wp:columns {"columns":2} -->
    <!-- wp:column -->
      <!-- wp:group {"style":{"border":{"radius":"8px"}},"className":"cclee-portfolio-card"} -->
        <!-- wp:image {"aspectRatio":"16/9"} -->
        <!-- /wp:image -->
        <!-- wp:heading {"level":3} -->项目标题<!-- /wp:heading -->
        <!-- wp:paragraph {"fontSize":"small","textColor":"neutral-500"} -->简介<!-- /wp:paragraph -->
        <!-- wp:group -->
          <!-- wp:term /--> 标签
        <!-- /wp:group -->
      <!-- /wp:group -->
    <!-- /wp:column -->
    <!-- 重复 4 个项目 -->
  <!-- /wp:columns -->

  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    CTA
  <!-- /wp:buttons -->
<!-- /wp:group -->
```

---

## 三、WooCommerce 模板

### 3.1 archive-product.html

### 布局结构
```
+------------------+-------------------+
|                  |                   |
|   产品网格 (70%)  |  侧边栏 (30%)     |
|   [产品] [产品]   |  - 产品分类       |
|   [产品] [产品]   |  - 价格筛选       |
|   [产品] [产品]   |  - 品牌筛选       |
|                  |                   |
+------------------+-------------------+
```

### 设计规格
| 属性 | 值 |
|------|-----|
| 主内容宽度 | 70% |
| 侧边栏宽度 | 30% |
| 产品网格 | 2-3 列，响应式 |
| WooCommerce 条件 | `is_woocommerce()` |

### 块结构
```html
<!-- wp:template {"slug":"archive-product"} -->
<!-- wp:pattern {"slug":"cclee-theme/hero-simple"} /-->

<!-- wp:columns -->
  <!-- wp:column {"width":"70%"} -->
    <!-- wp:woocommerce/product-query -->
      <!-- wp:post-template -->
        <!-- wp:woocommerce/product-image /-->
        <!-- wp:post-title /-->
        <!-- wp:woocommerce/product-price /-->
        <!-- wp:woocommerce/product-button /-->
      <!-- /wp:post-template -->
    <!-- /wp:woocommerce/product-query -->
  <!-- /wp:column -->

  <!-- wp:column {"width":"30%"} -->
    <!-- wp:pattern {"slug":"cclee-theme/sidebar"} /-->
  <!-- /wp:column -->
<!-- /wp:columns -->

<!-- wp:pattern {"slug":"cclee-theme/cta-banner"} /-->
<!-- /wp:template -->
```

### 3.2 single-product.html

### 布局结构
```
+------------------------------------------+
|              面包屑导航                    |
+------------------------------------------+
| [产品图片]     |   产品信息               |
| [缩略图列表]   |   - 标题                 |
|               |   - 价格                 |
|               |   - 简短描述             |
|               |   - 加入购物车           |
|               |   - 产品分类             |
+------------------------------------------+
|              产品详情 Tabs                |
| 描述 | 附加信息 | 评价                    |
+------------------------------------------+
|              相关产品                     |
+------------------------------------------+
```

### 设计规格
| 属性 | 值 |
|------|-----|
| 布局 | 全宽，无侧边栏 |
| 图片列 | 50% |
| 信息列 | 50% |
| 图片展示 | WooCommerce Gallery |

### 块结构
```html
<!-- wp:template {"slug":"single-product"} -->
<!-- wp:woocommerce/legacy-template {"template":"single-product"} /-->
<!-- wp:woocommerce/related-products /-->
<!-- /wp:template -->
```

**注**：单品页使用 WooCommerce  Legacy Template 块，由 Woo 插件处理渲染逻辑。

---

## 四、补充 CSS 样式

### custom.css 新增
```css
/* Portfolio Card Hover */
.cclee-portfolio-card img {
  transition: transform var(--wp--custom--transition--normal);
}
.cclee-portfolio-card:hover img {
  transform: scale(1.02);
}

/* Services Icon Container */
.cclee-service-icon {
  width: 64px;
  height: 64px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: var(--wp--preset--color--neutral-100);
  border-radius: 12px;
}
```

---

## 五、实施顺序

1. Services Pattern
2. Portfolio Pattern
3. archive-product.html
4. single-product.html
5. 更新 custom.css
6. 测试验证

---

## 六、验收标准

- [ ] Services Pattern 在编辑器可选中，前端显示正确
- [ ] Portfolio Pattern 在编辑器可选中，悬浮动效正常
- [ ] archive-product.html 产品列表页显示侧边栏
- [ ] single-product.html 单品页全宽显示
- [ ] 所有块验证无错误
