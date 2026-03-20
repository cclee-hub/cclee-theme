# WordPress 焊接工具网站实施计划

> **For Claude:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task.

**Goal:** 基于设计方案搭建外贸焊接工具企业官网 + WooCommerce 商城

**Architecture:** Astra Child 主题 + Starter Templates 模板导入 + Gutenberg 页面构建 + 自定义 CSS 精修

**Tech Stack:** WordPress, WooCommerce, Astra Theme, Contact Form 7, Gutenberg

**设计文档:** `docs/plans/2026-03-20-wp-soldering-site-design.md`

---

## Task 1: 配置 Astra 主题基础设置

**操作位置:** WordPress 后台 → Appearance → Customize

**Step 1: 设置配色方案**

路径: Appearance → Customize → Global → Colors

```
Primary Color: #1a365d (深蓝)
Secondary Color: #ed8936 (橙色)
Text Color: #2d3748 (深灰)
Background Color: #f7fafc (浅灰)
```

**Step 2: 设置字体**

路径: Appearance → Customize → Global → Typography

```
Font Family: Inter (或保持默认 System Font)
Body Font Size: 16px
Heading Font Weight: 600
```

**Step 3: 设置按钮样式**

路径: Appearance → Customize → Global → Buttons

```
Button Radius: 4px
Button Color: #ed8936
Button Text Color: #ffffff
Button Hover Color: #dd6b20
```

**Step 4: 发布并验证**

- 点击 Publish
- 刷新前端页面验证配色生效

**Step 5: Git 提交**

```bash
git add wp/wordpress/wp-content/themes/astra-child/
git commit -m "config: set Astra theme colors and typography"
```

---

## Task 2: 导入 Starter Template 模板

**操作位置:** WordPress 后台

**Step 1: 打开 Starter Templates**

路径: Appearance → Starter Templates

**Step 2: 选择合适模板**

筛选条件:
- Category: E-Commerce / Business
- Page Builder: Gutenberg
- 免费模板

推荐模板:
- "Online Fashion Store" 或
- "Electronic Store" 或
- "Industrial" (如有)

**Step 3: 导入模板**

- 点击选中的模板
- 选择 "Import Complete Site"
- 等待导入完成

**Step 4: 验证导入结果**

- 访问 http://localhost:8080
- 确认首页、产品页布局正常

---

## Task 3: 创建页面结构

**操作位置:** WordPress 后台 → Pages

**Step 1: 删除不需要的页面**

删除模板导入的冗余页面（如 Blog、Portfolio 等），保留：
- Home
- About Us
- Products (WooCommerce 自动创建)
- Contact

**Step 2: 设置首页**

路径: Settings → Reading

```
Your homepage displays: A static page
Homepage: Home
```

**Step 3: 设置菜单**

路径: Appearance → Menus

创建菜单 "Main Menu"，添加：
- Home
- About Us
- Products (链接到 /shop/)
- Contact

勾选 "Primary Menu" 位置

**Step 4: 验证导航**

- 刷新首页
- 确认导航栏显示正确

---

## Task 4: 创建 Contact Form 7 询盘表单

**操作位置:** WordPress 后台 → Contact → Add New

**Step 1: 创建询盘表单**

Form 标签内容:

```html
<label> Your Name (required)
    [text* your-name] </label>

<label> Your Email (required)
    [email* your-email] </label>

<label> Company
    [text company] </label>

<label> Country (required)
    [select* country "United States" "United Kingdom" "Germany" "France" "Canada" "Australia" "Japan" "South Korea" "India" "Brazil" "Mexico" "Spain" "Italy" "Netherlands" "Other"] </label>

<label> Your Message (required)
    [textarea* your-message] </label>

[submit "Send Inquiry"]
```

**Step 2: 配置 Mail 设置**

Mail 标签:

```
To: [your-email destination@example.com]
From: [your-name] <noreply@yoursite.com>
Subject: New Inquiry from [your-name]
Additional Headers: Reply-To: [your-email]

Message Body:
Name: [your-name]
Email: [your-email]
Company: [company]
Country: [country]
Message:
[your-message]
```

**Step 3: 保存并获取短代码**

保存后复制短代码，如：`[contact-form-7 id="123" title="Inquiry Form"]`

---

## Task 5: 构建 Contact 页面

**操作位置:** WordPress 后台 → Pages → Contact → Edit

**Step 1: 设置页面布局**

使用 Gutenberg 编辑器，选择 Full Width 布局

**Step 2: 添加联系信息区块**

添加 Columns 块（2列）：

左列 - 联系信息:
```html
<h2>Get in Touch</h2>

<p>📧 Email: <a href="mailto:info@example.com">info@example.com</a></p>
<p>📱 WhatsApp: <a href="https://wa.me/1234567890">+1 234 567 890</a></p>
<p>📞 Phone: +1 234 567 890</p>
<p>📍 Address: Your Company Address, City, Country</p>
```

右列 - 表单:
```
粘贴 Contact Form 7 短代码
```

**Step 3: 发布页面**

