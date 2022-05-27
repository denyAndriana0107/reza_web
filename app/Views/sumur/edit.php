<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Ubah Data</h2>
            <form action="/sumur/update/<?= $sumur['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="sampulLama" value="<?= $sumur['foto'] ?>">
                <div class="form-group row">
                    <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" <?= ($validation->hasError('nama_perusahaan')) ? 'is-invalid' : ''; ?> id="nama_perusahaan" name="nama_perusahaan" autofocus value="<?= (old('nama_perusahaan')) ? old('nama_perusahaan') : $sumur['nama_perusahaan']; ?>">
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
                        <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" value="<?= $sumur['alamat_perusahaan']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $sumur['lokasi']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="koordinat" class="col-sm-2 col-form-label">Koordinat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="koordinat" name="koordinat" value="<?= $sumur['koordinat']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomor_registrasi" class="col-sm-2 col-form-label">Nomor Registrasi</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nomor_registrasi" name="nomor_registrasi" value="<?= $sumur['nomor_registrasi']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kegunaan_air" class="col-sm-2 col-form-label">Kegunaan Air</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kegunaan_air" name="kegunaan_air" value="<?= $sumur['kegunaan_air']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah_max" class="col-sm-2 col-form-label">Jumlah Maksimal</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jumlah_max" name="jumlah_max" value="<?= $sumur['jumlah_max']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kedalaman_bor" class="col-sm-2 col-form-label">Kedalaman Bor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kedalaman_bor" name="kedalaman_bor" value="<?= $sumur['kedalaman_bor']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kedalaman_aquifer" class="col-sm-2 col-form-label">Kedalaman Aquifer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kedalaman_aquifer" name="kedalaman_aquifer" value="<?= $sumur['kedalaman_aquifer']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kedalaman_pompa" class="col-sm-2 col-form-label">Kedalaman Pompa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kedalaman_pompa" name="kedalaman_pompa" value="<?= $sumur['kedalaman_pompa']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">Upload Foto</label>
                    <div class="col-sm-2">
                        <img src="/image/<?= $sumur['foto']; ?>" class="img-thumbnail img-preview">
                        <p><?= $sumur['foto']; ?></p>
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
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>