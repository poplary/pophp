<?php

if(! function_exists('dd')) {
    /**
     * 打印结果
     * @param  mixed   $data 需要打印的数据
     * @param  boolean $end  是否在打印结果后中断程序，默认为true
     * @return void
     */
    function dd($data, $end=true)
    {

        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        if($end === true)
            die();
        return;
    }
}

if(! function_exists('errorHandeler')) {
    function errorHandeler($errno, $errstr, $errfile, $errline, $errcontext)
    {
        if (! (error_reporting() && $errno)) {
            return;
        }

        echo '<p>';

        switch ($errno) {
            case E_USER_ERROR:
                echo "<b>ERROR</b> ";
                break;

            case E_USER_WARNING:
                echo "<b>WARNING</b> ";
                break;

            case E_USER_NOTICE:
                echo "<b>NOTICE</b> ";
                break;

            case E_USER_DEPRECATED:
                echo "<b>DEPRECATED</b> ";
                break;

            default:
                echo "<b>Unknown error type</b> ";
                break;
        }
        echo "[<span style='color:red'>$errno</span>] $errstr<br />\n";
        echo "Location($errfile <span>line</span> <b style='color:green'>$errline</b>)";
        echo '<p>';
        exit(1);
    }
}


if(! function_exists('exceptionHandeler')) {
    function exceptionHandeler($exception)
    {
        // dd($exception);
        echo '<p>';
        echo "<span style='color:red'><b>Exception</b></span>: " . $exception->getMessage() . ".<br/>\n";
        echo "<span style='color:green'><b>Location</b></span>(" . $exception->getFile(). " <span>line</span> <b style='color:green'>" . $exception->getLine() . "</b>)";
        echo "<p><span style='color:gray'>Trace</span></p>";

        foreach($exception->getTrace() as $index => $trace) {
            echo "<span style='color:red'>[" . $index . "]</span>
                    <span><b style='color:green'>file:</b></span> " . $trace['file']. "
                    <span><b style='color:green'>line:</b></span> " . $trace['line']. "
                    <span><b style='color:blue'>function:</b></span> " . $trace['class'] . $trace['type'] . $trace['function'] . "<br/>\n";
        }
        echo '<p>';
        exit(1);
    }
}

if(! function_exists('redirect')) {
    /**
     * 跳转
     * @param  string  $uri 将要跳转的uri
     * @return void
     */
    function redirect($uri)
    {
        $url = url($uri);
        header('Location:' . $url);
    }
}

if(! function_exists('url')) {
    /**
     * 生成链接
     * @param  string $segment    uri
     * @param  array  $parameters get参数
     * @return string             生成的链接
     */
    function url($segment='', $parameters=[])
    {

        return \System\Url::getUrl($segment, $parameters);
    }
}

if(! function_exists('rootPath')) {
    /**
     * 获取根目录
     * @param  string $fileName 根目录下的文件名
     * @return string           根目录
     */
    function rootPath($fileName='')
    {

        $fileName = ltrim($fileName, '/');
        $rootPath = ROOT;
        return $rootPath . $fileName;
    }
}

if(! function_exists('systemPath')) {
    /**
     * 获取system目录
     * @param  string $fileName system目录下的文件名
     * @return string           system目录
     */
    function systemPath($fileName='')
    {

        $fileName = ltrim($fileName, '/');
        $systemPath = ROOT . 'system' . DIRECTORY_SEPARATOR;
        return $systemPath . $fileName;
    }
}

if(! function_exists('publicPath')) {
    /**
     * 获取public目录
     * @param  string $fileName public目录下的文件名
     * @return string           public目录
     */
    function publicPath($fileName='')
    {

        $fileName = ltrim($fileName, '/');
        $publicPath = ROOT . 'public' . DIRECTORY_SEPARATOR;
        return $publicPath . $fileName;
    }
}

if(! function_exists('configPath')) {
    /**
     * 获取config目录
     * @param  string $fileName config目录下的文件名
     * @return string           config目录
     */
    function configPath($fileName='')
    {

        $fileName = ltrim($fileName, '/');
        $configPath = ROOT . 'config' . DIRECTORY_SEPARATOR;
        return $configPath . $fileName;
    }
}

if(! function_exists('dataPath')) {
    /**
     * 获取data目录
     * @param  string $fileName data目录下的文件名
     * @return string           data目录
     */
    function dataPath($fileName='')
    {

        $fileName = ltrim($fileName, '/');
        $dataPath = ROOT . 'data' . DIRECTORY_SEPARATOR;
        return $dataPath . $fileName;
    }
}

if(! function_exists('sessionPath')) {
    /**
     * 获取session目录
     * @return string           session目录
     */
    function sessionPath()
    {

        $sessionPath = dataPath() . 'sessions' . DIRECTORY_SEPARATOR;
        return $sessionPath;
    }
}

if(! function_exists('appPath')) {
    /**
     * 获取app目录
     * @param  string $directory app目录下子目录，若分级
     * @return string            app目录
     */
    function appPath($directory='')
    {

        $appPath = rootPath() . 'app' . DIRECTORY_SEPARATOR;
        $appPath .= $directory === ''? '': $directory . DIRECTORY_SEPARATOR;
        return $appPath;
    }
}