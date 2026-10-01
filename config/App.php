<?php
if(!defined('INIT')) die('Direct access not allowed.');
return [
    'app_name'      => getenv('APP_NAME') ?: 'My Application',
    'app_env'       => getenv('APP_ENV') ?: 'development',
    'app_debug'     => filter_var(getenv('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN),
    'app_url'       => getenv('APP_URL') ?: 'http://localhost',
    'base_url'      => getenv('BASE_URL') ?: 'http://localhost',
    'app_api_url'   => getenv('APP_API_URL') ?: 'http://localhost/api',
];
