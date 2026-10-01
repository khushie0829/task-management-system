<?php

namespace App\Controllers;

class TeamController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard', $data);
    }
}
