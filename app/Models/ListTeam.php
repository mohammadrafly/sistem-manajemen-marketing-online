<?php

namespace App\Models;

use CodeIgniter\Model;

class ListTeam extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'list_teams';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_teams',
        'id_user'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'join';
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
    
    public function getListTeamByID($id = null)
    {
        $builder = $this->db->table('list_teams')
                ->select('list_teams.*, users.name AS nama_anggota')
                ->join('teams', 'list_teams.id_teams = teams.id', 'left')
                ->join('users', 'list_teams.id_user = users.id', 'left')
                ->where('list_teams.id_teams', $id)
                ->get();
        return $builder;
    }
}
