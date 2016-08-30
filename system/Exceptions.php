<?php

namespace System;

class Exceptions
{

    /**
     * 静态调用该类的方法
     * @param  string $name 方法名
     * @param  array  $args 调用方法的参数
     * @return mixed        执行方法结果
     */
    public static function __callStatic($name, $args)
    {
        return call_user_func_array($name, $args);
    }
}