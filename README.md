laravel-admin登陆 滑动验证插件
======
laravel-admin登陆 滑动验证插件

### 支持
- [顶象](https://www.dingxiang-inc.com/business/captcha):heavy_check_mark:
- [极验](http://www.geetest.com)
- [Recaptcha v3(谷歌)](https://developers.google.com/recaptcha):heavy_check_mark:（**国内可用，完全免费**）
- [~~数美(暂不支持网页)~~](https://www.ishumei.com/product/bs-post-register.html)
- [腾讯防水墙](https://cloud.tencent.com/document/product/1110/36839):heavy_check_mark:
- [同盾](https://x.tongdun.cn/product/captcha)
- [V5验证](https://www.verify5.com/index):heavy_check_mark:（**免费版日限500次**）
- [Vaptcha](https://www.vaptcha.com):heavy_check_mark:（**免费，不过该验证码使用难度相对较高**）
- [网易](http://dun.163.com/product/captcha):heavy_check_mark:
- [云片](https://www.yunpian.com/product/captcha):heavy_check_mark:
- 有主流的未发现的、额外有需求的请[issue](https://github.com/asundust/auth-captcha/issues)


### 截图
![img](https://github.com/asundust/images/blob/master/images/auth-captcha-screenshot.png?raw=true)


### 安装
```
composer require asundust/auth-captcha
```


### 获取密钥

#### 顶象
- 配置代码如下
```
'auth-captcha' => [
    'enable' => true,
    'provider' => 'dingxiang',
    'style' => 'oneclick', // 弹出式: popup 嵌入式: embed 内联式: inline 触发式: oneclick (不填写默认popup)
    'appid' => '{AppID}',
    'secret' => '{AppSecret}',
    'ext_config' => [],
],
```
- 访问 [https://www.dingxiang-inc.com/business/captcha](https://www.dingxiang-inc.com/business/captcha)
- [官网文档配置DEMO](https://cdn.dingxiang-inc.com/ctu-group/captcha-ui/demo)
- [官网文档地址](https://www.dingxiang-inc.com/docs/detail/captcha)

#### Recaptcha v3(谷歌)
- 配置代码如下
```
'auth-captcha' => [
    'enable' => true,
    'provider' => 'recaptcha',
    'appid' => '{site_key}',
    'secret' => '{secret}',
    // 'domain' => 'https://www.google.com', // 服务域名，可选，无此选项默认为 https://recaptcha.net
    // 'score' => '0.5', // 可信任分数，可选，无此选项默认为 0.7
],
```
- 访问 [https://www.google.com/recaptcha/admin/create](https://www.google.com/recaptcha/admin/create) 选择v3版
- [官网文档地址(前端)](https://developers.google.com/recaptcha/docs/v3)
- [官网文档地址(后端)](https://developers.google.com/recaptcha/docs/verify/)

#### 腾讯防水墙
- 配置代码如下
```
'auth-captcha' => [
    'enable' => true,
    'provider' => 'tencent',
    'appid' => '{AppID}',
    'secret' => '{AppSecretKey}',
],
```
- 新用户购买 [https://cloud.tencent.com/product/captcha](https://cloud.tencent.com/product/captcha)
- 新用户[官方使用文档地址](https://cloud.tencent.com/document/product/1110/36839)
- 老用户[官方使用文档地址](https://007.qq.com/captcha/#/gettingStart)
- [关于腾讯防水墙收费的声明(新用户终身免费5万次)](https://007.qq.com/help.html?ADTAG=index.head)

#### V5验证
- 配置代码如下
```
'auth-captcha' => [
    'enable' => true,
    'provider' => 'verify5',
    'appid' => '{APP ID}',
    'secret' => '{APP Key}',
    'host' => '{Host}',
],
```
- 访问 [https://www.verify5.com/console/app/list](https://www.verify5.com/console/app/list)
- 访问 [官方使用文档地址](https://www.verify5.com/doc/reference)

#### Vaptcha
- 配置代码如下
```
'auth-captcha' => [
    'enable' => true,
    'provider' => 'vaptcha',
    'style' => 'invisible', // 隐藏式(类似popup): invisible 点击式: click 嵌入式: embed (不填写默认invisible)
    'appid' => '{VID}',
    'secret' => '{Key}',
    'ext_config' => [],
],
```
- 访问 [https://www.vaptcha.com](https://www.vaptcha.com)
- 访问 [官方使用文档地址](https://www.vaptcha.com/document/install)


#### 网易易盾
- 配置代码如下
```
'auth-captcha' => [
    'enable' => true,
    'provider' => 'wangyi',
    'style' => '', // 注意后台申请的类型！！！ 常规弹出式: popup 常规嵌入式: embed 常规触发式: float 无感绑定按钮：bind 无感点击式: ''(留空，奇葩设定) (不填写默认popup)
    'appid' => '{captchaId}',
    'secret' => '{secretId}',
    'secret_key' => '{secretKey}', // 这里多了一个额外参数，请注意！！！
    'ext_config' => [],
],
```
- 访问 [http://dun.163.com/product/captcha](http://dun.163.com/product/captcha)
- 访问 [官方使用文档地址](http://support.dun.163.com/documents/15588062143475712?docId=150401879704260608)


#### 云片
- 配置代码如下
```
'auth-captcha' => [
    'enable' => true,
    'provider' => 'yunpian',
    'style' => '', // flat: 直接嵌入 float: 浮动 dialog: 对话框 external: 外置滑动(拖动滑块时才浮现验证图片，仅适用于滑动拼图验证) (不填写默认dialog) PS：flat和external貌似存在回调bug，不推荐使用
    'appid' => '{APPID}',
    'secret' => '{Secret Id}',
    'secret_key' => '{Secret Key}', // 这里多了一个额外参数，请注意！！！
    'ext_config' => [],
],
```
- 访问 [https://www.yunpian.com/console/#/captcha/product](https://www.yunpian.com/console/#/captcha/product)
- 访问 [官方使用文档地址](https://www.yunpian.com/official/document/sms/zh_CN/captcha/captcha_service)


### 配置
- 在`config/admin.php` 文件里加入上述配置好的文件。
```
'extensions' => [
    'auth-captcha' => [
        // ...
    ],
]
```

- 亦可添加ENV配置
```
'enable' => env('AUTH_CAPTCHA_ENABLE'),
'appid' => env('AUTH_CAPTCHA_APPID'),
'secret' => env('AUTH_CAPTCHA_SECRET'),
// 'secret_key' => env('AUTH_CAPTCHA_SECRET_KEY'), // 部分需要此第三个参数！！！
// 'host' => env('AUTH_CAPTCHA_HOST'), // 部分需要此第三个参数！！！
// 'domain' => env('AUTH_CAPTCHA_DOMAIN'), // 部分需要此第三个参数！！！
// 'score' => env('AUTH_CAPTCHA_SCORE'), // 部分需要此第三个参数！！！
// 'xxxxxx' => env('AUTH_CAPTCHA_XXXXXX'), // demo
```
- 在`.env`文件下加入
```
AUTH_CAPTCHA_ENABLE=true
AUTH_CAPTCHA_APPID=xxxxxx
AUTH_CAPTCHA_SECRET=xxxxxx
#AUTH_CAPTCHA_SECRET_KEY=xxxxxx
#AUTH_CAPTCHA_HOST=xxxxxx
#AUTH_CAPTCHA_DOMAIN=xxxxxx
#AUTH_CAPTCHA_SCORE=xxxxxx
#AUTH_CAPTCHA_XXXXXX=xxxxxx
```

- 在`resources/lang/zh-CN(example).json` 文件里加入如下配置。
```
"Sliding validation failed. Please try again.": "滑动验证未通过，请重试。",
"Please complete the validation.": "请完成验证。",
"Config Error.": "配置错误。"
```

- 额外配置说明，参考顶象的一个配置
```
'ext_config' => [
    'customLanguage' => [
        'init_inform' => '拖动一下',
        'slide_inform' => '向右向右',
    ],
],
```


### 使用
在浏览器里打开laravel-admin登陆页

### 未来
- ~~加入回车键监听~~:heavy_check_mark:
- 加入更多滑动验证码（持续添加ing）:heavy_check_mark:
- 加入表单验证
- 验证码功能模块化，提供给Laravel项目内使用（该想法实现有点难度，看着办吧）

### 升级注意事项
[UPGRADE.md](UPGRADE.md)

### 更新日志
[CHANGE_LOG.md](CHANGE_LOG.md)

### 支持
如果觉得这个项目帮你节约了时间，不妨支持一下呗！

![alipay](https://raw.githubusercontent.com/asundust/images/master/images/pay_qrcode_alipay.png)
![wechat](https://raw.githubusercontent.com/asundust/images/master/images/pay_qrcode_wechat.png)

### License
[The MIT License (MIT)](https://opensource.org/licenses/MIT)