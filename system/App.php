<?php

namespace System;

class App
{
    /**
     * 运行
     * @return void
     */
    public static function run()
    {

        // 请求数据
        $request = new Request();

        // 路由处理
        Route::parse($request);

        return ;
    }
}