点击 Update / Publish

**Step 4: 验证**

访问 /contact/ 确认：
- 联系信息显示正确
- 表单正常显示
- 国家下拉选项正确

---

## Task 6: 构建 About Us 页面

**操作位置:** WordPress 后台 → Pages → About Us → Edit

**Step 1: 添加公司标题和主图**

- 添加 Heading 块: "About [Company Name]"
- 添加 Image 块: 公司主图

**Step 2: 添加公司简介**

添加 Paragraph 块，1-2 段公司介绍文字

**Step 3: 添加数字亮点**

添加 Columns 块（4列）：

```
| 10+ Years    | 500+ Clients  | 50+ Countries | 1000+ Products |
| Experience   | Worldwide     | Shipped To    | In Catalog     |
```

**Step 4: 添加工厂/团队图片（可选）**

- 添加 Gallery 或 Image 块

**Step 5: 添加 CTA 区块**

```html
<h3>Ready to Work with Us?</h3>
<a href="/contact/" class="button">Contact Us</a>
```

**Step 6: 发布并验证**

---

## Task 7: 构建首页

**操作位置:** WordPress 后台 → Pages → Home → Edit

**Step 1: 添加 Hero Banner**

- 添加 Cover 块
- 背景图: 选择产品/工厂图片
- 叠加文字: 公司名称 + 标语
- 按钮: "Shop Now" 链接到 /shop/，"Contact Us" 链接到 /contact/

**Step 2: 添加产品分类区块**

使用 Columns 块（3列）：

```
| Soldering Irons | Soldering Stations | Soldering Tips |
| [产品图片]       | [产品图片]          | [产品图片]       |
| [Shop Now]      | [Shop Now]         | [Shop Now]      |
```

每个 "Shop Now" 链接到对应产品分类

**Step 3: 添加热销产品区块**

- 添加 Heading: "Best Sellers"
- 添加 WooCommerce 块: "On Sale Products" 或 "Top Rated Products"
- 设置显示 4-6 个产品

**Step 4: 添加公司简介区块**

- 添加 Media & Text 块
- 左侧: 工厂/团队图片
- 右侧: 公司简介文字 + "Learn More" 按钮链接到 /about-us/

**Step 5: 添加客户评价区块**

- 添加 Heading: "What Our Customers Say"
- 添加 Columns 块（2-3列）
- 每列添加 Quote 块 + 评价内容 + 客户名称/公司

**Step 6: 添加品牌 Logo 区块（预留）**

- 添加 Heading: "Trusted By"
- 添加 Gallery 或 Logo 展示区块（后期填充）

**Step 7: 添加 CTA 条**

- 添加 Cover 块（橙色背景）
- 文字: "Get a Quote Today"
- 按钮: "Contact Us" 链接到 /contact/

**Step 8: 发布并验证**

访问首页确认所有模块显示正常

---

## Task 8: 添加询盘弹窗功能

**文件:**
- Create: `wp/wordpress/wp-content/themes/astra-child/inquiry-popup.php`
- Modify: `wp/wordpress/wp-content/themes/astra-child/functions.php`

**Step 1: 创建弹窗 HTML/CSS/JS**

在 `functions.php` 末尾添加:

```php
// 添加询盘弹窗
add_action('wp_footer', 'astra_child_inquiry_popup');

function astra_child_inquiry_popup() {
    if (is_product()) {
        ?>
        <div id="inquiry-modal" class="inquiry-modal" style="display:none;">
            <div class="inquiry-modal-content">
                <span class="inquiry-close">&times;</span>
                <h3>Request a Quote</h3>
                <p id="inquiry-product-name"></p>
                <?php echo do_shortcode('[contact-form-7 id="123" title="Inquiry Form"]'); ?>
            </div>
        </div>
        <?php
    }
}

// 添加弹窗样式和脚本
add_action('wp_head', 'astra_child_inquiry_popup_assets');

function astra_child_inquiry_popup_assets() {
    if (is_product()) {
        ?>
        <style>
        .inquiry-modal {
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .inquiry-modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 30px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            position: relative;
        }
        .inquiry-close {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            color: #666;
        }
        .inquiry-close:hover {
            color: #000;
        }
        </style>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('inquiry-modal');
            var closeBtn = document.querySelector('.inquiry-close');

            // 打开弹窗
            document.querySelectorAll('.inquiry-btn').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var productName = this.dataset.productName;
                    document.getElementById('inquiry-product-name').textContent = 'Product: ' + productName;
                    modal.style.display = 'block';
                });
            });

            // 关闭弹窗
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(e) {
                if (e.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
        </script>
        <?php
    }
}
```

**Step 2: 在产品页添加 Inquiry 按钮**

在 `functions.php` 添加:

```php
// 在 Add to Cart 按钮后添加 Inquiry 按钮
add_action('woocommerce_after_add_to_cart_button', 'astra_child_inquiry_button');

function astra_child_inquiry_button() {
    global $product;
    $product_name = $product->get_name();
    echo '<button type="button" class="inquiry-btn button alt" style="margin-left:10px;" data-product-name="' . esc_attr($product_name) . '">Inquiry</button>';
}
```

