<?php

namespace System;

class App extends Core
{
    /**
     * 运行.
     *
     * @return void
     */
    public static function run()
    {
        // 初始化libraries
        Library::load();

        // 请求数据
        $request = new Request();

        // 路由处理
        Route::parse($request);
    }
}
