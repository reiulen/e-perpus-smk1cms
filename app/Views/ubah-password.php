<?= $this->extend('extend/index'); ?>

<?= $this->section('content'); ?>
<body>
  <div id="app">
    <section class="section" style="background: transparent !important;">
      <div class="container my-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-4 col-lg-4 col-xl-4 header-register my-5 offset-md-1 ">

          <?= session()->getFlashdata('pesan'); ?>

            <div class="card card-primary ">
              <div class="card-header mb-0 pb-0">
                  <h5>Ubah Password</h5>
            </div>
              <div class="card-body pt-0">
                <p><?= session()->get('email'); ?></p>
                <form method="POST" action="<?= base_url('authF/changeps') ?>" class="needs-validation" novalidate="">
                <input type="hidden" name="id" value="<?= session()->get('id') ?>">
                  <div class="form-group">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control" name="password1" required autofocus>
                          <div id="kon1" class="m-1 text-danger text-small"></div>
                          <div class="invalid-feedback text-small">
                             *Password belum diisi!
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="password2" class="d-block">Konfirmasi Password</label>
                      <input id="password2" type="password" class="form-control" name="password2" required autofocus>
                          <div id="kon2" class="m-1 text-danger text-small "></div>
                          <div class="invalid-feedback text-small">
                             *Konfirmasi password belum diisi!
                          </div>
                    </div>
                  <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                      Ubah Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy;Community @2021
            </div>
          </div>
          <div class="col-md-7 d-none d-md-block">
              <h1 class="text-primary text-center">Meminjam buku Perpustakaan<br> dengan kemudahan</h1>
            <img src="<?=  base_url('assets/content/header.svg') ?>">
          </div>
        </div>
      </div>
    </section>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $("#password").keyup(function(){
            var password = $("#password").val();
            var jumlahkarakter = password.length;
            if(jumlahkarakter < 8){
                $("#kon1").html("Password terlalu pendek");
            }
            else{
                $("#kon1").html("<span style='color:green'>Bagus!</span>");
            }
        });

        $("#password2").blur(function(){
            var password1 = $("#password").val();
            var password2 = $("#password2").val();
            
            if(password2 != password1){
                $("#kon2").html("Password tidak cocok");
                $("#password2").val('');
            }
            else{
                $("#kon2").html("<span style='color:green'>Password cocok</span>");
            }
        });
    </script>

<?= $this->endsection('content'); ?>