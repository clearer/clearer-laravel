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

// PROJECT ROUTES

Route::resource('projects', 'ProjectController')->only([
    'index',
    'show',
    'store',
    'edit',
    'update',
    'create'
]);

// QUESTION ROUTES

Route::resource('questions', 'QuestionController')->only([
    'show',
    'store',
    'edit',
    'update'
]);

// IDEAS ROUTES

Route::resource('ideas', 'IdeaController')->only([
    'create',
    'show',
    'edit',
    'update',
    'store'
]);

// COMMENT ROUTES

Route::resource('comments', 'CommentController')->only([
    'create',
    'store'
]);

// VOTE ROUTES

Route::resource('votes', 'VoteController')->only([
    'store',
    'destroy'
]);