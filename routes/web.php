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

Route::get('/project/{id}', 'ProjectController@show');
Route::get('/project/{id}/question/new', 'QuestionController@create');

Route::get('/question/{id}', 'QuestionController@show');
Route::get('/question/{id}/idea/new', 'IdeaController@create');

Route::get('/idea/{id}', 'IdeaController@show');

Route::get('/{team_slug}/projects', [
    'as' => 'teamDashboard',
    'uses' => 'TeamController@show'
]);
