<?php namespace App\Controllers;

use \App\Models\M_frontend;
use \App\Models\M_token;
use \App\Models\M_buku;
use \App\Models\M_pinjam;

class AuthF extends BaseController
{
    public function daftarUser(){
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
                'nis' => [
                                'rules'=>'required|min_length[8]|max_length[9]|is_unique[tb_user.nis]',
                                'errors'=>[
                                    'required'=> '*Nis Belum Diisi',
                                    'min_length'=> '*Nis Terlalu Pendek',
                                    'max_length'=> '*Nis Terlalu Panjang',
                                    'is_unique'=> '*Nis Sudah Dipakai'
                                ]
                            ],
                'email' => [
                                'rules'=>'required|valid_email|is_unique[tb_user.email]',
                                'errors'=>[
                                    'required'=> '*Email Belum Diisi',
                                    'valid_email' => '*Email Tidak Valid!',
                                    'is_unique'=> '*Email Sudah Dipakai'
                                ]
                            ],
                'password1' => [
                                'rules'=>'required|min_length[8]|max_length[12]',
                                'errors'=>[
                                    'required'=> 'Password Belum diisi',
                                    'min_length'=> 'Password Terlalu Pendek',
                                    'max_length'=> 'Password Terlalu Panjang'
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
            return redirect()->to('/register')->withInput();
        }
        
        
        $email = $this->request->getPost('email');
        $data = array(
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'password' => password_hash($this->request->getPost('password1'),PASSWORD_DEFAULT),
            'email' => $email,

        );

        $model = new M_frontend;
        $modelt = new M_token;

        //token
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        $model->insert($data);
        $modelt->insert($user_token);

        //kirim email verif
        $this->_sendEmail($token, 'verify');
        

        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Selamat Anda Telah Berhasil Mendaftar!');
        session()->setFlashdata('text', 'Silahkan cek email untuk mengaktivasi akunmu!');
        return redirect()->to('/login');

        }

        session()->setFlashdata('pesan', '<div class="alert alert-primary">Password Tidak Sama!</div>');
        return redirect()->to('register');
    }

    public function loginUser(){

        $model = new M_frontend;

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $row = $model->where('email', $email)->first();

        if($row == null){
            session()->setFlashdata('email', '<p class="text-danger text-small">*Email tidak ditemukan</p>');
            return redirect()->to('login');
        }

        
        if($row['status'] == 'Nonaktif'){
            session()->setFlashdata('icon', 'warning');
            session()->setFlashdata('title', 'Akun kamu belum bisa login');
            session()->setFlashdata('text', 'Kamu harus menunggu petugas mengaktifkan akun kamu. Jika ingin lebih cepat silahkan datangi petugas di perpustakaan!');
            return redirect()->to('/login');
        }

        if(password_verify($password, $row['password'])){
            $data = [
                        'login' => 'Ya',
                        'status' => $row['status'],
                        'nama' => $row['nama'],
                        'level' => $row['level'],
                    ];
            session()->set($data);
            return redirect()->to('/');
        }

            session()->setFlashdata('pesanPassword','<p class="text-danger text-small">*Password salah!</p>');
            return redirect()->to('login');
            

    }

    public function _sendEmail($token, $type){
        $this->email = \Config\Services::email();

        if($type == 'verify'){
            $this->email->setFrom('reihan.tdn@gmail.com','E-Perpus');
            $this->email->setTo($this->request->getPost('email'));
            $this->email->setSubject('Konfirmasi Email E-Perpus');
            $this->email->setMessage('<p>Selamat akunmu berhasil terdaftar!</p><p>Silahkan verifikasi melalui link ini <a href="' . base_url() . 
            '/authF/verify?email='.$this->request->getPost('email').'&token=' .urlencode($token). '">Verifikasi Email disini</a></p>');
            $this->email->send();

            if(!$this->email->send()){
                return true;
            }else{
                echo 'gagal';
                die;
            }
        }

        if($type == 'password'){
            $this->email->setFrom('reihan.tdn@gmail.com','E-Perpus');
            $this->email->setTo($this->request->getPost('email'));
            $this->email->setSubject('Ganti password');
            $this->email->setMessage('<p>Silahkan ubah passwordmu melalui link ini!<a href="' . base_url() . 
            '/authf/ubahpassword?email='.$this->request->getPost('email').'&token=' .urlencode($token). '">Ubah Password</a></p>');
            $this->email->send();

            if(!$this->email->send()){
                return true;
            }else{
                echo 'gagal';
                die;
            }
        }
         
    }

    public function verify(){
        $model = new M_frontend;
        $modelt = new M_token;

        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');

        $user = $model->where('email', $email)->first();
        $user_token = $modelt->where('token', $token)->first();
        
        if($user AND $user_token){
            
            $dibuat = $user_token['date_created'];

            $idv = $user_token['id'];
            $ide = $user['id'];
            

            if($user_token){
                 if(time() - $dibuat < 1800 ){
                    $model->update($ide, ['status' => 'Nonaktif']);
                    $modelt->delete($idv);
                    session()->setFlashdata('icon', 'success');
                    session()->setFlashdata('title', 'Selamat Akunmu telah di aktivasi!');
                    session()->setFlashdata('text', 'Silahkan datang ke perpustakan dan datangi petugas untuk mengaktifkan akun kamu!');
                    return redirect()->to('/login');
                 }else{
                    $model->delete($ide);
                    $modelt->delete($idv);
                    session()->setFlashdata('verify', '<div class="alert alert-danger" role="alert">Token kedaluwarsa! Silahkan daftar ulang!</div>');
                    return redirect()->to('login');
                 }

            }else{
                session()->setFlashdata('verify', '<div class="alert alert-danger" role="alert">Token tidak valid!</div>');
                return redirect()->to('login');
            }

        }else{
            session()->setFlashdata('verify', '<div class="alert alert-danger" role="alert">Aktivasi akun tidak valid!</div>');
            return redirect()->to('login');
        }
        
    }

