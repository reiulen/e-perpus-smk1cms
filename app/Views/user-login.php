<?= $this->extend('extend/index'); ?>

<?= $this->section('content'); ?>
<body>
  <div id="app">
    <section class="section" style="background: transparent !important;">
      <div class="container my-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-4 col-lg-4 col-xl-4 header-register my-5 offset-md-1 ">

          <?= session()->getFlashdata('verify'); ?>

            <div class="card card-primary ">
              <div class="card-header"><h5>Masuk Anggota E-Perpus</h5></div>
              <div class="card-body pt-0">

                <form method="POST" action="<?= base_url('authF/loginUser') ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="nama">Email</label>
                    <input type="email" class="form-control" name="email" required autofocus>
                       <?= session()->getFlashdata('email'); ?>
                        <div class="invalid-feedback text-small">
                          *Email Belum Diisi !
                        </div>
                  </div>

                    <div class="form-group">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" name="password" class="form-control" required autofocus>
                          <p class="text-danger text-small"><?= session()->getFlashdata('pesanPassword'); ?></p>
                          <div class="invalid-feedback text-small">
                            *Password Harus Diisi !
                          </div>
                    </div>
                  <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                      Masuk
                    </button>
                  </div>
                </form>
                  <div class="text-center">
                    <a class="p-1" href="<?= base_url('lupa-password') ?>">Lupa password?</a><br>
                    Belum punya akun?<a class="p-1" href="<?= base_url('register') ?>">Daftar</a>
                  </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy;Community @2021
            </div>
          </div>
          <div class="col-md-7 d-none d-md-block mt-0 pt-0">
            <h1 class="text-primary text-center">Meminjam buku Perpustakaan<br> dengan kemudahan</h1>
            <img src="<?=  base_url('assets/content/login.svg') ?>" height="450">
          </div>
        </div>
      </div>
    </section>
  </div>

<?= $this->endsection('content'); ?>