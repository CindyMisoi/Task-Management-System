<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
// get all tasks
$router->get('/tasks', 'TaskController@index');
// get a specific task
$router->get('/tasks/{id}', 'TaskController@show');
// update a task
$router->patch('/tasks/{id}', 'TaskController@update');
// delete a task
$router->delete('/tasks/{id}', 'TaskController@destroy');