**Step 3: 验证弹窗功能**

- 访问任意产品详情页
- 点击 Inquiry 按钮
- 确认弹窗显示，产品名称正确
- 确认表单可提交

**Step 4: Git 提交**

```bash
sudo chown -R $USER:$USER wp/wordpress/wp-content/themes/astra-child/
git add wp/wordpress/wp-content/themes/astra-child/
git commit -m "feat: add inquiry popup to product pages"
```

---

## Task 9: 添加自定义 CSS 样式精修

**文件:**
- Modify: `wp/wordpress/wp-content/themes/astra-child/style.css`

**Step 1: 添加全局样式**

在 `style.css` 添加:

```css
/* 主题色变量 */
:root {
    --primary: #1a365d;
    --accent: #ed8936;
    --accent-hover: #dd6b20;
    --text: #2d3748;
    --bg-light: #f7fafc;
    --border: #e2e8f0;
}

/* 主按钮样式 */
.button,
.button.alt,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt {
    background-color: var(--accent) !important;
    color: #fff !important;
    border-radius: 4px !important;
    border: none !important;
    padding: 12px 24px !important;
    font-weight: 600 !important;
}

.button:hover,
.button.alt:hover {
    background-color: var(--accent-hover) !important;
}

/* 次按钮样式 */
.button.outline {
    background: transparent !important;
    border: 2px solid var(--accent) !important;
    color: var(--accent) !important;
}

.button.outline:hover {
    background: var(--accent) !important;
    color: #fff !important;
}

/* 产品卡片悬停效果 */
.woocommerce ul.products li.product {
    transition: transform 0.2s, box-shadow 0.2s;
}

.woocommerce ul.products li.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

/* 首页 Hero 区域 */
.wp-block-cover {
    min-height: 500px;
}

/* 数字亮点区块 */
.highlights-section {
    background-color: var(--bg-light);
    padding: 60px 0;
}

/* 客户评价 */
.testimonial-card {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

/* CTA 条 */
.cta-banner {
    background-color: var(--accent);
    color: #fff;
    padding: 60px 0;
}

.cta-banner h2,
.cta-banner p {
    color: #fff;
}

.cta-banner .button {
    background: #fff !important;
    color: var(--accent) !important;
}

/* 响应式调整 */
@media (max-width: 768px) {
    .wp-block-cover {
        min-height: 300px;
    }

    .woocommerce ul.products.columns-3 li.product {
        width: 100%;
    }
}
```

**Step 2: 验证样式**

- 刷新前端页面
- 检查按钮颜色、产品卡片悬停效果
- 检查移动端响应式布局

**Step 3: Git 提交**

```bash
git add wp/wordpress/wp-content/themes/astra-child/style.css
git commit -m "style: add custom CSS for theme styling"
```

---

## Task 10: WooCommerce 基础配置

**操作位置:** WordPress 后台 → WooCommerce → Settings

**Step 1: 配置商店地址**

WooCommerce → Settings → General

```
Store Address: [公司地址]
City: [城市]
Postcode/ZIP: [邮编]
Country/State: [国家/省份]
```

**Step 2: 配置货币**

WooCommerce → Settings → General

```
Currency: United States (US) dollar ($)
Currency position: Left
Thousand separator: ,
Decimal separator: .
Number of decimals: 2
```

**Step 3: 配置运费**

WooCommerce → Settings → Shipping → Shipping zones

创建 "Rest of the World" 区域:
- 添加 "Flat Rate" 方法
- 设置为 "Contact for Shipping Quote"
- 或暂时禁用，在产品页显示询盘提示

**Step 4: 配置支付**

WooCommerce → Settings → Payments

- 启用 PayPal
- 后期启用 Stripe 等

**Step 5: 配置邮件**

WooCommerce → Settings → Emails

- 设置发件人名称和邮箱
- 自定义邮件模板颜色

---

## Task 11: 最终验证与清理

**Step 1: 检查所有页面**

- [ ] 首页所有模块正常显示
- [ ] About Us 页面布局正确
- [ ] Products 商店页可浏览
- [ ] 产品详情页：购买按钮 + 询盘弹窗
- [ ] Contact 页：联系信息 + 表单提交

**Step 2: 测试核心流程**

- [ ] 添加产品到购物车
- [ ] 结账流程（PayPal）
- [ ] 询盘表单提交
- [ ] 移动端响应式

**Step 3: 性能优化**

- 安装 WP Super Cache 或类似缓存插件（可选）
- 压缩图片

**Step 4: Git 最终提交**

```bash
git add -A
git commit -m "feat: complete WordPress soldering site setup"
git push
```

---

## 后期扩展任务（暂不实施）

- [ ] 添加 Stripe 支付
- [ ] 配置运费计算
- [ ] 添加 Blog 页面
- [ ] 添加证书展示
- [ ] 多语言支持（WPML）
- [ ] 多货币支持
