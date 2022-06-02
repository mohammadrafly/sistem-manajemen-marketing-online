<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Users extends BaseController
{
    public function index()
    {
        $model = new User();
        $data = [
            'content' => $model->GetUserWithoutSU()->getResult(),
            'pages' => 'Manage User',
            'IniDashboard' => FALSE,
        ];
        //dd($data);
        return view('user/index', $data);
    }

    public function add()
    {
        $data = [
            'pages' => 'Add User',
            'IniDashboard' => FALSE,
        ];
        return view('user/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[4]|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 255 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[35]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 35 Karakter',
                ]
            ],
            're-password' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => '{field} harus sama',
                ]
            ],
            'email' => [
                'rules' => 'is_unique[users.email]',
                'errors' => [
                    'is_unique' => 'Email sudah digunakan sebelumnya',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 11 Karakter',
                    'max_length' => '{field} Maksimal 13 Karakter',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'error' => [
                    'required' => 'Role harus diisi',
                ],
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User();
        $model->insert([
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'phone'   => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ]);
        session()->setFlashData('success','Berhasil menambah user');
        return redirect()->to('dashboard/users');
    }

    public function edit($id = null)
    {
        $model = new User();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Edit User',
            'IniDashboard' => FALSE,
        ];
        return view('user/edit', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
        
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 11 Karakter',
                    'max_length' => '{field} Maksimal 13 Karakter',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'error' => [
                    'required' => 'Role harus diisi',
                ],
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'phone'   => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
        ];
        $model->update($id, $data);
        session()->setFlashData('success','Berhasil update user');
        return redirect()->to('dashboard/users');
    }

    public function delete($id = null)
    {
        $model = new User();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'User berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/users'));
    }
}
