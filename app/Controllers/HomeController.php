<?php

namespace App\Controllers;

use System\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        dd($request->all());
    }
}