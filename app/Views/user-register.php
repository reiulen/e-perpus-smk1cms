<?= $this->extend('extend/index'); ?>

<?= $this->section('content'); ?>
<body>
  <div id="app">
    <section class="section" style="background: transparent !important;">
      <div class="container my-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6 header-register">

            <div class="card card-primary ">
              <div class="card-header"><h3>Daftar Anggota E-Perpus</h3></div>
              <div class="card-body">
                <?= session()->getFlashdata('pesan') ?>
                <?= session()->getFlashdata('salah') ?>

                <form method="POST" action="<?= base_url('authF/daftarUser'); ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="namaL" type="name" class="form-control <?= ($validate->hasError('nama')) ? 'is-invalid' : '' ; ?>" name="nama" required autofocus>
                        <div id="namaK" class="m-1 text-small"></div>
                        <div class="invalid-feedback text-small">
                          <?= $validate->getError('nama'); ?>
                        </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">Email</label>
                    <input id="namaL" type="email" class="form-control <?= ($validate->hasError('email')) ? 'is-invalid' : '' ; ?>" name="email"  required autofocus>
                        <div id="namaK" class="m-1 text-small"></div>
                        <div class="invalid-feedback text-small">
                          <?= $validate->getError('email') ?>
                        </div>
                  </div>
                    <div class="form-group">
                      <label for="nis">NIS</label>
                      <input id="idnis" type="text" class="form-control <?= ($validate->hasError('nis')) ? 'is-invalid' : '' ; ?>" name="nis" required autofocus>
                      <div id="konNis" class="m-1 text-danger text-small">*harap cantumkan nis yang benar!</div>
                        <div class="invalid-feedback text-small ">
                            <?= $validate->getError('nis'); ?>
                        </div>
                    </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength <?= ($validate->hasError('password1')) ? 'is-invalid' : '' ; ?>" data-indicator="pwindicator" name="password1" required autofocus>
                          <div id="kon1" class="m-1 text-danger text-small"></div>
                          <div class="invalid-feedback text-small">
                            <?= $validate->getError('password1') ?>
                          </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Konfirmasi Password</label>
                      <input id="password2" type="password" class="form-control" name="password2" required autofocus>
                          <div id="kon2" class="m-1 text-danger text-small <?= ($validate->hasError('password2')) ? 'is-invalid' : '' ; ?>"></div>
                          <div class="invalid-feedback text-small">
                            <?= $validate->getError('password2') ?>
                          </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required autufocus>
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                          <div id="kon2" class="m-1"></div>
                          <div class="invalid-feedback">
                            Harus Disetujui !
                          </div>
                    </div>
                  </div>

                  <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                      Daftar
                    </button>
                  </div>
                </form>
                <div class="text-center">
                    <a class="p-1" href="<?= base_url('lupa-password') ?>">Lupa password?</a><br>
                    Sudah punya akun?<a class="p-1" href="<?= base_url('login') ?>">Login</a>
                </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy;Community @2021
            </div>
          </div>
          <div class="col-md-6 d-none d-md-block">
              <h5>Mari Memulai dengan E-Perpus</h5>
              <h1 class="text-primary">Meminjam buku Perpustakaan<br> dengan kemudahan</h1>
            <img src="<?=  base_url('assets/content/daftar.svg') ?>">
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        $(document).ready(function(){
          $('#batal').click(function(){
            Swal.fire({
              title: 'Apakah Yakin?',
              text: "Kamu akan keluar dari halaman tambah petugas!",
              icon: 'warning',
              showCancelButton: true,
              iconColor:'red',
              confirmButtonColor: '#6777ef',
              cancelButtonColor: 'red',
              confirmButtonText: 'Keluar',
              cancelButtonText: 'Batal'
            }).then((result) => {
              if (result.isConfirmed) {
              window.location= '<?= base_url(); ?>/admin/data-petugas';
              }
            });
          });
        });
         
        $("#namaL").keyup(function(){
            var username = $("#namaL").val();
            if(username == ''){
                $("#namaK").html("<span style='color:red'>Nama Harus Diisi</span>");
            }
        });

        $("#idnis").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });	
       
        

        $("#username").keyup(function(){
            var username = $("#username").val();
            var jumlahkarakter = username.length;
            if(jumlahkarakter < 6){
                $("#konfirmasi").html("Username Terlalu Pendek");
            }
            else if(jumlahkarakter > 24){
                $("#konfirmasi").html("<span style='color:red'>Username Terlalu Panjang</span>");
            }
            else{
                if(username.match(/[^a-zA-Z0-9]/i))
                    $("#konfirmasi").html("<span style='color:red'>Anda memasukkan karakter yang tidak diijinkan</span>");
                else
                    $("#konfirmasi").html("<span style='color:green'>Bagus!</span>");
            }
        });

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