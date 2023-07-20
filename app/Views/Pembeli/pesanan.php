<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<style>
.container {
    text-align: center;
    margin-top: 100px;
}

.kuantitas {
    font-size: 24px;
}

.tersisa {
    font-size: 18px;
    color: gray;
}

.input-group {
    display: flex;
    align-items: center;
    justify-content: center;

}

.input-group .btn {
    margin: 0 5px;
    display:
}
</style>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">

                <div class="card" style="left: auto">
                    <h2 class="card-header">Daftar Barang</h2>
                    <?php foreach ($keranjang as $b) : ?>
                    <div class="row g-0 center">

                        <div class="col-md-3">
                            <img src="/Img/<?= $b['foto_barang']; ?>" class="img-fluid rounded-start" alt="..."
                                style="max-height: 150px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" id="<?= $b['id_barang']; ?>br"><?= $b['nama_barang']; ?></h5>
                                <p>Status : Dalam Perjalanan</p>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </div>
</body>

<?= $this->endSection(); ?>