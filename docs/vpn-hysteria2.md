# Hysteria2 VPN 配置

## 服务信息

| 项目 | 值 |
|------|-----|
| 服务器 IP | 47.84.87.131 |
| 监听端口 | UDP 36712 |
| 域名 | vpn-sg.aigent.ren |
| 协议 | Hysteria2 |
| TLS 证书 | Let's Encrypt (自动续期) |

## 服务器配置

文件位置: `/opt/hysteria2/config.yaml`

```yaml
listen: :36712

acme:
  domains:
    - vpn-sg.aigent.ren
  email: leecc1531@gmail.com

auth:
  type: password
  password: test88888

masquerade:
  type: proxy
  proxy:
    url: https://www.bing.com
    rewriteHost: true
```

## 服务管理

```bash
# 查看状态
systemctl status hysteria2

# 重启服务
systemctl restart hysteria2

# 查看日志
journalctl -u hysteria2 -f
```

## 客户端配置示例

```yaml
server: vpn-sg.aigent.ren:36712

auth: test88888

tls:
  sni: vpn-sg.aigent.ren

socks5:
  listen: 127.0.0.1:1080

http:
  listen: 127.0.0.1:8080
```

## 相关链接

- [Hysteria2 官方文档](https://v2.hysteria.network/)
- 服务安装路径: `/opt/hysteria2/`
