<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<img src="<?= base_url('Img/BG.png'); ?>" class="bg-background">
<div class="container" style="padding-top: 5rem;">
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2 class="my-3">Ubah Profil</h2>

                    <?php echo form_open_multipart('pembeli/ubah_profil/simpan/' . $b_detail['id_pembeli']); ?>
                    <?php if (session()->has('err')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo session('err'); ?>
                        </div>
                    <?php endif; ?>
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?php echo (isset($validation) && $validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $b_detail['nama']; ?>">
                            <?php if (isset($validation) && $validation->hasError('nama')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telepon" class="col-sm-2 col-form-label">telepon</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control <?= (isset($validation) && $validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="telepon" name="telepon" value="<?= $b_detail['telepon']; ?>">
                            <?php if (isset($validation) && $validation->hasError('telepon')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telepon'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <div class="d-flex">
                                <select class="form-select" name="kecamatan" id="kecamatan">
                                    <?php foreach ($kecamatan as $k) : ?>
                                        <option value="<?= $k['id_kecamatan']; ?>" placeholder="Pilih Kecamatan"><?= $k['nama_kecamatan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select class="form-select" name="desa" id="desa">
                                    <?php foreach ($desa as $d) : ?>
                                        <option value="<?= $d['id_desa']; ?>" placeholder="Pilih Desa"><?= $d['nama_desa']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <textarea name="alamat" class="form-control <?= (isset($validation) && $validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= $b_detail['alamat']; ?>"></textarea>
                            <small id="emailHelp" class="form-text text-muted">Pastikan alamat yang anda masukkan sesuai dengan yang semestinya</small>
                            <?php if (isset($validation) && $validation->hasError('alamat')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto_pembeli" class="col-sm-2 col-form-label">Foto profil</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto_pembeli" name="foto_pembeli" value="<?= $b_detail['foto_pembeli']; ?>" onchange="previewImg()">
                        </div>
                        <?php if (isset($validation) && $validation->hasError('foto_pembeli')) : ?>
                            <div class="invalid-feedback">
                                <?php echo $validation->getError('foto_pembeli'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 col-sm-12 ml-1">Ubah</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="col" style="padding-left: 4rem; padding-top: 2rem;">
                    <div class="card mb-3" style="max-width: 300px;">
                        <div class="md-4 container">
                            <img src="/Img/<?= $b_detail['foto_pembeli']; ?>" class="img-thumbnail img-preview" style="max-height: 350px;">
                            <label class="custom-file-label container" for="foto_pembeli" value="<?= old('foto_pembeli'); ?>" hidden>Pilih Gambar</label>
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
                const sampul = document.querySelector('#foto_pembeli');
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