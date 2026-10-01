<?php
define('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('PUBLIC_PATH', FCPATH);
define('CONTROLLER_PATH', BASE_PATH . 'Controllers' . DIRECTORY_SEPARATOR);
define('CORE_PATH', BASE_PATH . 'core' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', BASE_PATH . 'views' . DIRECTORY_SEPARATOR);
define('ROUTE_PATH', BASE_PATH . 'routes' . DIRECTORY_SEPARATOR);
define('CONFIG_PATH', BASE_PATH . 'config' . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', BASE_PATH . 'storage' . DIRECTORY_SEPARATOR);
define('LOGS_PATH', STORAGE_PATH . 'logs' . DIRECTORY_SEPARATOR);
define('INIT', true);

require_once CORE_PATH . 'preload.php';
require_once CORE_PATH . 'functions.php';
require_once CORE_PATH . 'Router.php';