<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Profile extends BaseController
{
    public function index($id = null)
    {
        $model = new User();
        $data = [
            'content'   => $model->where('email', $id)->first(),
            'pages'     => 'My Profile',
            'IniDashboard' => FALSE
        ];
        return view('profile/index', $data);
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
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => '{field} bukan email!',
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
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
        ];
        $model->update($id, $data);
        session()->setFlashData('success','Profile telah diupdate! silahkan relog untuk sync ulang!');
        return $this->response->redirect(site_url('dashboard/profile/u/'.$data['email']));
    }
}
