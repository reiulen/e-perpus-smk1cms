<?= $this->extend('extend/login'); ?>

<?= $this->section('content'); ?>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">E-Perpus</span></h4>
            
            <form method="POST" action="auth/loginadmin" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="email">Username</label>
                <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                <p class="text-dark"><?= session()->get('pesanUsername') ?></p>
                <div class="invalid-feedback">
                  Please fill in your username
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required autofocus>
                <p class="text-dark"><?= session()->get('pesanPassword') ?></p>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Masuk
                </button>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy;Community @2021
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Welcome to E-Perpus</h1>
                <h5 class="font-weight-normal text-muted-transparent">Ciamis, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="<?= base_url('assets/content/bg-header.jpg') ?>">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          <?php if (session()->getFlashdata('warning')){ ?>
            Swal.fire({
            title: '<?= session()->getFlashdata('title'); ?>',
            iconColor:'<?= session()->getFlashdata('color');?>',
            showConfirmButton: false,
            timer: 1500,
            icon: '<?= session()->getFlashdata('icon'); ?>'
            });
          <?php } ?>
      </script>

<?= $this->endSection('content'); ?>
