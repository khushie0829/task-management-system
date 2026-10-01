<?php

namespace App\Controllers;

class Dashboard
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard', $data);
    }
}
