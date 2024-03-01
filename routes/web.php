<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/*$router->post('login', 'AuthController@login');

$router->get('users', ['middleware' => 'auth', 'users' => 'UsersController@index']);
$router->get('users/{id}', ['middleware' => 'auth', 'users' => 'UsersController@show']);
$router->post('users', ['middleware' => 'auth', 'users' => 'UsersController@store']);
$router->put('users/{id}', ['middleware' => 'auth', 'users' => 'UsersController@update']);
$router->delete('users/{id}', ['middleware' => 'auth', 'users' => 'UsersController@destroy']);

$router->get('sensors', 'SensorsController@index');
$router->get('sensors/{id}', 'SensorsController@show');
$router->post('sensors', 'SensorsController@store');
$router->put('sensors/{id}', 'SensorsController@update');
$router->delete('sensors/{id}', 'SensorsController@destroy');

$router->get('actuators', 'ActuatorsController@index');
$router->get('actuators/{id}', 'ActuatorsController@show');
$router->post('actuators', 'ActuatorsController@store');
$router->put('actuators/{id}', 'ActuatorsController@update');
$router->delete('actuators/{id}', 'ActuatorsController@destroy');*/

$router->post('login','AuthController@login');


function recurso($router, $url, $modelo): void
{
    $router->get("$url",$modelo."Controller@index");
    $router->get("$url/{id}",$modelo."Controller@show");
    $router->post("$url",$modelo."Controller@store");
    $router->put("$url/{id}",$modelo."Controller@update");
    $router->delete("$url/{id}",$modelo."Controller@destroy");
}

$router->group(['middleware' => 'auth'], function () use ($router) {
    recurso($router, 'users', 'Users');
    recurso($router, 'sensors', 'Sensors');
    recurso($router, 'actuators', 'Actuators');
});
