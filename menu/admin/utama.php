<?php
include("functions/koneksi.php");
$data = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_karyawan) as karyawan FROM tb_karyawan"));
$karyawan = $data['karyawan'];

$bulan = date('m');
$data1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_pengajuan_cuti) as cuti FROM tb_pengajuan_cuti WHERE month(tgl_pengajuan)='$bulan' and status_pengajuan='Pengajuan'"));
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

            <!-- End Reports -->

        </div>
    </div><!-- End Left side columns -->
</div>