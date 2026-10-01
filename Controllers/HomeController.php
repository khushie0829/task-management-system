<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $data['title']      = 'Welcome to the Home Page';
        $data['appName']    = config('App')->get('app_name', 'My Application');
        $data['appEnv']     = config('App')->get('app_env', 'development');
        $data['appDebug']   = config('App')->get('app_debug', false);
        $data['appUrl']     = config('App')->get('app_url', 'http://localhost');
        $data['baseUrl']    = config('App')->get('base_url', '/');

        return view('home', $data);
    }
}
