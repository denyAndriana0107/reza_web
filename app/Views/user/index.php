<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2"><i class="fas fa-columns"></i> Daftar User</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian" name="keyword" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit">Cari</button>
                    </div>
                </div>
            </form>
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
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Username</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Address</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (3 * ($currentPage - 1)); ?>
                    <?php foreach ($user as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $u['firstname']; ?> <?= $u['lastname'];; ?></td>
                            <td><?= $u['username']; ?></td>
                            <td><?= $u['phone']; ?></td>
                            <td><?= $u['address']; ?></td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <?= $pager->links('user', 'sumur_pagination'); ?>

        </div>
    </div>

</div>
</div>
<?= $this->endSection(); ?>