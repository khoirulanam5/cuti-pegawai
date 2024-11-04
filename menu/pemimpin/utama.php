<?php
include("functions/koneksi.php");
$data = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_karyawan) as karyawan FROM tb_karyawan"));
$karyawan = $data['karyawan'];

$bulan = date('m');
$data1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_pengajuan_cuti) as cuti FROM tb_pengajuan_cuti WHERE month(tgl_pengajuan)='$bulan' and status_pengajuan='Proses'"));
$cuti_bulan_ini = $data1['cuti'];

$bulan = date('m');
$data2 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_pengajuan_cuti) as cuti FROM tb_pengajuan_cuti WHERE month(tgl_pengajuan)='$bulan' and tgl_validasi!=''"));
$cuti_tervalidasi = $data2['cuti'];
?>

<div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Karyawan </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h5><?= $karyawan ?> Karyawan</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengajuan Cuti </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bell"></i>
                            </div>
                            <div class="ps-3">
                                <h5><?= $cuti_bulan_ini ?> Pengajuan</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Cuti Tervalidasi </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bookmark-check"></i>
                            </div>
                            <div class="ps-3">
                                <h5><?= $cuti_tervalidasi ?> Tervalidasi</h5>
                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Pengajuan Cuti Tahun 2023</h5>

                        <!-- Line Chart -->
                        <div id="reportsChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                    series: [{
                                        name: 'Sales',
                                        data: [31, 40, 28, 51, 42, 82, 56],
                                    }, {
                                        name: 'Revenue',
                                        data: [11, 32, 45, 32, 34, 52, 41]
                                    }, {
                                        name: 'Customers',
                                        data: [15, 11, 32, 18, 9, 24, 11]
                                    }],
                                    chart: {
                                        height: 350,
                                        type: 'area',
                                        toolbar: {
                                            show: false
                                        },
                                    },
                                    markers: {
                                        size: 4
                                    },
                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                    fill: {
                                        type: "gradient",
                                        gradient: {
                                            shadeIntensity: 1,
                                            opacityFrom: 0.3,
                                            opacityTo: 0.4,
                                            stops: [0, 90, 100]
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'smooth',
                                        width: 2
                                    },
                                    xaxis: {
                                        type: 'datetime',
                                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                    },
                                    tooltip: {
                                        x: {
                                            format: 'dd/MM/yy HH:mm'
                                        },
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Line Chart -->

                    </div>

                </div>
            </div><!-- End Reports -->

        </div>
    </div><!-- End Left side columns -->
</div>