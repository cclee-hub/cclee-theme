# Landing Page 模块设计

> **日期：** 2026-03-22
> **优先级：** P0
> **状态：** 设计完成，待实施

---

## 概述

为 cclee-theme 添加 Landing Page 模板和配套 Patterns，支持高转化率投放页/活动页场景。

## 设计目标

- 无 header/footer 干扰的纯净转化页
- 单一焦点，高对比度 CTA
- 移动端优先
- 与现有 design system 风格一致

---

## 交付物清单

| 文件 | 类型 | 说明 |
|------|------|------|
| `templates/page-landing.html` | 模板 | 无 header/footer 的纯净模板 |
| `patterns/landing-hero-form.php` | Pattern | Hero + 侧边表单（线索收集） |
| `patterns/landing-video-hero.php` | Pattern | 视频背景 Hero |
| `patterns/landing-trust-bar.php` | Pattern | 信任徽章横条 |
| `patterns/landing-countdown.php` | Pattern | 倒计时组件 |

---

## 模板设计：`page-landing.html`

### 结构

```
┌─────────────────────────────────────┐
│  Logo (左)          [返回主站] (右)  │  ← 最小导航
├─────────────────────────────────────┤
│                                     │
│           主内容区                   │  ← Patterns 组装
│                                     │
├─────────────────────────────────────┤
│  © 2024 Company  Privacy | Terms   │  ← 微型页脚
└─────────────────────────────────────┘
```

### 特性

- **无 template-part 引用** — 不加载 header.html / footer.html
- **最小导航** — 仅 Logo + 退出链接
- **微型页脚** — 版权 + 法律链接
- **Pattern 组装** — 主内容区由编辑器自由组合 Patterns

---

## Pattern 设计

### 1. `landing-hero-form` — Hero + 侧边表单

**布局：** 桌面端 60/40 两栏，移动端堆叠

```
┌──────────────────────┬──────────────┐
│                      │   ┌────────┐ │
│   大标题             │   │ 表单   │ │
│   副标题             │   │ 姓名   │ │
│   特性列表           │   │ 邮箱   │ │
│   [CTA 按钮]         │   │ 电话   │ │
│                      │   │[提交]  │ │
│                      │   └────────┘ │
└──────────────────────┴──────────────┘
```

**设计规范：**
- 左侧：H1 标题 + 副标题 + 3-4 个特性项 + CTA
- 右侧：白色卡片表单，阴影效果
- 背景：渐变或纯色（可选）
- 表单字段：姓名、邮箱、电话（可扩展）

### 2. `landing-video-hero` — 视频背景 Hero

**布局：** 全屏居中

```
┌─────────────────────────────────────┐
│          [视频背景循环播放]          │
│                                     │
│           大标题                     │
│           副标题                     │
│        [CTA]  [CTA]                 │
│                                     │
└─────────────────────────────────────┘
```

**设计规范：**
- 视频覆盖层：半透明深色遮罩（确保文字可读）
- 视频属性：autoplay, muted, loop, playsinline
- 内容居中，白色文字
- 备用：视频加载失败时显示背景图

### 3. `landing-trust-bar` — 信任徽章横条

**布局：** 单行 Logo 网格

```
┌─────────────────────────────────────┐
│  Trusted by leading companies       │
│  ┌────┐ ┌────┐ ┌────┐ ┌────┐ ┌────┐│
│  │L1 │ │L2 │ │L3 │ │L4 │ │L5 │ │
│  └────┘ └────┘ └────┘ └────┘ └────┘│
└─────────────────────────────────────┘
```

**设计规范：**
- 灰度 Logo（统一视觉）
- hover 时恢复彩色
- 5-6 个 Logo 为佳
- 响应式：移动端滚动或折行

### 4. `landing-countdown` — 倒计时组件

**布局：** 4 列数字块

```
┌─────────────────────────────────────┐
│        Limited Time Offer           │
│  ┌────┐  ┌────┐  ┌────┐  ┌────┐   │
│  │ 02 │  │ 14 │  │ 36 │  │ 52 │   │
│  │Days│  │Hrs │  │Min │  │Sec │   │
│  └────┘  └────┘  └────┘  └────┘   │
│        [Get It Now]                 │
└─────────────────────────────────────┘
```

**设计规范：**
- CSS 变量驱动目标时间
- 客户端 JS 实现倒计时逻辑
- 数字大号（48-72px），标签小号
- 紧迫感配色（accent 或红色）

---

## 样式扩展

### `assets/css/custom.css` 新增

```css
/* Landing Page: 最小导航 */
.landing-nav {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(8px);
}

/* Landing Page: 微型页脚 */
.landing-footer a {
  color: var(--wp--preset--color--neutral-400);
  text-decoration: none;
}
.landing-footer a:hover {
  color: var(--wp--preset--color--primary);
}

/* Landing Page: 视频背景 */
.landing-video-container {
  position: relative;
  min-height: 100vh;
  overflow: hidden;
}
.landing-video-container video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  transform: translate(-50%, -50%);
  object-fit: cover;
}
.landing-video-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
}

/* Landing Page: 倒计时 */
.landing-countdown-item {
  text-align: center;
}
.landing-countdown-number {
  font-size: clamp(2rem, 8vw, 4rem);
  font-weight: 700;
  line-height: 1;
  font-family: var(--wp--preset--font-family--heading);
}

/* Landing Page: 信任徽章 */
.landing-trust-logo {
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all var(--wp--custom--transition--normal);
}
.landing-trust-logo:hover {
  filter: grayscale(0%);
  opacity: 1;
}
```

---

## 实施顺序

1. `templates/page-landing.html` — 模板文件
2. `patterns/landing-hero-form.php` — 核心转化 Pattern
3. `patterns/landing-video-hero.php` — 视频背景 Pattern
4. `patterns/landing-trust-bar.php` — 信任徽章 Pattern
5. `patterns/landing-countdown.php` — 倒计时 Pattern
6. `assets/css/custom.css` — 样式扩展
7. `docs/cclee-theme-dev.md` — 文档更新

---

## 验收标准

- [ ] Landing Page 模板不加载 header/footer
- [ ] 4 个 Patterns 在编辑器中可正常选择和预览
- [ ] 响应式布局在 375px - 1440px 正常显示
- [ ] 倒计时功能正常工作
- [ ] 视频背景自动播放（静音）
- [ ] 信任徽章 hover 效果正常
