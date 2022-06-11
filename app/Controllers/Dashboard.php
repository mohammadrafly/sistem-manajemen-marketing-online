<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\Category;
use App\Models\Team;
use App\Models\User;
use App\Models\ListTeam;

class Dashboard extends BaseController
{
    public function index()
    {
        $post = new Post();
        $user = new User();
        $team = new Team();
        $category = new Category();
        $data = [
            'pages' => 'Dashboard',
            'IniDashboard' => TRUE,
            'post' => $post->CountById(),
            'postAll' => $post->countAll(),
            'userAll' => $user->countAll(),
            'teamAll' => $team->countAll(),
            'categoryAll' => $category->countAll(),
        ];
        return view('dashboard/index', $data);
    }
}
