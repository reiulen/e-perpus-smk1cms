<?= $this->extend('extend/backend') ?>

<?= $this->section('content') ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Petugas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/dashboard">Admin</a></div>
              <div class="breadcrumb-item">Tambah Petugas</div>
            </div>
          </div>

          <div class="section-body">
            <div class="card card-primary">
              <div class="text-center mt-3">
                <h1 style="font-weight:bold;">Pendaftaran Petugas</h1>
                <hr>
              </div>
              <div class="card-body">
                <?= session()->getFlashdata('pesan'); ?>
                <?= $validate->listErrors() ?>
                <form method="POST" action="<?= base_url(); ?>/auth/tambahPetugas" class="needs-validation" novalidate="">
                    <div class="form-group">
                        <label for="namaL">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="namaL" placeholder="Nama Lengkap" required autofocus>
                        <div id="namaK" class="m-1"></div>
                         <div class="invalid-feedback">
                          Nama harus diisi !
                         </div>
                    </div>
                    <div class="form-group">
                        <label for="namaL">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" required autofocus>
                         <div id="konfirmasi" class="m-1"></div>
                         <div class="invalid-feedback">
                          Username harus diisi !
                         </div>
                    </div>
                    <div class="d-flex">
                      <div class="form-group col-md-6 mx-2">
                        <label for="inputPassword1">Password</label>
                        <input type="password" name="password1" class="form-control pwstrength" data-indicator="pwindicator" id="password" placeholder="Password" required autofocus>
                        <div id="kon1" class="m-1"></div>
                        <div class="invalid-feedback">
                          Password harus diisi !
                        </div>
                      </div>
                      <div class="form-group col-md-6 mx-2">
                        <label for="inputPassword2">Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password" required autofocus>
                        <div class="invalid-feedback">
                          Konfirmasi password harus diisi !
                        </div>
                        <div id="kon2" class="m-1"></div>
                      </div>
                    </div>
                    <div class="d-flex my-3">
                        <div class="form-group m-1">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg">Simpan</button>
                        </div>
                  </form>
                        <div class="form-group m-1">
                            <button type="submit" name="submit" id="batal" class="btn btn-danger btn-lg">Batal</button>
                        </div>
                    </div>
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

        $("#username").keyup(function(){
            var username = $("#username").val();
            var jumlahkarakter = username.length;
            if(jumlahkarakter < 6){
                $("#konfirmasi").html("<span style='color:red'>Username Terlalu Pendek</span>");
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
                $("#kon1").html("<span style='color:red'>Password terlalu pendek</span>");
            }
            else{
                $("#kon1").html("<span style='color:green'>Bagus!</span>");
            }
        });

        $("#password2").blur(function(){
            var password1 = $("#password").val();
            var password2 = $("#password2").val();
          
            if(password2 != password1){
                $("#kon2").html("<span style='color:red'>Password tidak cocok</span>");
                $("#password2").val('');
            }
            else{
                $("#kon2").html("<span style='color:green'>Password cocok</span>");
            }
        });
      </script>
  
      <?= $this->endSection('content') ?>