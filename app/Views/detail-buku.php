<?= $this->extend('extend/index') ?>

<?= $this->section('content'); ?>

<header>
    <div class="background-walk-x position-relative overlay-gradient-bottom header" data-background="<?= base_url('assets/content/pe.jpg') ?>">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6">
                    <p class="py-0 my-0 text-white opacity-75">Perpustakaan SMKN 1 Ciamis</p>
                    <h1 class="text-white">Meminjam buku Perpustakaan<br> dengan kemudahan</h1>
                </div>
                <div class="col-md-6">
                    <form action="<?= base_url('semua-buku') ?>" method="get" >
                        <div class="input-group flex-nowrap py-5 px-5" style="z-index:99;">
                            <input type="text" class="form-control p-4" placeholder="Cari buku" name="q" aria-label="Cari buku" aria-describedby="addon-wrapping">
                            <button class="btn-primary input-group-text shadow-none p-4" id="addon-wrapping"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>


<section class="detail-buku my-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-3 text-center" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $buku['id_buku'] ?>" data-tilt data-tilt-max="35" data-tilt-speed="400" data-tilt-perspective="5000">
                <img class="img-fluid detail-buku" src="<?= base_url('gambar-sampul/') ?>/<?= $buku['gambar_buku'] ?>">
            </div>
            <div class="col-md-8 my-2">
                <h1><?= $buku['judul_buku'] ?></h1>
               <div class="row">
                   <table class="table">
                       <tr>
                           <th class="table-active">Pengarang</th>
                           <td><?= $buku['pengarang'] ?></td>
                       </tr>
                       <tr>
                           <th class="table-active">Tahun Terbit</th>
                           <td><?= $buku['tahun_terbit'] ?></td>
                       </tr>
                        <tr>
                           <th class="table-active">Penerbit</th>
                           <td><?= $buku['penerbit'] ?></td>
                       </tr>
                        <tr>
                           <th class="table-active">ISBN</th>
                           <td><?= $buku['isbn'] ?></td>
                       </tr>
                       <tr>
                           <th class="table-active">Kategori</th>
                           <td><?= $buku['kategori'] ?></td>
                       </tr>
                        <tr>
                           <th class="table-active">Jumlah Buku</th>
                           <td><?= $buku['tahun_terbit'] ?></td>
                       </tr>
                        <tr>
                           <th class="table-active">Dekripsi</th>
                           <td><?= $buku['deskripsi'] ?></td>
                       </tr>
                    </table>
               </div>
               <?php if(session()->get('login') == 'Ya'){ ?>
               <div class="button-pinjam text-center">
                   <a href="<?= base_url('pinjam-buku') ?>?buku=<?= strtolower(str_replace(" ", "-", $buku['judul_buku']))?>">
                        <button class="btn btn-primary col-8 p-2">Pinjam Buku</button>
                   </a>
               </div>
               <?php } ?>
            </div>
        </div>
        <?php if(!session('login')) { ?>
        <div class="card mx-5 my-5 background-walk-x position-relative overlay-gradient-bottom header" data-background="<?= base_url('assets/content/pe.jpg') ?>">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid" data-tilt data-tilt-max="35" data-tilt-speed="400" data-tilt-perspective="5000" height="100px" src="<?= base_url('assets/content/buku.svg') ?>">
                </div>
                <div class="col-md-8 p-5 my-5 text-center">
                    <h3>Login atau Daftar untuk meminjam Buku</h3>
                    <p>Ayo lakukan kemudahan dengan E-Perpus meminjam buku hanya dengan sekali klik</p>
                    <a href="<?= base_url('/register') ?>">
                        <button class="btn btn-secondary shadow-none text-dark col-md-4 col-sm-10">Daftar Sekarang</button>
                    </a>
                    <a href="<?= base_url('/login') ?>">
                        <button class="btn btn-outline-secondary text-white shadow-none col-md-4 col-sm-10">Login</button>
                    </a>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $buku['id_buku'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content  shadow-none" style="background:none !important;">
        <img src="<?= base_url('gambar-sampul') ?>/<?= $buku['gambar_buku'] ?>" class="img-thumbnail">
    </div>
  </div>
</div>

<?= $this->endsection(); ?>