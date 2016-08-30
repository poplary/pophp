<?php

namespace App\Controllers;

use System\Request;
use System\Session;

class HomeController extends Controller
{

    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

        Session::set('key', '123');
        var_dump($_SESSION);
        dd(rootPath('index.php'),0);
        dd(systemPath('index.php'),0);
        dd(publicPath('index.php'),0);
    }
}