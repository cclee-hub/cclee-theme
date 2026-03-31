# 服务器部署文档

_Last updated: 2026-03-23_

## 概览

| 项目 | 值 |
|------|-----|
| 服务器 IP | 47.84.87.131 |
| 系统 | Alibaba Cloud Linux 3 |
| DEMO 站域名 | demo.aigent.ren |

---

## 目录结构

```
/var/www/
├── wp-demo/                    # DEMO 演示站
│   ├── docker-compose.yml
│   ├── .env
│   └── wordpress/wp-content/
│       └── themes/
│           └── cclee/    # 演示父主题原貌
│
└── wp-prod/                    # 正式站（yougu）
    ├── docker-compose.yml
    ├── .env
    └── wordpress/wp-content/
        └── themes/
            ├── cclee/          # 父主题
            └── cclee-yougu/    # yougu 子主题
```

---

## 前置条件

```bash
# 安装 Docker
curl -fsSL https://get.docker.com | sh
sudo usermod -aG docker $USER

# 安装 Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# 安装 Nginx
sudo dnf install -y nginx

# 安装 Certbot（SSL）
sudo dnf install -y certbot python3-certbot-nginx

# 开放防火墙端口
sudo firewall-cmd --permanent --add-service=http
sudo firewall-cmd --permanent --add-service=https
sudo firewall-cmd --reload
```

---

## 1. 创建目录结构

```bash
sudo mkdir -p /var/www/wp-demo/wordpress/wp-content/{themes,plugins,uploads}
sudo mkdir -p /var/www/wp-demo/mysql/data
sudo chown -R $USER:$USER /var/www/wp-demo
```

---

## 2. Docker Compose 配置

### `/var/www/wp-demo/docker-compose.yml`

```yaml
services:
  mysql:
    image: mysql:8.0
    container_name: demo_mysql
    restart: unless-stopped
    environment:
      MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
      MYSQL_DATABASE: ${MYSQL_DATABASE}
      MYSQL_USER: ${MYSQL_USER}
      MYSQL_PASSWORD: ${MYSQL_PASSWORD}
    volumes:
      - ./mysql/data:/var/lib/mysql
    networks:
      - demo_network

  wordpress:
    image: wordpress:latest
    container_name: demo_wordpress
    restart: unless-stopped
    depends_on:
      - mysql
    environment:
      WORDPRESS_DB_HOST: mysql:3306
      WORDPRESS_DB_NAME: ${MYSQL_DATABASE}
      WORDPRESS_DB_USER: ${MYSQL_USER}
      WORDPRESS_DB_PASSWORD: ${MYSQL_PASSWORD}
    volumes:
      - ./wordpress/wp-content/themes:/var/www/html/wp-content/themes
      - ./wordpress/wp-content/plugins:/var/www/html/wp-content/plugins
      - ./wordpress/wp-content/uploads:/var/www/html/wp-content/uploads
    networks:
      - demo_network

  wpcli:
    image: wordpress:cli
    container_name: demo_cli
    depends_on:
      - mysql
      - wordpress
    environment:
      WORDPRESS_DB_HOST: mysql:3306
      WORDPRESS_DB_NAME: ${MYSQL_DATABASE}
      WORDPRESS_DB_USER: ${MYSQL_USER}
      WORDPRESS_DB_PASSWORD: ${MYSQL_PASSWORD}
    volumes:
      - ./wordpress/wp-content/themes:/var/www/html/wp-content/themes
      - ./wordpress/wp-content/plugins:/var/www/html/wp-content/plugins
      - ./wordpress/wp-content/uploads:/var/www/html/wp-content/uploads
    networks:
      - demo_network
    entrypoint: tail -f /dev/null

networks:
  demo_network:
```

### `/var/www/wp-demo/.env`

```env
MYSQL_ROOT_PASSWORD=your_strong_root_password_here
MYSQL_DATABASE=wp_demo
MYSQL_USER=wp_demo
MYSQL_PASSWORD=your_strong_password_here
```

> ⚠️ 修改密码后执行：`chmod 600 .env`

---

## 3. Nginx 配置

### `/etc/nginx/conf.d/demo.aigent.ren.conf`

