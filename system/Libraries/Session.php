<?php

namespace System\Libraries;

use System\Config;

class Session
{
    /**
     * 初始化session.
     *
     * @return void
     */
    public static function init()
    {
        // 缓存时间参数为秒，需转为分钟
        $expire = Config::get('session.expire', 7200) / 60;
        $name = Config::get('session.name', 'pophp');
        $savePath = rtrim(Config::get('session.save_path', sessionPath()), DIRECTORY_SEPARATOR);

        // session过期时间，单位为分钟
        session_cache_expire($expire);

        // session名称
        session_name($name);

        // session存储位置
        session_save_path($savePath);

        // 开启session
        session_start();
    }

    /**
     * 获取 session.
     *
     * @param string $key     session的键
     * @param mixed  $default 若session不存在，返回的默认值
     *
     * @return mixed $value   获取session结果
     */
    public function get($key, $default = null)
    {
        $value = isset($_SESSION[$key]) ? $_SESSION[$key] : $default;

        return $value;
    }

    /**
     * 设置session.
     *
     * @param string $key   session的键
     * @param string $value session的值
     *
     * @return mixed $value 设置session的值
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;

        return $_SESSION[$key];
    }

    /**
     * 删除特定键的session.
     *
     * @param string $key session的键
     *
     * @return void
     */
    public function delete($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * 清楚所有session.
     *
     * @return void
     */
    public function destroy()
    {
        $_SESSION = [];
        session_destroy();
    }

    /**
     * 调用类的值的方法获取session的值
     *
     * @param string $key session的键
     *
     * @return mixed $value 获取session结果
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * 调用类的值的方法设置session.
     *
     * @param string $key   session的键
     * @param string $value session的值
     *
     * @return mixed $value 设置session的值
     */
    public function __set($key, $value)
    {
        return $this->set($key, $value);
    }

    /**
     * isset() 判断session是否存在时调用.
     *
     * @param string $key session的键
     *
     * @return bool session是否存在
     */
    public function __isset($key)
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * unset() 销毁session时调用.
     *
     * @param string $key session的键
     *
     * @return void
     */
    public function __unset($key)
    {
        $this->delete($key);
    }
}
