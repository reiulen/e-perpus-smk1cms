<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E-Perpus &mdash; <?= $title ?></title>

  <!-- General CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('/assets'); ?>/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav ">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown m-5">
            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img alt="image" src="<?= base_url(); ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->get('username'); ?></div>
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
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand m-1" style="font-size:25px;">
            <a href="<?= base_url(); ?>"><i class="fas fa-book m-1" style="font-size:25px;"></i>E-Perpus</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url(); ?>">E-P</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item"><a class="nav-link <?php if($title == 'Dashboard'){ ?> text-primary<?php }'non' ?>" href="<?= base_url(); ?>/admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <?php if(session()->get('status') == 'Aktif') {?>
                  <li class="menu-header">Pengelolaan Pengguna</li>
              <?php } ?>
              <?php if(session()->get('level') == 'Admin') {?>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown  <?php if($title == 'Data Petugas' OR $title == 'Tambah Petugas'){ ?> text-primary<?php }?>"><i class="fas fa-users"></i> <span>Petugas</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link  <?php if($title == 'Data Petugas'){ ?> text-primary<?php }?>" href="<?= base_url(); ?>/admin/data-petugas">Data Petugas</a></li>
                   <li><a class="nav-link <?php if($title == 'Tambah Petugas'){ ?> text-primary<?php }?>" href="<?= base_url(); ?>/admin/tambah-petugas">Tambah Petugas</a></li>
                </ul>
              </li>
              <?php } ?>
              <?php if(session()->get('status') == 'Aktif') {?>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown  <?php if($title == 'Data Anggota' OR $title == 'Tambah Anggota'){ ?> text-primary<?php }?>"><i class="fas fa-user"></i><span>Anggota</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link <?php if($title == 'Data Anggota'){ ?> text-primary<?php }?>" href="<?= base_url('admin/data-anggota') ?>">Data Anggota</a></li>
                  <li><a class="nav-link" href="<?= base_url('register') ?>">Tambah Anggota</a></li>
                </ul>
              </li>

              <li class="menu-header">Pengelolaan Buku</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown <?php if($title == 'Data Buku' OR $title == 'Tambah Buku' OR $title == 'Edit Buku'){ ?> text-primary<?php }?>"><i class="fas fa-th"></i> <span>Buku</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link <?php if($title == 'Data Buku'){ ?> text-primary<?php }?>" href="<?= base_url('/admin/data-buku'); ?>">Data Buku</a></li>
                  <li><a class="nav-link <?php if($title == 'Tambah Buku'){ ?> text-primary<?php }?>" href="<?= base_url('/admin/tambah-buku') ?>">Tambah Buku</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown <?php if($title == 'Data Pinjaman' OR $title == 'Tambah Pinjaman'){ ?> text-primary <?php } echo 'none' ?>"><i class="fas fa-th"></i> <span>Peminjaman</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link <?php if($title == 'Data Pinjaman'){ ?> text-primary<?php }?>" href="<?= base_url('/admin/data-pinjaman') ?>">Data Pinjaman</a></li>
                  <li><a class="nav-link <?php if($title == 'Tambah Pinjaman'){ ?> text-primary<?php }?>" href="<?= base_url('/admin/tambah-pinjaman') ?>">Tambah Pinjaman</a></li>
                </ul>
              </li>
            <?php }?>
            </ul>
        </aside>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<?= $this->renderSection('content'); ?>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright Community @2021<div class="bullet"></div> SMKN 1 Ciamis
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
           window.location= '<?= base_url(); ?>/auth/logoutAdmin';
          }
        });
      });
    });
  </script>
  
  <script src="<?= base_url(); ?>/assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>/assets/js/custom.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/page/modules-datatables.js"></script>


</body>
</html>
