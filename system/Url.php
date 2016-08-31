<?php

namespace System;

class Url extends Core
{

    public static function url()
    {
        $header = 'http';

        if(isset($_SERVER['HTTPS']))
            $header = 'https';

        $url = $header . '://' . $_SERVER['HTTP_HOST'];

        return $url;
    }

    public static function domain()
    {

        return $_SERVER['HTTP_HOST'];
    }
}