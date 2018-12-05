# laravel-bbs

## 开发环境部署/安装

本项目代码使用 PHP 框架 [Laravel 5.6](https://laravel.com/docs/5.6) 开发，本地开发环境使用 [Laravel Valet](https://laravel.com/docs/5.6/valet)。


### 基础安装

#### 1. 克隆源代码

克隆 `laravel-bbs` 源代码到本地：

    > git clone git@github.com:oiuv/laravel-bbs.git


#### 2. 安装扩展包依赖

    composer install

#### 3. 生成配置文件

```
cp .env.example .env
```

你可以根据情况修改 `.env` 文件里的内容，如数据库连接、缓存、邮件设置等。


#### 4. 生成秘钥

```shell
php artisan key:generate
```

#### 5. 生成数据表及生成测试数据

```shell
$ php artisan migrate --seed
```

初始的用户角色权限已使用数据迁移生成，1号用户为最高管理员。


至此, 安装完成 ^_^。

## 扩展包使用情况

| 扩展包 | 一句话描述 | 本项目应用场景 |
| --- | --- | --- |
| [Intervention/image](https://github.com/Intervention/image) | 图片处理功能库 | 用于图片裁切 |
| [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) | HTTP 请求套件 | 请求百度翻译 API  |
| [predis/predis](https://github.com/nrk/predis.git) | Redis 官方首推的 PHP 客户端开发包 | 缓存驱动 Redis 基础扩展包 |
| [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar) | 页面调试工具栏 (对 phpdebugbar 的封装) | 开发环境中的 DEBUG |
| [spatie/laravel-permission](https://github.com/spatie/laravel-permission) | 角色权限管理 | 角色和权限控制 |
| [mewebstudio/Purifier](https://github.com/mewebstudio/Purifier) | 用户提交的 Html 白名单过滤 | 帖子内容的 Html 安全过滤，防止 XSS 攻击 |
| [hieu-le/active](https://github.com/letrunghieu/active) | 选中状态 | 顶部导航栏选中状态 |
| [z-song/laravel-admin](https://github.com/z-song/laravel-admin) | 管理后台 | 模型管理后台、配置信息管理后台 |
| [viacreative/sudo-su](https://github.com/viacreative/sudo-su) | 用户切换 | 开发环境中快速切换登录账号 |
| [laravel/horizon](https://github.com/laravel/horizon) | 队列监控 | 队列监控命令与页面控制台 /horizon |

