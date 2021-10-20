<?= $this->extend('extend/index'); ?>

<?= $this->section('content'); ?>

<section class="main-header">
   <div class=" min-vh-100 background-walk-x position-relative overlay-gradient-bottom header" data-background="<?= base_url('assets/content/pe.jpg') ?>">
        <div class="container">
            <div class="parallax row ">
                <div class="col-md-6 col-sm-10">
                    <img src="<?= base_url('assets/content/bacabuku.svg') ?>">
                </div>
                <div class="col-md-6 col-sm-8">
                    <img src="<?= base_url('assets/content/buku.svg') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-sm-6 col-12 header-search">
                    <h1 class="text-center text-shadow text-white">Selamat datang di E-Perpus SMKN 1 Ciamis</h1>
                    <h3 class="text-center text-shadow text-white content-search">Cari buku favoritmu disini</h3>
                    <form action="<?= base_url('semua-buku') ?>" method="get">
                        <div class="input-group flex-nowrap py-3 content-search input-group-lg">
                            <input type="text" class="form-control p-4" placeholder="Cari buku" name="q" aria-label="Cari buku">
                            <button type="submit" class="btn-primary input-group-text shadow-none p-4" ><i class="fa fa-search"></i></button>
                        </div>
                    </foRm>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if(!session()->get('login')) { ?>
    <div class="header" style="background-color:#f7fafc;"> 
        <div class="container">
            <div class="row py-5">
                <div class="header-content col-md-7">
                    <p class="py-0 my-0">Perpustakaan SMKN 1 Ciamis</p>
                    <h1 class="text-primary">Meminjam buku Perpustakaan<br> dengan kemudahan</h1>
                    <p class="text-dark">E-Perpus adalah website perpustakaan SMKN 1 Ciamis yang memberikan kemudahan kepada penggunanya, karena hanya dengan
                       mendaftar di sini dan memilih buku yang akan dipinjam kita akan langsung bisa mengambil mengambil buku tersebut di perpustakaan
                    </p>
                    <div class="d-flex">
                        <a class="text-decoration-none" href="<?= base_url('register'); ?>">
                            <button class="btn btn-primary me-2">Daftar Sekarang</button>
                        </a>
                        <a class="text-decoration-none" href="#">
                            <button class="btn btn-outline-primary">Lihat Selengkapnya</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-5 d-none d-md-block">
                    <img src="<?= base_url('assets/content/header.svg') ?>" >
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<section class="kategori bg-white">
    <div class="container">
        <div class="row pt-2 pb-5">
            <div class="row pt-3">
                <nav class="navbar-d navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="d-flex " id="navbarNavAltMarkup">
                            <div class="navbar-nav mx-auto">
                                <a class="nav-link active" aria-current="page" id="alllink" ><h5>Semua</h5></a>
                                <?php foreach($kategori as $row){ ?>
                                <a class="nav-link" aria-current="page" id="<?= $row['kategori'] ?>"><h5><?= $row['kategori'] ?></h5></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row py-5 isi-kategori" id="kategori">
            </div>
            <a class="button text-center" href="<?= base_url('semua-buku'); ?>">
                <button class="btn btn-primary col-md-5">Lihat Semua Buku</button>
            </a>
        </div>
    </div>
</section>

<section class="buku-terpopuler" style="background-color:#f7fafc">
    <div class="container">
        <h2 class="text-center pt-5 text-primary">Buku Terpopuler</h2>
        <div class="row py-5 ">
            <?php foreach($all_buku as $row) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6 card vanillatilt"  style=" background-image: url(<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku'] ?>); background-size:cover;">
                <a class="text-decoration-none" href="<?= base_url('detail-buku') ?>/<?= strtolower(str_replace(" ", "-", $row['judul_buku'])) ?>">
                    <div class="content">
                        <h4><?= $row['judul_buku']; ?><h4>
                        <a class="lihat-selengkapnya" href="<?= base_url('detail-buku') ?>/<?= strtolower(str_replace(" ", "-", $row['judul_buku'])) ?>">Lihat Buku</a>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
<section>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $('#alllink').click(function(){
            $('#kategori').load('<?= base_url('/tampil') ?>');
        });
        $('#kategori').load('<?= base_url('/tampil') ?>');
        <?php foreach($kategori as $row) {?>
            $('#<?= $row['kategori'] ?>').click(function(){
                $('#kategori').load('<?= base_url('/tampil?kategori=') ?><?= $row['kategori'] ?>');
            });
        <?php } ?>
	});
    <?php foreach($kategori as $row) {?>
        $('.kategori .nav-link').click(function(){
            $('#<?= $row['kategori'] ?>').removeClass('active');
            $('#alllink').removeClass('active');
            $(this).addClass('active');
        });
    <?php } ?> 

    
       var owl = $('.owl-carousel');
        owl.owlCarousel({
            nav:true,
            loop:false,
            dots:false,
            margin:10,
            navText:[
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fa fa-arrow-right"></i>'
            ],
            navContainer: "#button-slider",
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        });
</script>

<?= $this->endsection('content'); ?>