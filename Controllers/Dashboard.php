<?php

namespace App\Controllers;

use App\core\Classes\Auth;

class Dashboard
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard', $data);
    }
}
