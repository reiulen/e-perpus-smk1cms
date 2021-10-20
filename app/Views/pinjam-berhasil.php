<?= $this->extend('extend/index')?>

<?= $this->section('content') ?>


<section class="bg-light">
    <div class="container">
        <div class="row py-5 mx-5">
            <div class="section-body">
            <div class="card card-primary">
              <div class="text-center mt-3 mx-2">
                <h3 style="font-weight:bold;">Form Peminjaman Buku Perpustakaan</h3>
                <h5>E-Perpus SMKN 1 Ciamis</h5>
                <hr>
                <img style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $id_buku ?>" class="img-thumbnail" src="<?= base_url('gambar-sampul') ?>/<?= $gambar ?>" width="250">
              </div>
              <div class="card-body">
                <table class="table">
                       <tr>
                           <th class="table-active">Nema Peminjam</th>
                           <td><?= $nama ?></td>
                       </tr>
                       <tr>
                           <th class="table-active">Email</th>
                           <td><?= $email?></td>
                       </tr>
                        <tr>
                           <th class="table-active">Kelas</th>
                           <td><?= $kelas ?></td>
                       </tr>
                        <tr>
                           <th class="table-active">Judul Buku</th>
                           <td><?= $j_buku ?></td>
                       </tr>
                       <tr>
                           <th class="table-active">Tanggal Peminjaman</th>
                           <td><?= date('d F Y', strtotime($tgl_pinjam)) ?></td>
                       </tr>
                        <tr>
                           <th class="table-active">Tanggal Pengembalian</th>
                           <td><?= date('d F Y', strtotime($tgl_kembali)) ?></td>
                       </tr>
                </table>
              </div>
              <a class="text-center mt-2 mb-5" href="<?= base_url('/pinjam-buku/pinjam-berhasil/cetak-pinjaman/us') ?>">
                    <button class="btn btn-primary col-6 py-2"><i class="fa fa-file px-2"></i>Cetak Pinjaman</button>
                </a>
            </div>
          </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $id_buku ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content  shadow-none" style="background:none !important;">
        <img src="<?= base_url('gambar-sampul') ?>/<?= $gambar ?>" class="img-thumbnail">
    </div>
  </div>
</div>

<?= $this->endsection('content') ?>