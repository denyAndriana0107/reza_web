<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data</h2>
            <form action="/sumur/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="kota" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_perusahaan')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_perusahaan'); ?>" id="nama_perusahaan" name="nama_perusahaan" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_perusahaan'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <div id="geocoder" class="geocoder">
                        </div>
                        <div id='map' class="center">
                        </div>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="alamat_perusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat_perusahaan')) ? 'is-invalid' : ''; ?>" value="<?= old('alamat_perusahaan'); ?>" id="alamat_perusahaan" name="alamat_perusahaan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_perusahaan'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" value="<?= old('lokasi'); ?>" id="lokasi" name="lokasi">
                        <div class="invalid-feedback">
                            <?= $validation->getError('lokasi'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="koordinat" class="col-sm-2 col-form-label">Koordinat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('koordinat')) ? 'is-invalid' : ''; ?>" value="<?= old('koordinat'); ?>" id="koordinat" name="koordinat">
                        <div class="invalid-feedback">
                            <?= $validation->getError('koordinat'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomor_registrasi" class="col-sm-2 col-form-label">Nomor Registrasi</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('nomor_registrasi')) ? 'is-invalid' : ''; ?>" value="<?= old('nomor_registrasi'); ?>" id="nomor_registrasi" name="nomor_registrasi">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nomor_registrasi'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kegunaan_air" class="col-sm-2 col-form-label">Kegunaan Air</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kegunaan_air')) ? 'is-invalid' : ''; ?>" value="<?= old('kegunaan_air'); ?>" id="kegunaan_air" name="kegunaan_air">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kegunaan_air'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah_max" class="col-sm-2 col-form-label">Jumlah Maximal</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('jumlah_max')) ? 'is-invalid' : ''; ?>" value="<?= old('jumlah_max'); ?>" id="jumlah_max" name="jumlah_max">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jumlah_max'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kedalaman_bor" class="col-sm-2 col-form-label">Kedalaman Bor</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('kedalaman_bor')) ? 'is-invalid' : ''; ?>" value="<?= old('kedalaman_bor'); ?>" id="kedalaman_bor" name="kedalaman_bor">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kedalaman_bor'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kedalaman_aquifer" class="col-sm-2 col-form-label">Kedalaman Aquifer</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('kedalaman_aquifer')) ? 'is-invalid' : ''; ?>" value="<?= old('kedalaman_aquifer'); ?>" id="kedalaman_aquifer" name="kedalaman_aquifer">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kedalaman_aquifer'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kedalaman_pompa" class="col-sm-2 col-form-label">Kedalaman Pompa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('kedalaman_pompa')) ? 'is-invalid' : ''; ?>" value="<?= old('kedalaman_pompa'); ?>" id="kedalaman_pompa" name="kedalaman_pompa">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kedalaman_pompa'); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">Upload Foto</label>
                    <div class="col-sm-2">
                        <img src="/image/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="sampul">Pilih Gambar</label>
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>