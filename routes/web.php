<?php

use App\core\Classes\Route;

Route::middleware(["Guest"], function () {
    Route::get('/login', 'Auth@viewlogin', 'login');
    Route::post('/login', 'Auth@doLogin');
});
Route::middleware(["Auth"], function () {
    Route::get('/logout', 'Auth@logout', 'logout');
    Route::get('/', 'Dashboard@index', 'dashboard');

    Route::get('/tasks', 'TaskController@index', 'user.tasks');
    Route::get('/tasks/add', 'TaskController@create', 'user.tasks.add');
    Route::post('/tasks/add', 'TaskController@store', 'user.tasks.add.post');
    Route::get('/tasks/edit/{id}', 'TaskController@edit', 'user.tasks.edit');
    Route::post('/tasks/edit/{id}', 'TaskController@update', 'user.tasks.edit.post');

    Route::get('/teams', 'TeamController@index', 'user.teams');

    Route::get('/users', 'UserController@index', 'user.users');
    Route::get('/users/add', 'UserController@create', 'user.users.add');
    Route::post('/users/add', 'UserController@store', 'user.users.add.post');
    Route::get('/users/edit/{id}', 'UserController@edit', 'user.users.edit');
    Route::post('/users/edit/{id}', 'UserController@update', 'user.users.edit.post');

    Route::get('/users-designation', 'UserController@index', 'user.users-designation');
    Route::get('/users-designation/add', 'UserController@create', 'user.users-designation.add');
    Route::post('/users-designation/add', 'UserController@store', 'user.users-designation.add.post');

    Route::get('/reports', 'ReportController@index', 'user.reports');
    Route::get('/settings', 'SettingsController@index', 'user.settings');
});

// Route::middleware(['Auth'])->get('/', 'Dashboard@index', 'dashboard');

// Route::get('/', 'Dashboard@index', 'dashboard');
Route::get('/blog/{id}', 'BlogController@show', 'blog.show');
Route::get('/about', function () {
    echo "This is the about page.";
}, 'about');

Route::prefix('/admin', function () {
    Route::get('/atms-login', 'HomeController@index', 'home');
    Route::get('/dashboard', function () {
        echo "This is the admin dashboard.";
        echo " <a href='" . routeTo('admin.settings') . "'>Settings</a>";
    }, 'admin.dashboard');

    Route::get('/settings', function () {
        echo "This is the admin settings page.";
    }, 'admin.settings');

    Route::get('/settings/{id}/{action}', function ($id, $action) {
        echo "This is the admin settings page for ID: " . htmlspecialchars($id) . " and action: " . htmlspecialchars($action);
    }, 'admin.settingTwo');
});
