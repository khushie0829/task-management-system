<?php
use App\core\Classes\Route;

require_once ROUTE_PATH . 'web.php';

Route::setPrefix('/api');
Route::setAsAPI(true);
require_once ROUTE_PATH . 'api.php';
Route::setAsAPI(false);

Route::dispatch();