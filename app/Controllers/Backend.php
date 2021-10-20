<?php

namespace App\Controllers;

use App\Models\M_petugas;
use App\Models\M_frontend;
use App\Models\M_buku;
use App\Models\M_pinjam;


class Backend extends BaseController
{
    public function dashboard()
    {
        $pinjam = new M_pinjam;
        $petugas = new M_petugas;
        $anggota = new M_frontend;
        $buku = new M_buku;
        $data['title'] = 'Dashboard';
        $data['j_buku'] = $buku->countAll();
        $data['j_pinjam'] = $buku->countAll();
        $data['j_petugas'] = $petugas->countAll('status', 'Aktif');
        $data['j_anggota'] = $anggota->countAll('status', 'Aktif');
        $data['anggota_baru'] = $anggota->where('status', 'Nonaktif')->findAll();
        return view('backend/dashboard', $data);
    }

    public function dataPetugas()
    {
        $model = new M_petugas();
        $data['title'] = 'Data Petugas';
        $data['petugas'] = $model->where('level', 'Petugas')->orderBy('id', 'DESC')->findAll();

        return view('backend/data-petugas', $data);
    }

    public function tambahPetugas()
    {
        $data=[
            'validate'=> \Config\Services::validation(),
        ];
        $data['title'] = 'Tambah Petugas';
        return view('backend/tambah-petugas', $data);
    }

    public function dataAnggota()
    {
        $model = new M_frontend;
        $data['title'] = 'Data Anggota';
        $data['anggota'] = $model->orderBy('id', 'DESC')->findAll();
        return view('backend/data-anggota', $data);
    }

    public function dataBuku()
    {
        $model = new M_buku;
        $data['title'] = 'Data Buku';
        $data['databuku'] = $model->findAll();
        return view('backend/data-buku', $data);
    }

    public function tambahBuku()
    {
        $data=[
            'validate'=> \Config\Services::validation(),
        ];
        $data['title'] = 'Tambah Buku';
        return view('backend/tambah-buku', $data);
    }

    public function editBuku($id = null)
    {
        $model =  new M_buku;
        $data=[
            'validate'=> \Config\Services::validation(),
        ];
        $data['buku'] = $model->where('id_buku', $id)->first();
        $data['title'] = 'Edit Buku';
        return view('backend/edit-buku', $data);
    }

    public function dataPinjaman(){
        $modelpinjam = new M_pinjam;
        

        $data=[
            'pinjaman' => $modelpinjam->findAll(),
            'title' => 'Data Pinjaman',
        ];
        return view('backend/data-pinjaman', $data);
    }


}