```nginx
# DEMO 站 - demo.aigent.ren
server {
    listen 80;
    server_name demo.aigent.ren;

    # Let's Encrypt 验证路径
    location /.well-known/acme-challenge/ {
        root /usr/share/nginx/html;
    }

    # 重定向到 HTTPS（SSL 配置后启用）
    # return 301 https://$server_name$request_uri;

    location / {
        proxy_pass http://127.0.0.1:8081;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;

        # WordPress 上传限制
        client_max_body_size 64M;
    }
}

# HTTPS 配置（SSL 证书申请后取消注释）
# server {
#     listen 443 ssl http2;
#     server_name demo.aigent.ren;
#
#     ssl_certificate /etc/letsencrypt/live/demo.aigent.ren/fullchain.pem;
#     ssl_certificate_key /etc/letsencrypt/live/demo.aigent.ren/privkey.pem;
#
#     ssl_session_timeout 1d;
#     ssl_session_cache shared:SSL:50m;
#     ssl_session_tickets off;
#
#     ssl_protocols TLSv1.2 TLSv1.3;
#     ssl_ciphers ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES128-GCM-SHA256;
#     ssl_prefer_server_ciphers off;
#
#     # HSTS
#     add_header Strict-Transport-Security "max-age=63072000" always;
#
#     location / {
#         proxy_pass http://127.0.0.1:8081;
#         proxy_set_header Host $host;
#         proxy_set_header X-Real-IP $remote_addr;
#         proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
#         proxy_set_header X-Forwarded-Proto $scheme;
#         proxy_set_header X-Forwarded-SSL on;
#         client_max_body_size 64M;
#     }
# }
```

---

## 4. DNS 配置

在域名服务商添加 A 记录：

| 类型 | 名称 | 值 |
|------|------|-----|
| A | demo | 47.84.87.131 |

---

## 5. 部署步骤

```bash
# 1. 进入项目目录
cd /var/www/wp-demo

# 2. 创建并配置 .env（修改密码！）
cp .env.example .env
vim .env

# 3. 启动容器
docker-compose up -d

# 4. 验证容器状态
docker-compose ps

# 5. 配置 Nginx
sudo cp /path/to/demo.aigent.ren.conf /etc/nginx/conf.d/
sudo nginx -t
sudo systemctl reload nginx

# 6. 申请 SSL 证书（DNS 生效后）
sudo certbot certonly --nginx -d demo.aigent.ren

# 7. 启用 HTTPS（编辑 nginx conf，取消注释 HTTPS 部分）
sudo vim /etc/nginx/conf.d/demo.aigent.ren.conf
sudo nginx -t
sudo systemctl reload nginx

# 8. 设置自动续期
sudo systemctl enable certbot-renew.timer
```

---

## 6. 主题部署

### DEMO 站（演示父主题）

```bash
cd /var/www/wp-demo/wordpress/wp-content/themes
git clone https://github.com/cclee-hub/cclee.git
```

### 正式站（父主题 + 子主题）

```bash
cd /var/www/wp-prod/wordpress/wp-content/themes

# 克隆父主题
git clone https://github.com/cclee-hub/cclee.git

# 创建客户定制子主题
mkdir cclee-yougu
# 上传本地 cclee-yougu/ 内容
```

> 子主题开发流程参考：`docs/cclee-dev.md`

---

## 7. 常用命令

```bash
# 查看日志
docker logs demo_wordpress --tail 50

# WP-CLI 命令
docker exec demo_cli wp [command] --allow-root

# 重启服务
docker-compose restart
```

---

## 8. 更新主题

```bash
# 更新 DEMO 站主题
cd /var/www/wp-demo/wordpress/wp-content/themes/cclee
git pull

# 更新正式站父主题
cd /var/www/wp-prod/wordpress/wp-content/themes/cclee
git pull
```

---

## 9. 扩展新站点

添加新站点只需：

1. 创建目录：`/var/www/wp-newsite/`
2. 复制并修改 `docker-compose.yml`（修改端口、容器名）
3. 创建 Nginx 配置：`/etc/nginx/conf.d/newsite.aigent.ren.conf`
4. `nginx -t && systemctl reload nginx`
5. 申请 SSL

---

## 检查清单

- [ ] DNS A 记录已添加
- [ ] .env 密码已修改
- [ ] Docker 容器运行正常
- [ ] Nginx 配置正确
- [ ] SSL 证书已申请
- [ ] HTTPS 已启用
- [ ] cclee 已克隆
- [ ] WP DEBUG 已关闭（生产环境）
