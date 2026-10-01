<?php

namespace App\Middlewares;

use App\core\Classes\Auth as ClassesAuth;

class Auth
{
    public static function middleware()
    {

        $auth = ClassesAuth::isValidateUser();
        if (!$auth) {
            // http_response_code(401);
            // require_once VIEW_PATH . 'errors/401.php';
            // exit;
            ClassesAuth::logout();
            return redirect(routeTo('login'));
            exit;
        }
        return;
    }
}
