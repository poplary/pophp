<?php
    // 是否开启 DEBUG 模式
    define('DEBUG', true);

    // ROOT 项目所在目录，__DIR__ 的上一层
    define('ROOT', dirname(__DIR__).DIRECTORY_SEPARATOR);

    // 引入加载的文件
    require ROOT.'system/Init.php';

    // 执行
    \System\App::run();
