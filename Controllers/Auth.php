<?php

namespace App\Controllers;

use App\core\Classes\Auth as ClassesAuth;
use App\core\Classes\Validator;

class Auth extends BaseController
{
    public function viewlogin()
    {
        $data['title'] = 'User Login';
        return view('auth/user/login', $data);
    }

    public function doLogin()
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ];

        if (!Validator::make($this->sanitizedPost, $rules)) {
            $data['errors'] = Validator::errors();
            $data['old'] = $this->sanitizedPost;
            return redirectBack($data);
        }

        if (ClassesAuth::attempLogin($this->sanitizedPost)) return redirectTo(routeTo("dashboard"),['success' => "Successfully Logged In"]);
        else return redirectBack(['failed' => "Invalid Login Credentials"]);
    }

    public function logout()
    {
        ClassesAuth::logout();
        return redirectTo("/");
    }
}
