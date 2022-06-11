<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'posts';
    protected $primaryKey       = 'id_post';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'author',
        'title',
        'content',
        'meta',
        'tag',
        'categories',
        'picture',
        'expired',
        'harga'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPost()
    {
        $builder = $this->db->table('posts')
                ->select('posts.*, category.title AS cat_name')
                ->select('posts.*, users.name AS user_name')
                ->join('category', 'posts.categories = category.id', 'left')
                ->join('users', 'posts.author = users.id', 'left')
                ->get();
        return $builder;
    }

    public function getPostByID($id = null)
    {
        $builder = $this->db->table('posts')
                ->select('posts.*, category.title AS cat_name')
                ->select('posts.*, users.name AS user_name')
                ->join('category', 'posts.categories = category.id', 'left')
                ->join('users', 'posts.author = users.id', 'left')
                ->where('posts.id_post', $id)
                ->get();
        return $builder;
    }

    public function getPostByAuthor($id = null)
    {
        $builder = $this->db->table('posts')
                ->select('posts.*, category.title AS cat_name')
                ->select('posts.*, users.name AS user_name')
                ->join('category', 'posts.categories = category.id', 'left')
                ->join('users', 'posts.author = users.id', 'left')
                ->where('posts.author', $id)
                ->get();
        return $builder;
    }

    function CountByID()
    {
        $query = $this->db->table('posts')
                ->where(['author'=>session()->get('id')])
                ->countAllResults();
        return $query;
    }
}
