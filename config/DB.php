<?php
if (!defined('INIT')) die('Direct access not allowed.');
return [
    'DEFAULT'   =>   [
        'port'      => getenv('DB_PORT') ?: 3306,
        'host'      => getenv('DB_HOST') ?: '127.0.0.1',
        'name'      => getenv('DB_NAME') ?: "atms",
        'user'      => getenv('DB_USER') ?: 'root',
        'password'  => getenv('DB_PASS') ?: '',
    ],
];
