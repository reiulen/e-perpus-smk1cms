<?= $this->extend('extend/index') ?>

<?= $this->section('content') ?>

<header>
    <div class="background-walk-x position-relative overlay-gradient-bottom header" data-background="<?= base_url('assets/content/pe.jpg') ?>">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-10 mx-auto text-center">
                    <p class="py-0 my-0 text-white opacity-75">Perpustakaan SMKN 1 Ciamis</p>
                    <h1 class="text-white">Meminjam buku Perpustakaan<br> dengan kemudahan</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="my-5" style="background-color:transparent;  ">
    <div class="container-fluid">
        <?php if($cari){ ?>
            <div class="hasil-pencarian m-5 text-center">
                <h4>Hasil pencarian "<?= $cari ?>"</h4>
            </div>
        <?php } ?>
        <div class="row"> 
            <div class="col-md-3">
              <form action=""  method="">
                  <div class="form-group">
                      <h5 class="my-2">Cari Buku</h5>
                      <div class="input-group mb-5">
                        <button type="btn" class="input-group-text btn btn-primary"><i class="fa fa-search"></i></button>
                        <input type="text" name="q" class="form-control" placeholder="Cari buku" value="<?= $cari ?>" aria-label="Cari" aria-describedby="basic-addon1">
                      </div>
                  </div>
              </form>
              <h5>Kategori</h5>
              <div class="col-8 offset-1 mb-2">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action <?= ($hasilkat) ? ' ' : 'active' ?>" href="<?= base_url('semua-buku') ?>" >Semua</a>
                     <?php foreach($kategori as $row) { ?>
                        <a class="list-group-item list-group-item-action <?= ($row['kategori'] == $hasilkat) ? 'active' : '' ?>" id="list-<?= $row['kategori'] ?>-list" href="<?= base_url('semua-buku') ?>?kategori=<?= $row['kategori'] ?>" role="tab" aria-controls="list-<?= $row['kategori'] ?>"><?= $row['kategori'] ?></a>
                     <?php } ?>
                </div>
              </div>
                <?php if(!session()->get('login')) { ?>
                    <div class="col-10 mx-auto card my-5">
                        <img class="img-thumbnail p-0 m-0" style="border:none !important;" src="<?= base_url('assets/content/daftar.svg') ?>">
                        <div class="card-body text-center pt-0">
                            <p>Ayo daftar menjadi anggota kami sekarang juga!</p>
                            <a href="<?= base_url('register') ?>">
                                <button class="btn btn-primary col-12">Daftar</button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
         <div class="col-md-9 col-sm-12 px-3 list-semua-buku">
                <div class="row tab-pane fade show active mx-auto" id="list-semua" role="tabpanel" aria-labelledby="list-semua-list">
                    <?php foreach($buku as $row){ ?>
                        <?php if($row['judul_buku'] AND $row['deskripsi']) {?>
                            <div class="col-lg-3 col-md-6 col-sm-6 card"  style="background-image: url(<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku']; ?>); background-size:cover;">
                                <a class="text-decoration-none" href="<?= base_url('detail-buku') ?>/<?= strtolower(str_replace(" ", "-", $row['judul_buku'])) ?>">
                                    <div class="content">
                                        <h4><?= $row['judul_buku']; ?><h4>
                                        <a class="lihat-selengkapnya" href="<?= base_url('detail-buku') ?>/<?= strtolower(str_replace(" ", "-", $row['judul_buku'])) ?>">Lihat Buku</a>
                                    </div>
                                </a>
                            </div>
                        <?php }?>
                    <?php } ?>
                    <div class="paginate ">
                        <?= $pager->links('tb_buku', 'paginate_buku'); ?>
                    </div>
                </div>
         </div>
        </div>
    </div>
</section>



<?= $this->endsection('content') ?>