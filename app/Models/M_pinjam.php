<?php namespace App\Models;

use CodeIgniter\Model;

class M_pinjam extends Model{
    protected $table      = 'tb_pinjam';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'id',	
                                'nama_peminjam',
                                'email',
                                'kelas',	
                                'judul_buku',	
                                'gambar_buku',
                                'tgl_pinjam',
                                'tgl_kembali',
                                'tanggal_dibuat',
                            ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


}