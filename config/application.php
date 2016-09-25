<?php

return [
    // application配置，键为域名，.由_替换
    'default' => [
        // app的目录，相对于根目录
        'app_path' => 'app/',

        // 配置目录，相对于 root/config/
        'config' => '',

        // 模型目录，相对于 root/app/
        'model_path' => 'Models/',

        // 控制器目录，相对于 root/app/
        'controller_path' => 'Controllers/',

        // 视图目录，相对于 root/app/
        'view_path' => 'Views/',

        // 加载的library
        'libraries' => ['Session'],
    ],

    // application配置，键为域名，.由_替换
    'pophp_dev' => [
        // app的目录，相对于根目录
        'app_path' => 'app/',

        // 配置目录，相对于 root/config/
        'config' => '',

        // 模型目录，相对于 root/app/
        'model_path' => 'Models/',

        // 控制器目录，相对于 root/app/
        'controller_path' => 'Controllers/',

        // 视图目录，相对于 root/app/
        'view_path' => 'Views/',

        // 加载的library
        'libraries' => ['Session'],
    ],

];