    public function lupaPassword(){
        $model = new M_frontend;
        $modelt = new M_token;

        $email = $this->request->getPost('email');

        if($email){

            $row = $model->where(['email' => $email, 'status' => 'Aktif'])->first();
            
            if($row){

                //token
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $modelt->insert($user_token);

                //kirim email
                $this->_sendEmail($token, 'password');
                session()->setFlashdata('icon', 'success');
                session()->setFlashdata('title', 'Email telah dikirim!');
                session()->setFlashdata('text', 'Silahkan cek email untuk mengubah passwordmu!');

                return redirect()->to('lupa-password');
            
            }else{
                session()->setFlashdata('false', '<p class="alert alert-danger" role="alert">*Email tidak ditemukan atau belum di verifikasi!</p>');
                return redirect()->to('lupa-password');
            }

        }else{
            session()->setFlashdata('pesan', '<p class="text-danger text-small">*Email belum diisi!</p>');
            return redirect()->to('lupa-password');
        }

    }

    public function ubahpassword(){

        $modeltoken = new M_token;
        $modelu = new M_frontend;

        $token = $this->request->getGet('token');
        $email = $this->request->getGet('email');

        if($token AND $email){

            $user = $modelu->where('email', $email)->first();
            $user_token = $modeltoken->where(['token'=> $token, 'email'=>$email])->first();

            if($user_token){

                $iduser = $user['id'];
                $dibuat = $user_token['date_created'];
                $idt = $user_token['id'];
                $email = $user_token['email'];

                if(time() - $dibuat < 1800){
                    $data = [
                        'title' => 'Ubah Password',
                        'email' => $email,
                        'id' => $iduser,
                    ];
                    $modeltoken->delete($idt);
                    session()->set($data);
                    return redirect()->to('ubah-password');

                }else{
                    $modeltoken->delete($idt);
                    session()->setFlashdata('false', '<p class="alert alert-danger">Token kedaluwarsa!</p>');
                    return redirect()->to('lupa-password');
                }

            }else{
                session()->setFlashdata('false', '<p class="alert alert-danger">Token tidak valid!</p>');
                return redirect()->to('lupa-password');
            }
        }else{
             return redirect()->to('lupa-password');
        }

    }

    public function changeps(){
        $model = new M_frontend;
        $pw1 = $this->request->getPost('password1');
        $pw2 = $this->request->getPost('password2');

        if($pw1 == $pw2){
            $id = $this->request->getPost('id');
 
            $hash = password_hash($this->request->getPost('password1'),PASSWORD_DEFAULT);
            
            $model->update($id,['password' => $hash]);
            session()->setFlashdata('icon', 'success');
            session()->setFlashdata('title', 'Email telah dikirim!');
            session()->setFlashdata('text', 'Silahkan cek email untuk mengubah passwordmu!');
            session()->destroy();
            return redirect()->to('login');

        }else{
            session()->setFlashdata('pesan', '<p class="alert alert-danger">Password tidak sama</p>');
            return redirect()->to('ubah-password');
        }

    }

    public function logoutUser(){
        session()->destroy();
        return redirect()->to('/');
    }
    

    public function tambahPinjaman($judul){
        $model = new M_buku;
        $modelf = new M_frontend;
        $mpinjam = new M_pinjam;

        $link = $this->request->getPost('link');
        $buku = $model->where(['judul_buku' => $judul])->first();
        $nama = $modelf->where(['nama' => $this->request->getPost('nama')])->first();

        if(!$nama){
            return redirect()->to($link);
        }
        

        $val = $this->validate([
                    'kelas' => [
                                'rules'=>'required',
                                'errors'=>[
                                    'required'=> '*Kelas belum diisi!'
                                ]
                            ],
                    'tglpinjam' => [
                                    'rules' => 'required',
                                    'errors' => [
                                                 'required' => '*Tanggal pinjaman belum diisi!' 
                                                ]
                        ],
                    'tglkembali' => [
                                    'rules' => 'required',
                                    'errors' => [
                                                'required' => '*Tanggal pengembalian belum diisi!' 
                                                ]
                                    ],
        ]);

        if(!$val){
            return redirect()->to($link)->withInput();
        }
        
        if(!$buku){
            return redirect()->to('/');
        }


        $data = array(
            'nama_peminjam' => $nama['nama'],
            'email' => $nama['email'],
            'kelas' => $this->request->getPost('kelas'),
            'judul_buku' => $buku['judul_buku'],
            'gambar_buku' => $buku['gambar_buku'],
            'tgl_pinjam' => $this->request->getPost('tglpinjam'),
            'tgl_kembali' => $this->request->getPost('tglkembali'),
            'tanggal_dibuat' => time(),
        );
        $mpinjam->insert($data);
        
        session()->set(['tanggal_dibuat' => time() ]);
        session()->remove('judul_buku');
        session()->setFlashdata('icon', 'success');
        session()->setFlashdata('title', 'Selamat Data Pinjaman Kamu Sudah Berhasil Disimpan!');
        session()->setFlashdata('text', 'Silahkan print data dibawah di perpustakaan dan ambil buku sesuai yang dipilih');
        return redirect()->to('pinjam-buku/pinjam-berhasil');
        
    }

}