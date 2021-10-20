<?php namespace App\Models;

use CodeIgniter\Model;

class M_token extends Model{
    protected $table      = 'user_token';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'email', 'token', 'date_created'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}