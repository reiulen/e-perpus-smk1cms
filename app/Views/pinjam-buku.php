<?= $this->extend('extend/index.php') ?>

<?= $this->section('content') ?>
<div class="pinjam-buku my-5">
    <div class="container">
        <div class="card card-primary">
            <div class="text-center mt-3">
                <h1 style="font-weight:bold;">Form Peminjaman Buku</h1>
                <hr>
            </div>
              <div class="card-body">
                <?= session()->getFlashdata('pesan'); ?>
                <form method="POST" action="<?= base_url(); ?>/authf/tambahPinjaman/<?= $buku['judul_buku'] ?>" class="needs-validation" novalidate="">
                <div class="form-group text-center"  data-bs-toggle="modal" data-bs-target="#exampleModal<?= $buku['id_buku'] ?>">
                <input type="hidden" name="nama" value="<?= session()->get('nama'); ?>">
                <input type="hidden" name="link" value="<?= base_url('pinjam-buku') ?>?buku=<?= strtolower(str_replace(" ", "-", $buku['judul_buku'])) ?>">
                    <img src="<?= base_url('gambar-sampul') ?>/<?= $buku['gambar_buku'] ?>" width="250" class="img-thumbnail">
                    <h3 class="mt-4"><?= $buku['judul_buku'] ?></h3>
                </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                            <select class="form-control" name="kelas" required autofocus>
                                <option value="X-Akutansi" >X Akutansi</option>
                                <option value="X-BDP" >X BDP</option>
                                <option value="X-Perkantoran" >X Perkantoran</option>
                                <option value="X-Perhotelan" >X Perhotelan</option>
                                <option value="X-Multimedia" >X MM</option>
                                <option value="X-RPL" >X RPL</option>
                                <option value="X-TataBoga" >X Tata Boga</option>
                                <option value="XI-Akutansi" >XI Akutansi</option>
                                <option value="XI-BDP" >XI BDP</option>
                                <option value="XI-Perkantoran" >XI Perkantoran</option>
                                <option value="XI-Perhotelan" >XI Perhotelan</option>
                                <option value="XI-Multimedia" >XI MM</option>
                                <option value="XI-RPL" >XI RPL</option>
                                <option value="XI-TataBoga" >XI Tata Boga</option>
                                <option value="XII-Akutansi" >XII Akutansi</option>
                                <option value="XII-BDP" >XII BDP</option>
                                <option value="XII-Perkantoran" >XII Perkantoran</option>
                                <option value="XII-Perhotelan" >XII Perhotelan</option>
                                <option value="XII-Multimedia" >XII MM</option>
                                <option value="XII-RPL" >XII RPL</option>
                                <option value="XII-TataBoga" >XII Tata Boga</option>
                            </select>
                        <div id="namaK" class="m-1"></div>
                         <div class="invalid-feedback <?= ($validate->hasError('kelas')) ? 'is_invalid' : ' ' ?>">
                                <?= $validate->getError('kelas'); ?>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="date">Pilih Tanggal Peminjaman</label>
                            <duet-date-picker identifier="date" name="tglpinjam" min="<?= date("Y-m-d"); ?>" required autofocus>
                            </duet-date-picker>
                            <div class="invalid-feedback <?= ($validate->hasError('tglpinjam')) ? 'is_invalid' : ' ' ?>">
                                <?= $validate->getError('tglpinjam'); ?>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="date">Pilih Tanggal Pengembalian</label>
                            <duet-date-picker identifier="date" name="tglkembali" min="<?= date("Y-m-d", strtotime("+1 days")); ?>"  required autofocus>
                            </duet-date-picker>
                            <div class="invalid-feedback <?= ($validate->hasError('tglpinjam')) ? 'is_invalid' : ' ' ?>">
                                <?= $validate->getError('tglkembali'); ?>
                            </div>
                        </div>
                    </div>
                        <div class="form-group m-1 col-6 mx-auto">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg col-12">Pinjam</button>
                        </div>
                    </form>
                    <div class="form-group m-1 col-6 mx-auto">
                        <button onclick="konfirmasi('<?= strtolower(str_replace(' ', '-', $buku['judul_buku'])) ?>');" class="btn btn-danger btn-lg col-12">Batal</button>
                    </div>
              </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $buku['id_buku'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content  shadow-none" style="background:none !important;">
        <img src="<?= base_url('gambar-sampul') ?>/<?= $buku['gambar_buku'] ?>" class="img-thumbnail">
    </div>
  </div>
</div>


      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
            function konfirmasi(parameter_id_buku){
              Swal.fire({
                  title: 'Apakah Yakin?',
                  text: "Kamu akan keluar dari form peminjaman buku",
                  icon: 'warning',
                  showCancelButton: true,
                  iconColor:'red',
                  confirmButtonColor: '#6777ef',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Keluar',
                  cancelButtonText: 'Batal'
                }).then((result) => {
                  if (result.isConfirmed) {
                  window.location.href="<?= base_url();?>/detail-buku/"+parameter_id_buku;
                  }
              });
            }
              
      </script>
<?= $this->endsection('content'); ?>