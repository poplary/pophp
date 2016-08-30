<?php

namespace System;

class Config{

    public function get($key, $default = null)
    {
        $keyArr = explode('.', $key);

        $value = $GLOBALS['_CONFIG'];

        foreach($keyArr as $item) {

            if(! isset($value[$item])) {

                if($default)
                    return $default;

                return null;
            }

            $value = $value[$item];
        }

        return $value;
    }

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