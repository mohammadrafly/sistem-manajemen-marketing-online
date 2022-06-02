<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class Dashboard extends BaseController
{
    public function index()
    {
        $post = new Post();
        $data = [
            'pages' => 'Dashboard',
            'IniDashboard' => TRUE,
            'employee' => $post->CountById(),
        ];
        return view('dashboard/index', $data);
    }
}
