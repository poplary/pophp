<?php

    $namespaceMap = [
        'System' => 'system/',
        'App' => 'app/',
    ];

    /**
     * 自动加载
     */
    spl_autoload_register(function ($class) use($namespaceMap) {
        // 拆分
        $class = str_replace('\\', '/', $class);
        $classArr = explode('/', $class, 2);

        // 前缀
        $prefix = $classArr[0];

        // 只加载映射关系的命名空间，其他不做处理
        if(array_key_exists($prefix, $namespaceMap) !== true) {
            return;
        }

        // 该命名空间所在目录
        $baseDir = ROOT . $namespaceMap[$prefix];

        // 文件位置
        $fileName = $classArr[1];

        // 文件位置
        $file = $baseDir . str_replace('\\', '/', $fileName) . '.php';

        // 文件存在即加载
        if(file_exists($file)) {
            require $file;
        }
    });
