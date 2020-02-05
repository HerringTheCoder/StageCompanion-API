<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('auth/login', ['uses' => 'AuthController@authenticate']);
$router->post('auth/register', ['uses' => 'AuthController@register']);

$router->group(
    [
        'middleware' => 'jwt.auth',
        'prefix' => 'users'
    ],
    function () use ($router) {
        $router->get('/', ['uses' => 'UserController@index']);
        $router->get('profile', ['uses' => 'UserController@profile']);
        $router->post('update', ['uses' => 'UserController@update']);
    }
);

$router->group(
    [
        'middleware' => 'jwt.auth',
        'prefix' => 'bands'
    ],
    function () use ($router) {
        $router->get('/', ['uses' => 'BandController@index']);
        $router->post('store', ['uses'=>'BandController@store']);
        $router->post('invite', ['uses'=>'InvitationController@invite']);
    }
);
