<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main role="main" class="container-fluid">

    <h1 style="margin-top: 20px;"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
    <hr>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                        <div class="col-10">
                            <h5>Pekanbaru</h5>
                            <h6>Jumlah Max :</h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                        <div class="col-10">
                            <h5>Pekanbaru</h5>
                            <h6>Jumlah Max :</h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                        <div class="col-10">
                            <h5>Pekanbaru</h5>
                            <h6>Jumlah Max :</h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                        <div class="col-10">
                            <h5>Pekanbaru</h5>
                            <h6>Jumlah Max :</h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="chart"></div>

</main><!-- /.container -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myChart = Highcharts.chart('chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Grafik .... '
            },
            xAxis: {
                categories: ['Kedalaman Bor', 'Kedalaman Aquifer', 'Kedalaman Pompa']
            },
            yAxis: {
                title: {
                    text: 'Kota'
                }
            },
            series: [
                <?php
                foreach ($sumur as $index) {
                    echo "{name: '" . $index['nama_perusahaan'] . "'" .  ",data: [$index[kedalaman_bor],$index[kedalaman_aquifer],$index[kedalaman_pompa]] },";
                }
                ?>
            ]
        });
    });
</script>
<?= $this->endSection(); ?>