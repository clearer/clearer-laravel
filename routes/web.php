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

Route::get('/', [
    'as'    => 'welcome.show',
    'uses'  => 'WelcomeController@show'
]);

Route::get('/home', [
    'as'    => 'home.show',
    'uses'  => 'HomeController@show'
]);

Route::get('/project/create', [
    'as'    => 'project.create',
    'uses'  => 'ProjectController@create'
]);

Route::get('/project/{project}', [ 
    'as' => 'project.show',
    'uses' => 'ProjectController@show'
]);

Route::get('/project/{project}/question/create', [
    'as'    => 'question.create',
    'uses'  => 'QuestionController@create'
]);

Route::post('/project/{project}/question', [
    'as'    => 'question.store',
    'uses'  => 'QuestionController@store'
]);

Route::post('/project', [
    'as'    => 'project.store',
    'uses'  => 'ProjectController@store'
]);

Route::get('/question/{question}', [
    'as'    => 'question.show',
    'uses'  => 'QuestionController@show'
]);

Route::get('/question/{question}/idea/create', [
    'as'    => 'idea.create',
    'uses'  => 'IdeaController@create'
]);

Route::get('/idea/{idea}', [
    'as'    => 'idea.show',
    'uses'  => 'IdeaController@show'
]);

Route::get('/idea/{idea}/comment/create', [
    'as'    => 'comment.create',
    'uses'  => 'CommentController@create'
]);

Route::post('/idea/{idea}/comment', [
    'as'    => 'comment.store',
    'uses'  => 'CommentController@store'
]);

Route::post('/question/{question}/idea', [
    'as'    => 'idea.store',
    'uses'  => 'IdeaController@store'
]);

Route::get('/{team_slug}/projects', [
    'as' => 'project.index',
    'uses' => 'TeamController@show'
]);
