<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\Category;

class Posts extends BaseController
{
    public function index()
    {
        $model = new Post();
        $data = [
            'content' => $model->getPost()->getResult(),
            'pages' => 'Manage Post',
            'IniDashboard' => FALSE
        ];
        //dd($data);
        return view('post/index', $data);
    }

    public function add()
    {
        $cats = new Category();
        $data = [
            'id' => session()->get('id'),
            'category' => $cats->findAll(),
            'pages' => 'Add Post',
            'IniDashboard' => FALSE,
        ];
        //dd($data);
        return view('post/add', $data);
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
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'meta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'tag' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'categories' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'picture' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Post();
        $model->insert([
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'author' => $this->request->getVar('author'),
            'meta' => $this->request->getVar('meta'),
            'tag' => $this->request->getVar('tag'),
            'categories' => $this->request->getVar('categories'),
            'picture' => $this->request->getVar('picture'),
        ]);
        session()->setFlashData('success','Berhasil menambah post');
        return redirect()->to('dashboard/posts');
    }

    public function edit($id = null)
    {
        $model = new Post();
        $cats = new Category();
        $parser = \Config\Services::parser();
        $data = [
            'id' => session()->get('id'),
            'category' => $cats->findAll(),
            'content' => $model->getPostByID($id)->getResult(),
            'pages' => 'Edit Post',
            'IniDashboard' => FALSE,
        ];
        //echo "<pre>";
        //print_r($data);
        //dd($data);
        //echo $parser->setData($data)
        //          ->render('post/edit');
        return view('post/edit', $data);
        //var_dump($data);
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
            'meta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'tag' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'categories' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Post();
        $id = $this->request->getVar('id_post');
        $data = [
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'meta' => $this->request->getVar('meta'),
            'tag' => $this->request->getVar('tag'),
            'categories' => $this->request->getVar('categories'),
            'picture' => $this->request->getVar('picture'),
        ];
        $model->update($id, $data);
        session()->setFlashData('success','Berhasil update post');
        return redirect()->to('dashboard/posts');
    }

    public function delete($id = null)
    {
        $model = new Post();
        $model->where('id_post', $id)->delete($id);
        session()->setFlashData('success', 'Post berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/posts'));
    }
}
