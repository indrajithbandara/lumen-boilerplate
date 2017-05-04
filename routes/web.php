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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/hello/{name}', function($name) use ($app) {
    return "Hello {$name}";
});

$app->group(['prefix' => 'books/'], function ($app) {
    $app->get('/','BooksController@index'); //get all the routes
    $app->post('/','BooksController@store'); //store single route
    $app->get('/{id}', 'BooksController@show'); //get single route
    $app->put('/{id}','BooksController@update'); //update single route
    $app->delete('/{id}','BooksController@destroy'); //delete single route
});

