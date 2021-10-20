<?php namespace App\Models;

use CodeIgniter\Model;

class M_petugas extends Model{
    protected $table      = 'admin';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nama', 'username', 'password', 'level', 'status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}