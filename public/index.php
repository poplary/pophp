<?php
    // 是否开启 DEBUG 模式
    define('DEBUG', true);

    // 错误处理
    if(DEBUG) {
        // 错误报告
        ini_set('display_errors', true);
        error_reporting(E_ERROR | E_WARNING);
    } else {
        ini_set('display_errors', false);
    }

    // ROOT 项目所在目录，__DIR__ 的上一层
    define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

    // 引入加载的文件
    require ROOT . 'system/AutoLoader.php';

    // 执行
    \System\App::run();