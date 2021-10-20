<?php

namespace App\Controllers;
use App\Models\M_buku;
use App\Models\M_pinjam;
use Dompdf\Dompdf;
use App\Models\M_frontend;

class Frontend extends BaseController
{
    public function index()
    {
        $modelb = new M_buku;
        
        $data['halkategori'] = $this->request->getGet('kategori');
        if($data['halkategori']){
            $data['buku'] = $modelb->where(['kategori' => $data['halkategori']])->paginate(10, 'tb_buku');
        }else{
            $data['buku'] = $modelb->paginate(10, 'tb_buku');
        }


        $data['title'] = 'E-Perpus | SMKN 1 Ciamis';
        $data['all_buku'] = $modelb->limit(3)->orderBy('id_buku', 'DESC')->find();
        $data['kategori'] = $modelb->distinct('kategori')->groupby('kategori')->findAll();
        return view('index', $data);
    }

     public function tampilKategori()
    {
        $modelb= new M_buku;
        
        $data['halkategori'] = $this->request->getGet('kategori');
        if($data['halkategori']){
            $data['allbuku'] = $modelb->where(['kategori' => $data['halkategori']]);
        }else{
            $data['allbuku'] = $modelb->paginate(12, 'tb_buku');
        }

        $data['all_buku'] = $modelb->paginate(12, 'tb_buku');

        return view('tampil-kategori', $data);
    }


    public function loginadmin()
    {
        $data['title'] = 'Login Admin E-Perpus';
        return view('login-admin');
    }

    public function login()
    {
        if(!session()->get('login') == 'Ya'){
            $data['title'] = 'Login E-Perpus';
            return view('user-login', $data);
        }
        return redirect()->to('/');
    }

    public function register()
    {
        if(session()->get('login')){
            return redirect()->to('/');
          }

        $data=[
            'validate'=> \Config\Services::validation(),
        ];
        $data['title'] = 'Daftar E-Perpus';
        return view('user-register', $data);
    }

    public function lupaPassword()
    {
        $data=[
           'title' => 'Lupa Password',
        ];
        return view('lupa-password', $data);
    }

    public function ubahPassword()
    {
        if(session()->get('title')){

        $data=[
           'title' => 'Ubah Password',
        ];

        return view('ubah-password', $data);

        }else{
            return redirect()->to('/');
        }
    }
    public function detailBuku($judul){
        $model = new M_buku;
        $title = ucwords(str_replace("-", " ", $judul));

        session()->set(['judul_buku' => 'ya']);

        $data=[
            'title' => $title,
        ];
        $data['buku'] = $model->where(['judul_buku' => $title ])->first();
        
        if($data['buku']){
            return view('detail-buku', $data);
        }
        return redirect()->to('/');
    }

    public function semuaBuku(){
        $model = new M_buku;
        
        $data['cari'] = $this->request->getGet('q');
        $data['kategori'] = $model->distinct('kategori')->groupby('kategori')->findAll();
        $data['halkategori'] = $this->request->getGet('kategori');
        

        if($data['cari']){
            $data['buku'] = $model->like([ 'judul_buku' => $data['cari'] ])->orLike(['deskripsi' => $data['cari']])->orLike(['pengarang' => $data['cari']])->paginate(15, 'tb_buku');
        }else{
            $data['buku'] = $model->paginate(15, 'tb_buku');
        }

        if($data['halkategori']){
            $data['buku'] = $model->where('kategori', $data['halkategori'])->findAll();
        }else{
            $data['buku'] = $model->paginate(15, 'tb_buku');
        }

        if(!$data['buku']){
            $data['buku'] = $model->findAll();
        }


        $data=[
            'buku' => $data['buku'],
            'kategori' => $data['kategori'],
            'cari' => $this->request->getGet('q'),
            'pager' => $model->pager,
            'hasilkat' => $data['halkategori'],
            'title' => 'Cari Buku',
        ];
        return view('semua-buku', $data);
    }

