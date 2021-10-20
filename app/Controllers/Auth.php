<?php namespace App\Controllers;

use \App\Models\LoginModel;
use \App\Models\M_petugas;
use \App\Models\M_frontend;
use \App\Models\M_buku;
use App\Models\M_pinjam;

class Auth extends BaseController
{

    public function loginadmin()
    {
        $Model = new LoginModel;

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $row = $Model->where("username",$username)->first();

            if($row == NULL){
                session()->setFlashdata('pesanUsername','Username Tidak Ditemukan');
                return redirect()->to('login-admin');
            }

            if(password_verify($password, $row['password'])){
                $data = [
                'log' => TRUE,
                'username' => $row['username'],
                'level' => $row['level'],
                'status' => $row['status'],
                ];
                session()->set($data);
                session()->setFlashdata('login', 'succes');
                return redirect()->to("admin/dashboard");
            }

            session()->setFlashdata('pesanPassword','Password Salah');
            return redirect()->to('login-admin');

        return view('login-admin');
    }

    public function logoutAdmin()
    {
        session()->setFlashdata('warning', 'warning');
        session()->setFlashdata('title', 'Anda Belum Login');
        session()->setFlashdata('color', 'red');
        session()->setFlashdata('icon', 'warning');
        session()->destroy();
        return redirect()->to('login-admin');
    }

