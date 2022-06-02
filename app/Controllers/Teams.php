<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Team;
use App\Models\User;
use App\Models\ListTeam;

class Teams extends BaseController
{
    public function index()
    {
        $model = new Team();
        $data = [
            'content' => $model->getTeam()->getResult(),
            'pages' => 'Manage Teams',
            'IniDashboard' => FALSE
        ];
        //dd($data);
        return view('team/index', $data);
    }

    public function addAnggota($id)
    {
        $users = new User();
        $data = [
            'users' => $users->findAll(),
            'id' => $id,
            'pages' => 'Tambah Anggota',
            'IniDashboard' => FALSE
        ];
        return view('team/team', $data);
    }

    public function addAnggotaProced()
    {
        $model = new ListTeam();
        $user = new User();
        $id = $this->request->getVar('id_user');
        $teams = $this->request->getVar('id_teams');
        $data = [
            'id_teams' => $teams,
            'id_user' => $id,
        ];
        $dataUser = [
            'teams' => $teams
        ];
        if ($model->insert($data)) {
            $user->update($id,$dataUser);
            session()->setFlashData('success','Berhasil menambah anggota');
            return redirect()->to('dashboard/teams');
        }
    }

    public function listTeam($id)
    {
        $model = new ListTeam();
        $team = new Team();
        $data = [
            'IniDashboard' => FALSE,
            'team' => $team->where('id', $id)->first(),
            'pages' => 'List Anggota',
            'content' => $model->getListTeamByID($id)->getResult(),
        ];
        return view('team/list_team', $data);
    }

    public function error()
    {
        $data = [
            'pages' => 'Error',
            'IniDashboard' => FALSE
        ];
        return view('team/error', $data);
    }

    public function indexPersonal($id)
    {
        $model = new ListTeam();
        $team = new Team();
        $data = [
            'content' => $model->getListTeamByID($id)->getResult(),
            'team' => $team->where('id', $id)->first(),
            'pages' => 'Your Team',
            'IniDashboard' => FALSE
        ];
        //dd($data);
        return view('team/indexpersonal', $data);
    }

    public function add()
    {
        $users = new User();
        $data = [
            'users' => $users->findAll(),
            'pages' => 'Add Teams',
            'IniDashboard' => FALSE,
        ];
        //dd($data);
        return view('team/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'leader' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Team();
        $user = new User();
        $id = $this->request->getVar('leader');
        $data = [
            'title' => $this->request->getVar('title'),
            'leader' => $id,
        ];
        $dataUser = [
            'teams' => $id
        ];
        if ($model->insert($data)) {
            $user->update($id,$dataUser);
            session()->setFlashData('success','Berhasil menambah anggota');
            return redirect()->to('dashboard/teams');
        }
        session()->setFlashData('success','Berhasil menambah teams');
        return redirect()->to('dashboard/teams');
    }

    public function edit($id = null)
    {
        $model = new Team();
        $users = new User();
        $data = [
            'content' => $model->getTeamByID($id)->getResult(),
            'users' => $users->findAll(),
            'pages' => 'Edit Teams',
            'IniDashboard' => FALSE,
        ];
        //dd($data);
        return view('team/edit', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'leader' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Team();
        $id = $this->request->getVar('id_cat');
        $data = [
            'title' => $this->request->getVar('title'),
            'leader' => $this->request->getVar('leader'),
        ];
        $model->update($id, $data);
        session()->setFlashData('success','Berhasil update teams');
        return redirect()->to('dashboard/teams');
    }

    public function delete($id = null)
    {
        $model = new Team();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'teams berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/teams'));
    }
}
