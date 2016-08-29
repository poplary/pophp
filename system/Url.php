<?php

namespace System;

class Url{

    public static function getUrl()
    {
        $header = 'http';

        if(isset($_SERVER['HTTPS']))
            $header = 'https';

        $url = $header . '://' . $_SERVER['HTTP_HOST'];

        return $url;
    }
}