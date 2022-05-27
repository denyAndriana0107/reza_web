<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-between ">
        <div class="col">
            <h1 class="mt-2"><i class="fas fa-book-open"></i> Daftar Sumur</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian" name="keyword" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit">Cari</button>
                    </div>
                </div>
            </form>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>

        </div>
        <div class="col tambah">
            <a href="/sumur/create" class="btn btn-primary" style="float: right;"> <i class="fas fa-plus"></i>
                Tambah Data</a>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- <div class="row justify-content-between judul align-items-center"> -->


            <!-- </div> -->

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Alamat Perusahaan</th>
                        <th scope="col">Lokasi</th>
                        <!-- <th scope="col">Koordinat</th> -->
                        <th scope="col">Nomor Registrasi</th>
                        <!-- <th scope="col">Kegunaan Air</th> -->
                        <th scope="col">Jumlah Maksimal</th>
                        <!-- <th scope="col">Kedalaman Bor</th>
                        <th scope="col">Kedalaman Aquifer</th>
                        <th scope="col">Kedalaman Pompa</th> -->
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>



                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (3 * ($currentPage - 1)); ?>
                    <?php foreach ($sumur as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $s['nama_perusahaan']; ?></td>
                            <td><?= $s['alamat_perusahaan']; ?></td>
                            <td><?= $s['lokasi']; ?></td>
                            <!-- <td><?= $s['koordinat']; ?></td> -->
                            <td><?= $s["nomor_registrasi"]; ?></td>
                            <td><?= $s['jumlah_max']; ?></td>
                            <!-- <td><?= $s['kedalaman_bor']; ?></td>
                            <td><?= $s['kedalaman_aquifer']; ?></td>
                            <td><?= $s['kedalaman_pompa']; ?></td> -->
                            <td><img src="/image/<?= $s['foto']; ?>" alt="" width="50px"></td>
                            <td>
                                <a href="/sumur/edit/<?= $s['id']; ?>" class="btn btn-warning">Edit</a>

                                <form action="/sumur/<?= $s['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');"> Delete</button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <?= $pager->links('sumur', 'sumur_pagination'); ?>

        </div>
    </div>

</div>
<?= $this->endSection(); ?>