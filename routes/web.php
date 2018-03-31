<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/project/{project}', [ 
    'as' => 'project',
    'uses' => 'ProjectController@show'
]);
Route::get('/project/{project}/question/create', 'QuestionController@create');
Route::post('/project/{project}/question', 'QuestionController@store');


Route::get('/question/{question}', [
    'as' => 'question',
    'uses' => 'QuestionController@show'
]);
Route::get('/question/{question}/idea/create', 'IdeaController@create');


Route::get('/idea/{idea}', 'IdeaController@show');
Route::post('/question/{question}/idea', 'IdeaController@store');

Route::get('/{team_slug}/projects', [
    'as' => 'teamDashboard',
    'uses' => 'TeamController@show'
]);