    public function tambahPetugas()
    {
        $pw1 = $this->request->getPost('password1');
        $pw2 = $this->request->getPost('password2');

        if($pw1 == $pw2){

         $val = $this->validate(
            [
                'nama' => [
                                'rules'=>'required',
                                'errors'=>[
                                    'required'=> 'Nama Belum diisi'
                                ]
                            ],
                'username' => [
                                'rules'=>'required|min_length[5]|max_length[12]|is_unique[admin.username]',
                                'errors'=>[
                                    'required'=> 'Username Belum Diisi',
                                    'min_length'=> 'Username Terlalu Pendek',
                                    'max_length'=> 'Username Terlalu Panjang',
                                    'is_unique'=> 'Username Sudah Dipakai'
                                ]
                            ],
                'password1' => [
                                'rules'=>'required|min_length[8]|max_length[12]',
                                'errors'=>[
                                    'required'=> 'Password Belum diisi',
                                    'min_length'=> 'Password Terlalu Pendek',
                                    'max_length'=> 'Password Terlalu Panjang',
                                ]
                            ],
                'password2' => [
                                'rules'=>'required',
                                'errors'=>[
                                    'required'=> 'Konfirmasi Password Belum diisi'
                                ]
                            ],
            ],
            );
        if(!$val){
            $pesanvalidasi = \Config\Services::validation();
            return redirect()->to('admin/tambah-petugas')->withInput()->with('validate', $pesanvalidasi);
        }
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password1'),PASSWORD_DEFAULT),
            'level' => 'Petugas',

        );

        $model = new M_petugas;
        $model->insert($data);
        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Data Berhasil Ditambahkan!');
        return redirect()->to('admin/data-petugas');

        }
        session()->setFlashdata('pesan', '<div class="alert alert-primary">Password Tidak Sama!</div>');
        return redirect()->to('admin/tambah-petugas');
    }

    public function hapusPetugas($id = null){
        $Model = new M_petugas();
        $data['user'] = $Model->where('id', $id)->delete($id);
        
        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Data Berhasil Dihapus');

        return redirect()->to('admin/data-petugas');
    }
    
    public function updatePetugas($id = null){

        $model = new M_petugas();
        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');
        
        $data = array(
            'status' => $this->request->getPost('status'),
        );
        

        $model->update($id, $data);


        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Data Berhasil Diedit!');
        return redirect()->to('admin/data-petugas');
    }
    
    public function hapusAnggota($id = null){
        $Model = new M_frontend();
        $data['user'] = $Model->where('id', $id)->delete($id);
        
        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Data Berhasil Dihapus');

        return redirect()->to('admin/data-anggota');
    }

     public function updateAnggota($id = null){

        $model = new M_frontend();
        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');
        
        $data = array(
            'status' => $this->request->getPost('status'),
        );
        

        $model->update($id, $data);


        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Data Berhasil Diedit!');
        return redirect()->to('admin/data-anggota');
    }

    public function tambahBuku(){
        $model = new M_buku();
        

            $val = $this->validate(
                [
                    'judul' => [
                                    'rules'=>'required',
                                    'errors'=>[
                                        'required'=> 'Judul belum diisi !'
                                    ]
                                ],
                    'gambar' => [
                                    'rules'=>'max_size[gambar,2024]|is_image[gambar]|mime_in[gambar,image/jpeg,image/jpg,image/png]',
                                    'errors'=>[
                                        'max-size' => 'File melebihi batas maksimal!',
                                        'is_image' => 'Yang anda pilih bukan gambar!',
                                        'mime_in' => 'Yang anda pilih bukan gambar!'
                                    ],
                                ],
                ],
        );

        if(!$val){
            return redirect()->to('admin/tambah-buku')->withInput();
        }

        $fileSampul = $this->request->getFile('gambar');

        if($fileSampul->getError() == 4 ){
            $namasampul = 'default.jpg';
        } else {
            $namasampul = $fileSampul->getRandomName();
            $fileSampul->move('gambar-sampul', $namasampul);
        }
        
        
        $data = array(
            'judul_buku' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'tahun_terbit' => $this->request->getPost('tahun_t'),
            'penerbit' => $this->request->getPost('penerbit'),
            'isbn' => $this->request->getPost('isbn'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah_buku' => $this->request->getPost('j_buku'),
            'gambar_buku' => $namasampul,
            'deskripsi' => $this->request->getPost('deskripsi'),
        );

    
        $model->insert($data);
        return redirect()->to('admin/data-buku');
    }

    public function hapusBuku($id = null){
        $Model = new M_buku;

        $gambar = $Model->find($id);
        
        if($gambar['gambar_buku'] != 'default.jpg'){
            unlink('gambar-sampul/'.$gambar['gambar_buku']);
        }

        $data['user'] = $Model->where('id_buku', $id)->delete($id);
        
        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Data Berhasil Dihapus');

        return redirect()->to('admin/data-buku');
    }

    public function editBuku($id){
        $model = new M_buku();
        
        $id = $this->request->getPost('id');

            $val = $this->validate(
                [
                    'judul' => [
                                    'rules'=>'required',
                                    'errors'=>[
                                        'required'=> 'Judul belum diisi !'
                                    ]
                                ],
                    'gambar' => [
                                    'rules'=>'max_size[gambar,2024]|is_image[gambar]|mime_in[gambar,image/jpeg,image/jpg,image/png]',
                                    'errors'=>[
                                        'max-size' => 'File melebihi batas maksimal!',
                                        'is_image' => 'Yang anda pilih bukan gambar!',
                                        'mime_in' => 'Yang anda pilih bukan gambar!'
                                    ],
                                ],
                ],
        );

        if(!$val){
            return redirect()->to('admin/tambah-buku')->withInput();
        }

        $fileSampul = $this->request->getFile('gambar');
        $glama = $this->request->getPost('fold');

        if($fileSampul->getError() == 4 ){
            $namasampul = $glama;
        } else {
            $namasampul = $fileSampul->getRandomName();
            $fileSampul->move('gambar-sampul', $namasampul);

            if($glama != 'default.jpg'){
                unlink('gambar-sampul/' .$glama);
            }
        }


        $data = array(
            'judul_buku' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'tahun_terbit' => $this->request->getPost('tahun_t'),
            'penerbit' => $this->request->getPost('penerbit'),
            'isbn' => $this->request->getPost('isbn'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah_buku' => $this->request->getPost('j_buku'),
            'gambar_buku' => $namasampul,
            'deskripsi' => $this->request->getPost('deskripsi'),
        );

        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Data Berhasil Diedit');
        
        $model->update($id, $data);
        return redirect()->to('admin/data-buku');
    }

    public function hapusPinjaman($id){
        $model = new M_pinjam;

        $model->where(['id'=>$id])->delete($id);

        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Data Berhasil Dihapus');

        return redirect()->to('admin/data-pinjaman');
    }

}
