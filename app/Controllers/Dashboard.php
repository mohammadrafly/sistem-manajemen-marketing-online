<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'pages' => 'Dashboard',
            'IniDashboard' => TRUE
        ];
        return view('dashboard/index', $data);
    }
}
