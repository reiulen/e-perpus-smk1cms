<?= $this->extend('extend/backend.php') ?>

<?= $this->section('content') ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pinjaman</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url();?>/admin/dashboard">Admin</a></div>
              <div class="breadcrumb-item">Data Pinjaman</div>
            </div>
          </div>

          <div class="section-body">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a type="btn" class="btn btn-primary btn-lg" href="<?= base_url(); ?>/admin/tambah-buku">Tambah Pinjaman</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="table-1" class="table" style="width:100%">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Nama Peminjam</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Judul Buku</th>
                            <th>Gambar Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>  
                            <th>Aksi</th>        
                          </tr>
                        </thead>
                        <tbody>
                          <?php  $no = 1; foreach($pinjaman as $row): ?>
                            <tr>
                              <td class="text-center">
                                <?= $no++; ?>
                              </td>
                              <td><?= $row['nama_peminjam'] ?></td>
                              <td><?= $row['email'] ?></td>
                              <td><?= $row['kelas'] ?></td>
                              <td><?= $row['judul_buku']; ?></td>
                              <td><img src="<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku'] ?>"   data-bs-toggle="modal" data-bs-target="#gambar<?= $row['id'] ?>" class="img-thumbnail" style="width:150px; border-radius:6px; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3); cursor:pointer;"></td>
                              <td><?= date('d F Y', strtotime($row['tgl_pinjam']));  ?></td>
                              <td><?= date('d F Y', strtotime($row['tgl_kembali']));  ?></td>
                              <td>
                                <form action="<?= base_url('frontend/cetakpinjaman/aks') ?>" method="post">
                                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                  <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-file"></i>Print</button>
                                </form>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#detail<?= $row['id']; ?>"  class="btn btn-success btn-sm p-1"><i class="fa fa-eye m-1"></i>Detail</a><br>
                                <a href="#" onclick="konfirmasi('<?= $row['id']; ?>');" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash m-1"></i>Hapus</a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>


<!-- Modal -->
<?php foreach($pinjaman as $row) { ?>
<div class="modal fade" id="gambar<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content  shadow-none" style="background:none !important;">
        <img src="<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku'] ?>" class="img-thumbnail">
    </div>
  </div>
</div>

<div class="modal fade" id="detail<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Detail Buku</h5>
        <button type="button" class="btn btn-danger mb-2" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
        <div class="modal-body">
          <table class="table">
              <tr>
                <th class="table-active">Nama</th>
                <td><?= $row['nama_peminjam'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Email</th>
                <td><?= $row['email'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Kelas</th>
                <td><?= $row['kelas'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Judul Buku</th>
                <td><?= $row['judul_buku'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Gambar</th>
                <td><img src="<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku'] ?>" class="img-thumbnail" width="250"></td>
              </tr>
              <tr>
                <th class="table-active">Tanggal Peminjaman</th>
                <td><?= date('d F Y', strtotime($row['tgl_pinjam']));  ?></td>
              </tr>
              <tr>
                <th class="table-active">Tanggal Pengembalian</th>
                <td><?= date('d F Y', strtotime($row['tgl_kembali']));  ?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>




      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          <?php if (session()->getFlashdata('icon')){ ?>
            Swal.fire({
            title: '<?= session()->getFlashdata('title'); ?>',
            showConfirmButton: false,
            iconColor:'#6777ef',
            timer: 1500,
            icon: '<?= session()->getFlashdata('icon'); ?>'
            });
          <?php } ?>
          
          function konfirmasi(parameter_id_buku){
              Swal.fire({
                  title: 'Apakah Yakin?',
                  text: "Data Buku Akan Terhapus!",
                  icon: 'warning',
                  showCancelButton: true,
                  iconColor:'red',
                  confirmButtonColor: '#6777ef',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Hapus',
                  cancelButtonText: 'Batal'
                }).then((result) => {
                  if (result.isConfirmed) {
                  window.location.href="<?= base_url();?>/auth/hapusPinjaman/"+parameter_id_buku;
                  }
              });
            }
              
      </script>


<?= $this->endSection('content') ?>