    public function pinjamBuku(){
        $model = new M_buku;
        $b = $this->request->getGet('buku');
        $repbuku = ucwords(str_replace("-", " ", $b));

        $buku = $model->where(['judul_buku'=> $repbuku ])->first(); 

        if(!session()->get('judul_buku')){
            return redirect()->to('/');
        }

        if(!session()->get('login') == 'Ya'){
            return redirect()->to('/');
        }
        
        if(!$buku){
            return redirect()->to('/');
        }


        $data = [
            'buku' => $buku,
            'title' => 'Pinjam Buku',
            'validate'=> \Config\Services::validation(),
        ];

        return view('pinjam-buku', $data);
    }


    public function pinjamBerhasil(){
        $modelb = new M_buku;
        $model = new M_pinjam;
        $tgl_dibuat = session()->get('tanggal_dibuat');
        

        if(!$tgl_dibuat){
            return redirect()->to('/');
        }

        $pinjam = $model->where(['tanggal_dibuat' => $tgl_dibuat])->first();
        $buku = $modelb->where(['judul_buku' => $pinjam['judul_buku']])->first();
        
        if(!$pinjam){
            return redirect()->to('/');
        }

        $data=[
            'nama' => $pinjam['nama_peminjam'],
            'gambar' => $buku['gambar_buku'],
            'id_buku' => $buku['id_buku'],
            'email' => $pinjam['email'],
            'kelas' => $pinjam['kelas'],
            'j_buku' => $pinjam['judul_buku'],
            'tgl_pinjam' => $pinjam['tgl_pinjam'],
            'tgl_kembali' => $pinjam['tgl_kembali'],
            'title' => 'Pinjaman Buku Berhasil',
        ];
        return view('pinjam-berhasil', $data);
    }

    public function cetakPinjaman($us){
        
        $model = new M_pinjam;
        $dompdf = new Dompdf();
        $buku = $model->where(['tanggal_dibuat' => session()->get('tanggal_dibuat') ])->first();

        if($us == 'aks'){
            $reqid = $this->request->getPost('id');
            $pinjam = $model->where(['id' => $reqid])->first();

            if(!$pinjam){
                return redirect()->to('/');
            }

            $data = [
                'nama' => $pinjam['nama_peminjam'],
                'email' => $pinjam['email'],
                'kelas' => $pinjam['kelas'],
                'j_buku' => $pinjam['judul_buku'],
                'tgl_pinjam' => date('d F Y', strtotime($pinjam['tgl_pinjam'])),
                'tgl_kembali' => date('d F Y', strtotime($pinjam['tgl_kembali'])),
                'title' => 'Cetak Pinjaman',
            ];
                
            $html = view('cetak-pinjaman', $data);
            $dompdf->loadHtml($html);
            $dompdf->setpaper('A4', 'lanscape');
            $dompdf->render();
            $dompdf->stream('form-pinjaman-eperpus.pdf', array(
                "Attachment" => false
            ));
        }

        if($us == 'us'){
            if(!session()->get('tanggal_dibuat')){
                return redirect()->to('/');
            }
            
            
            if(!$buku){
                return redirect()->to('/');
            }

            $data = [
                'nama' => $buku['nama_peminjam'],
                'email' => $buku['email'],
                'kelas' => $buku['kelas'],
                'j_buku' => $buku['judul_buku'],
                'tgl_pinjam' => date('d F Y', strtotime($buku['tgl_pinjam'])),
                'tgl_kembali' => date('d F Y', strtotime($buku['tgl_kembali'])),
                'title' => 'Cetak Pinjaman',
            ];
                
            $html = view('cetak-pinjaman', $data);
            $dompdf->loadHtml($html);
            $dompdf->setpaper('A4', 'lanscape');
            $dompdf->render();
            $dompdf->stream('form-pinjaman-eperpus.pdf', array(
                "Attachment" => false
            ));
        }
        return redirect()->to('/');
        
    }
}
