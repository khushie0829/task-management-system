<?php

namespace App\Controllers;

class SettingController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard', $data);
    }
}
