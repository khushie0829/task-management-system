<?php
use App\core\Classes\Route;
Route::get('/login', function (){
    echo "This is the login page.";
}, 'login');