<?php

if (!function_exists('dd')) {
    /**
     * 打印结果.
     *
     * @param mixed $data 需要打印的数据
     * @param bool  $end  是否在打印结果后中断程序，默认为true
     *
     * @return void
     */
    function dd($data = '', $end = true)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        if ($end === true) {
            die();
        }
    }
}

if (!function_exists('errorLog')) {
    function errorLog($message)
    {
        $logPath = logPath(date('Ymd').'_errors.log');
        $message = '['.date('Y-m-d H:i:s').']'.$message;
        error_log($message.PHP_EOL, 3, $logPath);
    }
}

if (!function_exists('errorHandeler')) {
    function errorHandeler($errno, $errstr, $errfile, $errline, $errcontext)
    {
        if (!(error_reporting() && $errno)) {
            return;
        }

        echo "<p><b>$errno</b> [<span style='color:red'>$errno</span>] $errstr<br />\n";
        echo "Location($errfile <span>line</span> <b style='color:green'>$errline</b>)</p><br/>\n<br/>\n";

        $message = "$errno[$errno]: $errstr . in $errfile(line: $errline)";
        errorLog($message);

        exit();
    }
}


if (!function_exists('exceptionHandeler')) {
    function exceptionHandeler($exception)
    {
        echo "<p><span style='color:red'><b>Exceptions[".$exception->getCode().']</b></span>: '.$exception->getMessage().".<br/>\n";
        echo "<span style='color:green'><b>Location</b></span>(".$exception->getFile()." <span>line</span> <b style='color:green'>".$exception->getLine().'</b>)';
        echo "<p><span style='color:gray'>Trace</span></p>";

        $traceMessage = '';
        foreach ($exception->getTrace() as $index => $trace) {
            echo "<span style='color:red'>[".$index."]</span>
                    <span><b style='color:green'>file:</b></span> ".$trace['file']."
                    <span><b style='color:green'>line:</b></span> ".$trace['line']."
                    <span><b style='color:blue'>function:</b></span> ".$trace['class'].$trace['type'].$trace['function']."<br/>\n";
            $traceMessage .= '['.$index.'] File: '.$trace['file'].'(Line: '.$trace['line'].'), Function: '.$trace['class'].$trace['type'].$trace['function'].PHP_EOL.' Args: '.PHP_EOL.var_export($trace['args'], true).PHP_EOL;
        }
        echo "</p><br/>\n<br/>\n";

        $message = 'Exceptions['.$exception->getCode().']: '.$exception->getMessage().' . in '.$exception->getFile().'(line: '.$exception->getLine().')'.PHP_EOL.'Trace:'.PHP_EOL.$traceMessage;
        errorLog($message);
        exit();
    }
}

if (!function_exists('url')) {
    /**
     * 生成链接.
     *
     * @param string $segment    uri
     * @param array  $parameters get参数
     *
     * @return string 生成的链接
     */
    function url($segment = '', $parameters = [])
    {
        return \System\Url::url($segment, $parameters);
    }
}

if (!function_exists('domain')) {
    /**
     * 获取域名.
     *
     * @return string 域名
     */
    function domain()
    {
        return \System\Url::domain();
    }
}

if (!function_exists('redirect')) {
    /**
     * 跳转.
     *
     * @param string $uri 将要跳转的uri
     *
     * @return void
     */
    function redirect($uri)
    {
        $url = url($uri);
        header('Location:'.$url);
    }
}

if (!function_exists('rootPath')) {
    /**
     * 获取根目录.
     *
     * @param string $fileName 根目录下的文件名
     *
     * @return string 根目录
     */
    function rootPath($fileName = '')
    {
        $fileName = ltrim($fileName, '/');
        $rootPath = ROOT;

        return $rootPath.$fileName;
    }
}

if (!function_exists('systemPath')) {
    /**
     * 获取system目录.
     *
     * @param string $fileName system目录下的文件名
     *
     * @return string system目录
     */
    function systemPath($fileName = '')
    {
        $fileName = ltrim($fileName, '/');
        $systemPath = ROOT.'system'.DIRECTORY_SEPARATOR;

        return $systemPath.$fileName;
    }
}

if (!function_exists('publicPath')) {
    /**
     * 获取public目录.
     *
     * @param string $fileName public目录下的文件名
     *
     * @return string public目录
     */
    function publicPath($fileName = '')
    {
        $fileName = ltrim($fileName, '/');
        $publicPath = ROOT.'public'.DIRECTORY_SEPARATOR;

        return $publicPath.$fileName;
    }
}

if (!function_exists('configPath')) {
    /**
     * 获取config目录.
     *
     * @param string $fileName config目录下的文件名
     *
     * @return string config目录
     */
    function configPath($fileName = '')
    {
        $fileName = ltrim($fileName, '/');
        $configPath = ROOT.'config'.DIRECTORY_SEPARATOR;

        return $configPath.$fileName;
    }
}

if (!function_exists('dataPath')) {
    /**
     * 获取data目录.
     *
     * @param string $segment data目录下子目录/文件
     *
     * @return string data目录
     */
    function dataPath($segment = '')
    {
        $segment = ltrim($segment, '/');
        $dataPath = ROOT.'data'.DIRECTORY_SEPARATOR;

        return $dataPath.$segment;
    }
}

if (!function_exists('sessionPath')) {
    /**
     * 获取session存储的目录.
     *
     * @return string session存储的目录
     */
    function sessionPath()
    {
        $sessionPath = dataPath().'sessions';

        return $sessionPath;
    }
}

if (!function_exists('logPath')) {
    /**
     * 获取log存储的目录.
     *
     * @param string $segment 日志目录下子目录/文件
     *
     * @return string log存储的目录
     */
    function logPath($segment = '')
    {
        $logPath = dataPath().'logs'.DIRECTORY_SEPARATOR;

        return $logPath.$segment;
    }
}

if (!function_exists('appConfig')) {
    /**
     * 获取当前app的配置.
     *
     * @return string app配置
     */
    function appConfig()
    {
        $domain = str_replace('.', '_', domain());
        $appConfig = \System\Config::get('application');

        return isset($appConfig[$domain]) ? $appConfig[$domain] : isset($appConfig['default']);
    }
}

if (!function_exists('appPath')) {
    /**
     * 获取app目录.
     *
     * @param string $segment app目录下子目录/文件
     *
     * @return string app目录
     */
    function appPath($segment = '')
    {
        $appConfig = appConfig();
        $appPath = rootPath().$appConfig['app_path'];
        $appPath .= $segment === '' ? '' : $segment;

        return $appPath;
    }
}

if (!function_exists('viewPath')) {
    /**
     * 获取view目录.
     *
     * @param string $segment view目录下子目录/文件
     *
     * @return string view目录
     */
    function viewPath($segment = '')
    {
        $appConfig = appConfig();
        $viewPath = appPath().$appConfig['view_path'];
        $viewPath .= $segment === '' ? '' : $segment;

        return $viewPath;
    }
}
