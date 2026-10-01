<?php
date_default_timezone_set('Asia/Kolkata');
if (strpos($_SERVER['REQUEST_URI'], '/api/') === 0) {
    require_once '../api/index.php';
    exit;
}

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
require_once __DIR__ . '/../init.php';
