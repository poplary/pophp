<?php
namespace App\Controllers;

use System\Request;
use System\Libraries\Session;

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
        var_dump($_SESSION);
        $session = new Session;
        var_dump($session->get('key'));
        $session->set('key', '123');
        var_dump($_SESSION);
        var_dump(session_status());
        var_dump(session_id());
        var_dump(session_name());

        var_dump(appPath());

        var_dump(domain());
        var_dump(viewPath());

        dd(rootPath('index.php'),0);
        dd(systemPath('index.php'),0);
        dd(publicPath('index.php'),0);
    }
}