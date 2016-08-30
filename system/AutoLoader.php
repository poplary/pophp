<?php
    // 命名空间目录映射
    $namespaceMaps = [
        'System' => 'system/',
        'App' => 'app/',
    ];

    // config配置目录映射
    $configMaps = [
        'route' => 'routes.php',
        'session' => 'session.php',
        'database' => 'database.php',
    ];

    // 引入自定义函数的文件
    require ROOT . 'system/Helpers.php';

    // 自定义错误处理
    set_error_handler('errorHandeler', E_ERROR|E_WARNING|E_NOTICE);
    set_exception_handler('exceptionHandeler');

    /**
     * 自动加载命名空间
     */
    spl_autoload_register(function ($class) use($namespaceMaps) {
        // 拆分
        $class = str_replace('\\', '/', $class);
        $classArr = explode('/', $class, 2);

        // 前缀
        $prefix = $classArr[0];

        // 只加载映射关系的命名空间，其他不做处理
        if(array_key_exists($prefix, $namespaceMaps) !== true) {
            return;
        }

        // 该命名空间所在目录
        $baseDir = rootPath($namespaceMaps[$prefix]);

        // 文件位置
        $fileName = $classArr[1];

        // 文件位置
        $file = $baseDir . str_replace('\\', '/', $fileName) . '.php';

        // 文件存在即加载
        if(file_exists($file)) {
            require $file;
        }
    });

    // 引入配置类

    $config = [];
    // 引入配置文件
    foreach($configMaps as $item => $file) {
        // 配置参数
        $config[$item] = require configPath($file);
    }

    $GLOBALS['_CONFIG'] = $config;

    // 初始化 session 配置
    \System\Session::init();