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
        // 错误处理
        if(DEBUG) {
            // 错误报告
            ini_set('display_errors', true);
            error_reporting(E_ERROR | E_WARNING);
        } else {
            ini_set('display_errors', false);
        }

        // 请求数据
        $request = new Request();

        // 路由处理
        Route::parse($request);

        return ;
    }
}