# WooCommerce 模板设计

> 创建日期: 2026-03-24
> 状态: 已确认

## 概述

为 cclee-theme 主题补充 3 个 WooCommerce 模板页面，采用混合方案：核心模板增强，次要模板复用。

## 需求总结

| 模板 | 布局 | 新增 Pattern |
|------|------|-------------|
| my-account.html | 侧边栏导航 (25%+75%) | `woo-account-nav` |
| order-received.html | 双栏 (复用 checkout 风格) | 无 |
| product-search.html | 复用 archive-product | 无 |

## 1. my-account.html

### 布局

```
侧边栏(25%) | 内容区(75%)
```

### 新增 Pattern: `woo-account-nav`

带图标的侧边栏导航：

| 菜单项 | 图标 | 链接 |
|--------|------|------|
| Dashboard | home | /my-account/ |
| Orders | package | /my-account/orders/ |
| Downloads | download | /my-account/downloads/ |
| Addresses | map-pin | /my-account/edit-address/ |
| Account Details | user | /my-account/edit-account/ |
| Logout | log-out | 退出链接 |

**样式**:
- 容器：neutral-50 背景，lg 圆角，padding-40
- 选中态：accent 背景 + base 文字
- 未选中：neutral-600 文字，hover 变 primary

### 文件

- `templates/my-account.html`
- `patterns/woo-account-nav.php`

---

## 2. order-received.html

### 布局

```
进度条(第3步高亮)
├── 感谢标题区
└── 双栏布局
    ├── 左栏(60%): 商品明细
    └── 右栏(40%): 订单信息 + 物流 + 地址
└── 信任徽章
```

### 使用 WooCommerce Blocks

| 区块 | Block |
|------|-------|
| 商品明细 | `woocommerce/order-confirmation-cart-items` |
| 订单号 | `woocommerce/order-confirmation-order-number` |
| 日期 | `woocommerce/order-confirmation-order-date` |
| 状态 | `woocommerce/order-confirmation-order-status` |
| 支付方式 | `woocommerce/order-confirmation-payment-method` |
| 物流 | `woocommerce/order-confirmation-shipping` |
| 地址 | `woocommerce/order-confirmation-billing-address` |
| 信任徽章 | `cclee-theme/woo-trust-badges` |

### 样式

复用 cart/checkout 的双栏布局和卡片样式。

### 文件

- `templates/order-received.html`

---

## 3. product-search.html

### 布局

完全复用 `archive-product.html` 结构。

### 与 archive-product 的差异

| 元素 | 差异 |
|------|------|
| Hero 标题 | "Search Results for: {keyword}" |
| 无结果提示 | "No products found for your search" |

### 文件

- `templates/product-search.html` (复制 archive-product.html)

---

## 实施清单

### 新建文件

1. `templates/my-account.html`
2. `templates/order-received.html`
3. `templates/product-search.html`
4. `patterns/woo-account-nav.php`

### 修改文件

1. `theme.json` - 在 customTemplates 中注册新模板

---

## 设计规范

遵循现有主题风格：
- 颜色：primary(#0f172a), accent(#f59e0b), neutral 系列
- 圆角：sm(4px), md(8px), lg(12px)
- 间距：使用 spacing preset (10-100)
- 卡片：neutral-200 边框 + lg 圆角 + padding-40
