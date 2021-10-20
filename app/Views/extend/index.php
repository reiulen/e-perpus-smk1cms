<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title ?></title>

  <!-- General CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <script type="module" src="https://cdn.jsdelivr.net/npm/@duetds/date-picker@1.4.0/dist/duet/duet.esm.js"></script>
  <script nomodule src="https://cdn.jsdelivr.net/npm/@duetds/date-picker@1.4.0/dist/duet/duet.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@duetds/date-picker@1.4.0/dist/duet/themes/default.css" />


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('/assets'); ?>/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/perpustakaan.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/owl.theme.default.min.css') ?>">
</head>
<body style="">

<nav class="navbar fixed-top navbar-d navbar-expand-lg py-3">
  <div class="container">
    <button class="btn btn-light navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
     <i class="fas fa-align-left" style="font-size:15px;"></i>
    </button>
    <a class="navbar-brand text-dark justify-content-center" href="<?= base_url('/'); ?>"><i class="fa fa-book d-none d-md-inline-block"></i> E-Perpus</a>
    <div class="collapse navbar-collapse">
      <div class="navbar-nav ms-auto border-end border-1 border-primary nav-hover">
        <a class="text-decoration-none  mx-3 <?= ($title != 'E-Perpus | SMKN 1 Ciamis') ? 'text-dark' : ' '; ?> " href="<?= base_url('/') ?>">HOME</a>
        <a class="text-decoration-none  mx-3 <?= ($title != 'Tentang') ? 'text-dark' : ''; ?>" href="#">KATEGORI</a>
        <a class="text-decoration-none  mx-3 <?= ($title != 'Kategori') ? 'text-dark' : ''; ?>" href="#">TENTANG</a>
        <a class="text-decoration-none  mx-3 d-md-none d-block" href="<?= base_url('login') ?>"><p>MASUK</p></a>
      </div>
    </div>
    <div class="navbar-nav">
      <?php if(session()->get('login') != 'Ya'){ ?>
        <a class="p-2 d-none d-md-inline-block" href="<?= base_url('login') ?>"><button class="btn">Masuk</button></a>
        <a class="p-2" href="<?= base_url('register') ?>"><button class="btn btn-primary m-0">Daftar</button></a>
      <?php } ?>
        <div class="button p-2">
          <button class="btn btn-primary d-lg-none d-block"><i class="fa fa-search m-0"></i></button>
        </div>
        
      <?php if(session()->get('login') == 'Ya' ){?>
        <li class="nav-item dropdown pt-2">
            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img alt="image" src="<?= base_url(); ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block text-dark">Hi, <?= session()->get('nama'); ?></div>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a href="features-settings.html" class="dropdown-item has-icon">
                  <i class="fas fa-cog"></i> Settings
                </a>
              </li>
              <li>
                <a href="#" id="logout" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </li>
            </ul>
          </li>
      <?php } ?>
        
    </div>
  </div>
</nav>



<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header bg-primary text-white">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">E-Perpus</h5>
      <button type="button" class="btn btn-danger" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-times"></i></button>
  </div>
  <div class="offcanvas-body mx-2">
        <a class="text-decoration-none text-dark body-item" href="#"><p>HOME</p></a>
        <a class="text-decoration-none text-dark body-item" href="#"><p>KATEGORI</p></a>
        <a class="text-decoration-none text-dark body-item" href="#"><p>TENTANG</p></a>
         <?php if(session()->get('login') != 'Ya'){ ?>
            <a class="text-decoration-none text-dark body-item" href="#"><p>MASUK</p></a>
         <?php }else{
           echo'<a class="text-decoration-none text-dark body-item" href="#"><p>Dahboard</p></a>';
         } ?>
  </div>
</div>

<script>
  window.addEventListener(scroll, function(){
    var nav = document.querySelector("nav");
    nav.classList.toggle("active", window.scrollY>0);
  });
</script>


  <?= $this->renderSection('content'); ?>
  
  <footer class="bg-white">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <h3><i class="fa fa-book pe-1"></i>E-Perpus</h3>
            <p>E-Perpus adalah website perpustakaan SMKN 1 Ciamis yang memudahkan para siswa untuk meminjam buku hanya dengan sekali klik dan mengambilnya tinggal langsung data ke perpustkaan</p>
          </div>
          <div class="col-sm-3">
            <h4>Kategori</h4>
            <ul>
              <li>Reihan</li>
              <li>Reihan</li>
              <li>Reihan</li>
              <li>Reihan</li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h4>Menu</h4>
            <ul>
              <li>Home</li>
              <li>Kategori</li>
              <li>Tentang</li>
              <li>Kontak</li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h4>Kontak</h4>
            <ul>
              <li><i class="fas fa-envelope pe-1"></i><a href="mailto:surat@smkn1cms.net">surat@smkn1cms.net</a></li>
              <li><i class="fas fa-phone pe-1"></i><a href="phoneto:+62-265-771204">+62-265-771204</a></li>
              <li><i class="fas fa-map-marker-alt px-1"></i>Jl. Jend. Sudirman Lingk. Cibeureum No.269</li>
            </ul>
          </div>
        </div>
      </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>        
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/stisla.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/vanilla.js') ?>"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>/assets/js/custom.js"></script>
  <script src="<?= base_url() ?>/assets/js/stisla.js"></script>
  
  <script>
    $(document).ready(function(){
      $('#logout').click(function(){
        Swal.fire({
          title: 'Apakah Yakin?',
          text: "Kamu akan keluar dari halaman Admin!",
          icon: 'warning',
          showCancelButton: true,
          iconColor:'red',
          confirmButtonColor: '#6777ef',
          cancelButtonColor: 'red',
          confirmButtonText: 'Keluar',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
           window.location= '<?= base_url(); ?>/authF/logoutUser';
          }
        });
      });
    });

    <?php if (session()->getFlashdata('icon')){ ?>
      Swal.fire({
        title: '<?= session()->getFlashdata('title'); ?>',
        iconColor:'#6777ef',
        text: '<?= session()->getFlashdata('text'); ?>',
        icon: '<?= session()->getFlashdata('icon'); ?>'
      });
    <?php } ?>
  </script>


  </body>
</html>
