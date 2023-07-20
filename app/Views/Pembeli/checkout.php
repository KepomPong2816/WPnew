<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<img src="<?= base_url('Img/BG.png'); ?>" class="bg-background">
<div class="container" style="padding-top: 5rem;">
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2 class="my-3">Total</h2>

                    <?php echo form_open('pembeli/pesanan'); ?>
                    <?php if (session()->has('err')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo session('err'); ?>
                    </div>
                    <?php endif; ?>
                    <?= csrf_field(); ?>

                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $total?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Jam Kirim</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="harga" name="harga" value="<?= $waktu?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Tanggal Kirim</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="harga" name="harga" value="<?= $tanggal?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto_bukti" class="col-sm-2 col-form-label">Foto Bukti Transfer</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto_bukti" name="foto_bukti"
                                value="<?= old('foto_bukti'); ?>" onchange="previewImg()">
                        </div>
                        <?php if (isset($validation) && $validation->hasError('foto_bukti')) : ?>
                        <div class="invalid-feedback">
                            <?php echo $validation->getError('foto_bukti'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 col-sm-12 ml-1">Konfirmasi</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="col" style="padding-left: 4rem; padding-top: 2rem;">
                    <div class="card mb-3" style="max-width: 300px;">
                        <div class="md-4 container">
                            <img src="/Img/kecap.jpg" class="img-thumbnail img-preview" style="max-height: 350px;">
                            <label class="custom-file-label container" for="foto_bukti"
                                value="<?= old('foto_bukti'); ?>" hidden>Pilih Gambar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- js for image preview -->
        <script>
        function previewImg() {
            const sampul = document.querySelector('#foto_bukti');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
        </script>
        <?= $this->endSection(); ?>