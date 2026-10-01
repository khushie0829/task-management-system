<?php

namespace App\Middlewares;

use App\core\Classes\Auth as ClassesAuth;

class Guest
{
    public static function middleware()
    {

        $auth = ClassesAuth::isValidateUser();
        if ($auth) {
            return redirectTo(routeTo('dashboard'));
            exit;
        }
        return;
    }
}
