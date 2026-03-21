---
paths:
  - cn-site/**
---

# cn-site 规则

## 技术栈

- PbootCMS + SQLite
- 无 PHP 本地环境，不可本地运行

## 路径

- 本地：`~/workspace/yougu/cn-site/`
- 服务器：`/var/www/cn-site/`

## 开发原则

- 所有改动直接编辑文件，通过 git push 部署到服务器验证
- 不依赖本地预览，以服务器效果为准
- 操作服务器文件前必须确认完整路径
