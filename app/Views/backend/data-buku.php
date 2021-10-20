\<?= $this->extend('extend/backend'); ?>

<?= $this->section('content'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Buku</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url();?>/admin/dashboard">Admin</a></div>
              <div class="breadcrumb-item">Data Buku</div>
            </div>
          </div>

          <div class="section-body">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a type="btn" class="btn btn-primary btn-lg" href="<?= base_url(); ?>/admin/tambah-buku">Tambah Buku</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="table-1" class="table" style="width:100%">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Judul Buku</th>
                            <th>Gambar Buku</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Buku</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Kategori</th>
                            <th>Aksi</th>          
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; foreach($databuku as $row): ?>
                            <tr>
                              <td class="text-center">
                                <?= $no++; ?>
                              </td>
                              <td><?= $row['judul_buku']; ?></td>
                              <td style="cursor:pointer;"><img src="<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku'] ?>" data-bs-toggle="modal" data-bs-target="#gambar<?= $row['id_buku'] ?>" class="img-thumbnail" style="width:150px; border-radius:6px; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);"></td>
                              <td><?= substr($row['deskripsi'], 0,300) ?></td>
                              <td><?= $row['jumlah_buku'] ?></td>
                              <td>12</td>
                              <td><?= $row['kategori'] ?></td>
                              <td>
                                <a  href="<?= base_url('admin/edit-buku') ?>/<?= $row['id_buku']; ?>"  class="btn btn-primary btn-sm m-1"><i class="fas fa-edit m-1"></i>Edit</a><br>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#detail<?= $row['id_buku']; ?>"  class="btn btn-success btn-sm m-1"><i class="fa fa-eye m-1"></i>Detail</a><br>
                                <a href="#" onclick="konfirmasi('<?= $row['id_buku']; ?>');" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash m-1"></i>Hapus</a>
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
<?php foreach($databuku as $row) { ?>
<div class="modal fade" id="gambar<?= $row['id_buku']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content  shadow-none" style="background:none !important;">
        <img src="<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku'] ?>" class="img-thumbnail">
    </div>
  </div>
</div>

<div class="modal fade" id="detail<?= $row['id_buku']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Detail Buku</h5>
        <button type="button" class="btn btn-danger mb-2" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
        <div class="modal-body">
          <table class="table">
              <tr>
                <th class="table-active">Judul</th>
                <td><?= $row['judul_buku'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Pengarang</th>
                <td><?= $row['pengarang'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Penerbit</th>
                <td><?= $row['penerbit'] ?></td>
              </tr>
              <tr>
                <th class="table-active">ISBN</th>
                <td><?= $row['isbn'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Kategori</th>
                <td><?= $row['kategori'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Jumlah Buku</th>
                <td><?= $row['jumlah_buku'] ?></td>
              </tr>
              <tr>
                <th class="table-active">Gambar</th>
                <td><img src="<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku'] ?>" class="img-thumbnail" width="250"></td>
              </tr>
              <tr>
                <th class="table-active">Deskripsi</th>
                <td><?= $row['deskripsi'] ?></td>
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
                  window.location.href="<?= base_url();?>/auth/hapusBuku/"+parameter_id_buku;
                  }
              });
            }
              
      </script>

  <?= $this->endsection('content'); ?>
