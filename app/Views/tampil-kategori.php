<?php foreach($all_buku as $row){ ?>
<div class="col-lg-3 col-md-6 col-sm-6 card vanillatilt"  style="background-image: url(<?= base_url('gambar-sampul') ?>/<?= $row['gambar_buku']; ?>); background-size:cover;">
    <a class="text-decoration-none" href="<?= base_url('detail-buku') ?>/<?= strtolower(str_replace(" ", "-", $row['judul_buku'])) ?>">
        <div class="content">
            <h4><?= $row['judul_buku']; ?><h4>
            <a class="lihat-selengkapnya" href="<?= base_url('detail-buku') ?>/<?= strtolower(str_replace(" ", "-", $row['judul_buku'])) ?>">Lihat Buku</a>
        </div>
    </a>
</div>
<?php } ?>
<script type="text/javascript">
	VanillaTilt.init(document.querySelectorAll(".vanillatilt"), {
		max: 25,
		speed: 400,
        glare: true,
        "max-glare" : 1
	});
    VanillaTilt.init(document.querySelectorAll(".col-md-6"), {
        max: 35,
        speed: 400
    });
</script>