<?php

use System\Request;

$route = new \System\Route();

$route->get('/', 'App\Controllers\HomeController@index');

$route->get('/test/get', 'App\Controllers\HomeController@index');

$route->get('/test/test', 'App\Controllers\HomeController@test');

$route->post('/test/post', function(Request $request) {
    var_dump(234);
});

return [
    'maps' => $route->maps()
];