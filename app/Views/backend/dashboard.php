<?= $this->extend('extend/backend') ?>

<?= $this->section('content') ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <?php if(session()->get('status')=='Aktif') { ?>
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Anggota</h4>
                  </div>
                  <div class="card-body">
                    <?= $j_anggota ?>
                  </div>
                </div>
              </div>
            </div>
            <?php if (session()->get('level') == 'Admin'): ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Petugas</h4>
                  </div>
                  <div class="card-body">
                    <?= $j_petugas ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Buku Dipinjam</h4>
                  </div>
                  <div class="card-body">
                    <?= $j_pinjam ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Buku</h4>
                  </div>
                  <div class="card-body">
                    <?= $j_buku ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header bg-primary">
                  <h4 class="text-light">Anggota Belum Diizin</h4>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                    <?php foreach($anggota_baru as $row){ ?>
                    <li class="media d-flex">
                      <img class="me-3 rounded-circle" height="50" src="../assets/img/avatar/avatar-1.png" alt="avatar">
                      <div class="media-body">
                        <div class="media-title"><?= $row['nama'] ?></div>
                        <span class="text-small text-muted"><?= $row['email'] ?></span>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                  <div class="text-center pt-1 pb-1">
                    <a href="<?= base_url('admin/data-anggota') ?>">
                    <button type="btn" id="view" class="btn btn-primary btn-lg btn-round">
                      View All
                    </buttton>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php if (session()->get('status') == 'NonAktif'){ ?>
               <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-body">
                        <h1>Selamat Datang, <?= session()->get('username') ?>!</h1>
                        <p>Tunggu Admin untuk mengaktifkan akun Anda!</p>
                    </div>
                  </div>
            <?php } ?>
        </section>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          <?php if (session()->getFlashdata('login')){ ?>
            Swal.fire({
            title: 'Login Berhasil',
            showConfirmButton: false,
            timer: 1500,
            iconColor:'#6777ef',
            icon: 'success'
            });
          <?php } ?>
      </script>
<?= $this->endSection('content') ?>
