<?php

namespace System;

class Request extends Core
{
    // 请求URI
    public $uri;

    // 请求方法
    public $method;

    // 请求数据
    public $data;

    /**
     * 构造函数.
     *
     * @return Request $this
     */
    public function __construct()
    {
        $this->method = $this->getMethod();
        $this->uri = $this->getUri();
        $this->data = $this->all();

        return $this;
    }

    /**
     * 获取请求的方法.
     *
     * @return string
     */
    public static function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * 获取请求的资源路径.
     *
     * @return string
     */
    public static function getUri()
    {
        // 拆分REQUEST_URI
        $uri = explode('?', $_SERVER['REQUEST_URI']);

        return $uri['0'];
    }

    /**
     * 获取请求的资源路径.
     *
     * @return string
     */
    public static function all()
    {
        return $_REQUEST;
    }

    /**
     * 获取请求项的值
     *
     * @return mixed
     */
    public function __get($val)
    {
        if (isset($this->data[$val])) {
            return $this->data[$val];
        }
    }
}
