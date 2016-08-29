<?php
    define('DEBUG', true);

    // ROOT 项目所在目录，__DIR__的上一层
    define('ROOT', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

    // 引入加载的文件
    require ROOT . DIRECTORY_SEPARATOR . 'system/AutoLoader.php';

    // 引入自定义函数的文件
    require ROOT . DIRECTORY_SEPARATOR . 'system/Functions.php';

    // 引入路由文件
    require ROOT . DIRECTORY_SEPARATOR . 'config/routes.php';

    // 执行
    \System\App::run();