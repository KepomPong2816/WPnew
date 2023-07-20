<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container" style="padding-top: 5rem; padding-bottom: 3rem;">
    <div class="card">
        <h2 class="card-header">Daftar Barang</h2>
        <div class="container text-center">
            <div class="row row-cols-2">
                <?php foreach ($rekomendasi as $b) : ?>
                    <div class="col" style="padding-top: 30px;">
                        <div class="card mb-3 ms-3 tem" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="/Img/<?= $b['foto_barang']; ?>" class="img-fluid rounded-start" alt="..." style="max-height: 200px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $b['nama_barang']; ?></h5>
                                        <p class="card-text">Stok tersisa: <?= $b['stock']; ?></p>
                                        <p class="card-text">Rp.<?= $b['harga']; ?></p>
                                        <p><a href="<?= base_url('toko/' . $b['id_toko']); ?>" class="link-info link-offset-2 link-underline link-underline-opacity-0">Toko: <?= $b['nama_toko']; ?></a></p>
                                        <a href="<?= base_url('/pembeli/tambah-ke-keranjang/' . $b['id_barang']); ?>" class="btn btn-outline-primary"><img src="/Img/keranjang.png" id="keranjang" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
                                        <a href="<?= base_url('/barang/detail/' . $b['id_barang']); ?>" class="btn btn-outline-info">Detail Barang</a>
                                        <p class="card-text"><small class="text-body-secondary">Terakhir diubah oleh penjual <?= $b['updated_at']; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>