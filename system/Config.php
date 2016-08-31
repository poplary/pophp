<?php
namespace System;

class Config extends Core
{

    /**
     * 获取配置
     * @param  string $key     配置项
     * @param  mixed  $default 获取不到配置时返回的默认值
     * @return mixed           获取配置的结果
     */
    public static function get($key, $default = null)
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
}