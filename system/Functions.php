<?php

if(! function_exists('dd')) {
    function dd($data, $end=true) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        if($end === true)
            die();
    }
}

if(! function_exists('url')) {
    function url($segment='', $parameters=[]) {
        return \System\Url::getUrl();
    }
}