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

// WELCOME ROUTES

Route::get('/', [
    'as'    => 'welcome.show',
    'uses'  => 'WelcomeController@show'
]);

Route::get('/home', [
    'as'    => 'welcome.index',
    'uses'  => 'WelcomeController@index'
]);

// PROJECT ROUTES

Route::get('/{team_slug}/projects', [
    'as' => 'project.index',
    'uses' => 'ProjectController@index'
]);

Route::get('/project/{project}', [ 
    'as' => 'project.show',
    'uses' => 'ProjectController@show'
]);

Route::post('/project', [
    'as'    => 'project.store',
    'uses'  => 'ProjectController@store'
]);

Route::get('/project/{project}/edit', [
    'as'    => 'project.edit',
    'uses'  => 'ProjectController@edit'
]);

Route::put('/project/{project}', [
    'as'    => 'project.update',
    'uses'  => 'ProjectController@update'
]);



Route::post('/project/{project}/question', [
    'as'    => 'question.store',
    'uses'  => 'QuestionController@store'
]);

Route::get('/question/{question}', [
    'as'    => 'question.show',
    'uses'  => 'QuestionController@show'
]);

Route::get('/question/{question}/edit', [
    'as'    => 'question.edit',
    'uses'  => 'QuestionController@edit'
]);

Route::put('/question/{question}', [
    'as'    => 'question.update',
    'uses'  => 'QuestionController@update'
]);

Route::get('/question/{question}/idea/create', [
    'as'    => 'idea.create',
    'uses'  => 'IdeaController@create'
]);

Route::get('/idea/{idea}', [
    'as'    => 'idea.show',
    'uses'  => 'IdeaController@show'
]);

Route::get('/idea/{idea}/edit', [
    'as'    => 'idea.edit',
    'uses'  => 'IdeaController@edit'
]);

Route::put('/idea/{idea}', [
    'as'    => 'idea.update',
    'uses'  => 'IdeaController@update'
]);

Route::get('/idea/{idea}/comment/create', [
    'as'    => 'comment.create',
    'uses'  => 'CommentController@create'
]);

Route::post('/idea/{idea}/comment', [
    'as'    => 'comment.store',
    'uses'  => 'CommentController@store'
]);

Route::post('question/{question}/idea', [
    'as'    => 'idea.store',
    'uses'  => 'IdeaController@store'
]);

Route::post('/vote', [
    'as' => 'vote.store',
    'uses' => 'VoteController@store'
]);

Route::delete('/vote/{vote}', [
    'as' => 'vote.destroy',
    'uses' => 'VoteController@destroy'
]);