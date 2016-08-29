<?php

$route = new \System\Route();

$route->get('/test/get', 'App\Controllers\HomeController@index');

$route->post('/test/post', function(Request $request) {
    var_dump(234);
});

$GLOBALS['route'] = $route;