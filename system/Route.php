<?php

namespace System;

use System\Request;

class Route
{
    // 路由映射
    public $maps = [];

    /**
     * 构造函数
     */
    public function __construct()
    {

    }

    /**
     * 返回路由映射关系
     * @return array 路由映射关系数组
     */
    public function maps()
    {
        return $this->maps;
    }

    /**
     * 存入get请求
     * @param  string $segment  uri
     * @param  mixed  $callBack 执行的方法
     * @return Route  $this
     */
    public function get($segment, $callBack)
    {
        $segment = str_replace('/', '_', $segment);
        $this->maps['get'][$segment] = $callBack;
        return ;
    }

    /**
     * 存入post请求
     * @param  string $segment  uri
     * @param  mixed  $callBack 执行的方法
     * @return Route  $this
     */
    public function post($segment, $callBack)
    {
        $segment = str_replace('/', '_', $segment);
        $this->maps['get'][$segment] = $callBack;
        return ;
    }

    /**
     * 处理路由
     * @param  Request $request 请求
     * @return void
     */
    public function parse(Request $request)
    {
        // 列出路由映射关系
        $maps = Config::get('route.maps');

        // 请求字段及请求方法
        $requestUri = str_replace('/', '_', $request->getUri());
        $requestMethod = $request->getMethod();

        // 找不到映射关系
        if(! isset($maps[$requestMethod][$requestUri]))
            echo '找不到路由' . $requestUri . '(' . $requestMethod . '方法)';

        // $callBack 为可调用的方法或者字符串
        $callBack = $maps[$requestMethod][$requestUri];

        if(is_callable($callBack)) {

            // 可执行的函数，直接执行
            $callBack($request);
        } elseif(is_string($callBack)) {

            // 字符串，格式为 'controller@method'
            $callBackArr = explode('@', $callBack);

            // 控制器及方法
            $controller = $callBackArr[0];
            $method = $callBackArr[1];

            // 实例化并执行控制器下的方法
            $object = new $controller();
            $object->$method($request);
        }

        return;
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