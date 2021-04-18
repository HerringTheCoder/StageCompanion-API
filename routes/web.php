<?php

$router->get('/', function () use ($router) {
    return $router->app->version() . "-" . "StageCompanionAPI v1.0";
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
        $router->put('update', ['uses' => 'UserController@update']);
    }
);

$router->group(
    [
        'middleware' => 'jwt.auth',
        'prefix' => 'bands'
    ],
    function () use ($router) {
        $router->get('/', ['uses' => 'BandController@index']);
        $router->get('/{id}', ['uses' => 'BandController@show']);
        $router->get('/filter/owned', ['uses' => 'BandController@showOwned']);
        $router->get('/filter/membership', ['uses' => 'BandController@showMembership']);
        $router->post('/', ['uses' => 'BandController@store']);
        $router->delete('/{bandId}', ['uses' => 'BandController@delete']);
        $router->put('/', ['uses' => 'BandController@update']);
        $router->get('/{bandId}/leave/{userId}', ['uses' => 'BandController@leave']);
    }
);

$router->group(
    [
        'middleware' => 'jwt.auth',
        'prefix' => 'files'
    ],
    function () use ($router) {
        $router->get('/', ['uses' => 'FileController@index']);
        $router->get('/download/{id}', ['uses' => 'FileController@show']);
        $router->get('/folder/{id}', ['uses' => 'FileController@showByFolderId']);
        $router->get('/owned', ['uses' => 'FileController@showOwned']);
        $router->post('/', ['uses' => 'FileController@store']);
        $router->delete('/{id}', ['uses' => 'FileController@delete']);
        $router->delete('/admin/all', ['uses' => 'FileController@deleteAll']);
        $router->post('/bandFile', ['uses' => 'FileController@storeBandFile']);
    }
);
$router->group(
    [
        'middleware' => 'jwt.auth',
        'prefix' => 'invitations'
    ],
    function () use ($router){
        $router->get('/', ['uses' => 'InvitationController@index']);
        $router->delete('/{id}', ['uses' => 'InvitationController@delete']);
        $router->post('/', ['uses' => 'InvitationController@invite']);
        $router->post('/accept',['uses'=>'InvitationController@accept']);
    }
);

$router->group(
    [
        'middleware' => 'jwt.auth',
        'prefix' => "folders"
    ],
    function () use ($router) {
        $router->get('/', ['uses' => 'FolderController@index']);
        $router->get('/{id}', ['uses' => 'FolderController@show']);
        $router->post('/', ['uses' => 'FolderController@store']);
        $router->put('/', ['uses' => 'FolderController@update']);
        $router->delete('/{id}', ['uses' => 'FolderController@delete']);
    }
);
