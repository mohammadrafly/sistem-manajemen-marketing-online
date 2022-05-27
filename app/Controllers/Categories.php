<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\User;

class Categories extends BaseController
{
    public function index()
    {
        $model = new Category();
        $data = [
            'content' => $model->getCategories()->getResult(),
            'pages' => 'Manage Category',
            'IniDashboard' => FALSE
        ];
        //dd($data);
        return view('category/index', $data);
    }

    public function add()
    {
        $data = [
            'id' => session()->get('id'),
            'pages' => 'Add Category',
            'IniDashboard' => FALSE,
        ];
        //dd($data);
        return view('category/add', $data);
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
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Category();
        $model->insert([
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'author' => $this->request->getVar('author'),
        ]);
        session()->setFlashData('success','Berhasil menambah category');
        return redirect()->to('dashboard/category');
    }

    public function edit($id = null)
    {
        $model = new Category();
        $data = [
            'id' => session()->get('id'),
            'content' => $model->where('id_cat', $id)->first(),
            'pages' => 'Edit Category',
            'IniDashboard' => FALSE,
        ];
        return view('category/edit', $data);
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
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Category();
        $id = $this->request->getVar('id_cat');
        $data = [
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
        ];
        $model->update($id, $data);
        session()->setFlashData('success','Berhasil update category');
        return redirect()->to('dashboard/category');
    }

    public function delete($id = null)
    {
        $model = new Category();
        $model->where('id_cat', $id)->delete($id);
        session()->setFlashData('success', 'Category berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/category'));
    }
}
