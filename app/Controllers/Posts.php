<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\Category;
use CodeIgniter\I18n\Time;

class Posts extends BaseController
{
    public function index()
    {
        helper('text');
        $model = new Post();
        $data = [
            'content' => $model->getPost()->getResult(),
            'pages' => 'Data Iklan',
            'IniDashboard' => FALSE,
            'date' => Time::now('Asia/Jakarta'),
        ];
        //dd($data);
        return view('post/index', $data);
    }

    public function indexPersonal($id)
    {
        helper('text');
        $model = new Post();
        $data = [
            'content' => $model->getPostByAuthor($id)->getResult(),
            'pages' => 'Data Iklan',
            'IniDashboard' => FALSE,
            'date' => Time::now('Asia/Jakarta'),
        ];
        //dd($data);
        return view('post/indexpersonal', $data);
    }

    public function preview($id)
    {
        $model = new Post();
        $data = [
            'pages' => 'Preview Iklan',
            'IniDashboard' => FALSE,
            'content' => $model->getPostByID($id)->getResult(),
        ];
        return view('post/preview', $data);
    }

    public function add()
    {
        $cats = new Category();
        $data = [
            'id' => session()->get('id'),
            'category' => $cats->findAll(),
            'pages' => 'Tambah Iklan',
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
            'expired' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'picture' => [
                'rules' => 'mime_in[picture,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('picture');
        $randName = $img->getRandomName();

        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('picture',$randName);
            $model = new Post();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'author' => $this->request->getVar('author'),
                'meta' => $this->request->getVar('meta'),
                'tag' => $this->request->getVar('tag'),
                'categories' => $this->request->getVar('categories'),
                'expired' => $this->request->getVar('expired'),
                'picture' => $randName,
            ];
            $model->insert($data);
            
            if (session()->get('role') === 'Employee') {
                session()->setFlashData('success','Berhasil update post');
                return redirect()->to('dashboard/posts/my/'.session()->get('id'));
            } else {
                session()->setFlashData('success','Berhasil update post');
                return redirect()->to('dashboard/posts');
            }
            
        } else {
            $model = new Post();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'author' => $this->request->getVar('author'),
                'meta' => $this->request->getVar('meta'),
                'tag' => $this->request->getVar('tag'),
                'categories' => $this->request->getVar('categories'),
                'expired' => $this->request->getVar('expired'),
            ];
            $model->insert($data);
            
            if (session()->get('role') === 'Employee') {
                session()->setFlashData('success','Berhasil update post');
                return redirect()->to('dashboard/posts/my/'.session()->get('id'));
            } else {
                session()->setFlashData('success','Berhasil update post');
                return redirect()->to('dashboard/posts');
            }
        }
    }

    public function edit($id)
    {
        $model = new Post();
        $cats = new Category();
        $parser = \Config\Services::parser();
        $data = [
            'id' => session()->get('id'),
            'category' => $cats->findAll(),
            'content' => $model->getPostByID($id)->getResult(),
            'pages' => 'Edit Iklan',
            'IniDashboard' => FALSE,
        ];
        //echo "<pre>";
        //print_r($data);
        //($data);
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
            'picture' => [
                'rules' => 'mime_in[picture,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('picture');
        $randName = $img->getRandomName();
        $id = $this->request->getVar('id_post');

        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('picture',$randName);
            $model = new Post();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'meta' => $this->request->getVar('meta'),
                'tag' => $this->request->getVar('tag'),
                'categories' => $this->request->getVar('categories'),
                'picture' => $randName,
            ];
            $model->update($id,$data);
            session()->setFlashData('success','Berhasil update post');
            return redirect()->to('dashboard/posts');
        } else {
            $model = new Post();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'meta' => $this->request->getVar('meta'),
                'tag' => $this->request->getVar('tag'),
                'categories' => $this->request->getVar('categories'),
            ];
            $model->update($id,$data);
            session()->setFlashData('success','Berhasil update post');
            return redirect()->to('dashboard/posts');
        }
    }

    public function delete($id = null)
    {
        $model = new Post();
        $model->where('id_post', $id)->delete($id);
        session()->setFlashData('success', 'Post berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/posts'));
    }
}
