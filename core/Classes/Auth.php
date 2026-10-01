<?php

namespace App\core\Classes;

class Auth
{
    protected static $user = null;
    public static function user()
    {
        return (object) self::$user;
    }
    public static function isLogin()
    {
        return self::$user !== null;
    }
    public static function attempLogin($credentials)
    {
        $credentials = (object) $credentials;
        $curlResponse = CurlHelper::post("user/login", (array) $credentials);
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && !empty($response->data->token) && $response->message === "Login successful") {
            $_SESSION['token'] = $response->data->token;
            self::$user = new \stdClass();
            self::$user->id     = $response->data->id;
            self::$user->name   = $response->data->name;
            self::$user->email  = $response->data->email;
            // self::$user->role   = "Super Admin";
            self::$user->role   = "";
            self::$user->roles  = ["add_admin", "edit_admin", "update_admin", "view_admin", "delete_admin"];
            return new self();
        } else return false;
    }
    // public static function attempLogin($credentials)
    // {
    //     $credentials = (object) $credentials;
    //     if ($credentials->email == "harsh@mail.adsplay.in" && $credentials->password == "password") {
    //         $_SESSION['token'] = "jfklsjfiegjioajgaojmflskjfoaeirhnaeljfglsingoiaegjnaeignalsgmas";
    //         self::$user = new \stdClass();
    //         self::$user->name   = "Harsh Solanki";
    //         self::$user->email  = "harsh@mail.adsplay.in";
    //         self::$user->role   = "Super Admin";
    //         self::$user->roles  = ["add_admin", "edit_admin", "update_admin", "view_admin", "delete_admin"];
    //         return new self();
    //     } else return false;
    // }

    public static function isValidateUser()
    {
        if (empty($_SESSION['token'])) return false;
        $curlResponse = CurlHelper::post("user/validate-token");
        $response = CurlHelper::asObject($curlResponse);
        if ($response && $response->status === "success" && $response->message === "Token is valid") {
            self::$user = new \stdClass();
            self::$user->id     = $response->data->id;
            self::$user->name   = $response->data->name;
            self::$user->email  = $response->data->email;
            // self::$user->role   = "Super Admin";
            self::$user->role   = "";
            self::$user->roles  = ["add_admin", "edit_admin", "update_admin", "view_admin", "delete_admin"];
            return new self();
        } else return false;
    }

    // public static function isValidateUser()
    // {
    //     if (empty($_SESSION['token'])) return false;
    //     $token = "jfklsjfiegjioajgaojmflskjfoaeirhnaeljfglsingoiaegjnaeignalsgmas";
    //     if ($_SESSION['token'] === $token) {
    //         self::$user = new \stdClass();
    //         self::$user->name   = "Harsh Solanki";
    //         self::$user->email  = "harsh@mail.adsplay.in";
    //         self::$user->role   = "Super Admin";
    //         self::$user->roles  = ["add_admin", "edit_admin", "update_admin", "view_admin", "delete_admin"];
    //         return new self();
    //     } else return false;
    // }

    public static function logout()
    {
        if (isset($_SESSION['token']))  CurlHelper::post("user/logout");

        self::$user = null;
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
    }
}
