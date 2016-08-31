<?php
namespace System;

use System\Config;

class Library extends Core
{
    public static function init()
    {}

    public static function load()
    {
        $libraries = appConfig()['libraries'];
        foreach($libraries as $library) {
            // 初始化
            $class = "\\System\\Libraries\\$library";
            $class::init();
        }
    }
}