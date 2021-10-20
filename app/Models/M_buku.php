<?php namespace App\Models;

use CodeIgniter\Model;

class M_buku extends Model{
    protected $table      = 'tb_buku';
    protected $primaryKey = 'id_buku';

    protected $allowedFields = [
                                'id_buku',	
                                'judul_buku',
                                'pengarang',
                                'tahun_terbit',	
                                'penerbit',	
                                'isbn',
                                'kategori',
                                'jumlah_buku',	
                                'gambar_buku',	
                                'deskripsi',
                            ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function kategoriBuku(){
        return $this->table('tb_user')->distinct('nama')->get();
    }

}