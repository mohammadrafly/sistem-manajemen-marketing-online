<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $model = new User();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $model->where([
            'username' => $username
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username'  => $dataUser['username'],
                    'password'  => $dataUser['password'],
                    'email'     => $dataUser['email'],
                    'phone'     => $dataUser['phone'],
                    'name'      => $dataUser['name'],
                    'role'      => $dataUser['role'],
                    'created'   => $dataUser['created'],
                    'id'        => $dataUser['id'],
                    'profile'   => $dataUser['profile'],
                    'gender'    => $dataUser['gender'],
                    'teams'     => $dataUser['teams'],
                    'WesLogin'  => TRUE,
                ]);
                return redirect()->to(base_url('dashboard'));
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ada di database!');
                return redirect()->to('/');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function store()
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
            're_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password Harus diisi',
                    'matches' => 'Konfirmasi password harus sama',
                ]
            ],
            'email' => [
                'rules' => 'is_unique[users.email]',
                'errors' => [
                    'is_unique' => 'Email sudah digunakan sebelumnya',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User();
        $model->insert([
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'role' => 'Unset',
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ]);
        session()->setFlashData('success','Berhasil register, silahkan login!');
        return redirect()->to('register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
