<?php
include("functions/koneksi.php");
$id_user = $_SESSION['user']['id_user'];
$dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_karyawan WHERE id_user='$id_user'"));
$id_karyawan = $dt['id_karyawan'];

$data = mysqli_fetch_array(mysqli_query($con, "SELECT sum(a.lama_cuti) as lama_cuti FROM tb_pengajuan_cuti a,tb_jenis_cuti b WHERE a.id_jenis_cuti=b.id_jenis_cuti and a.id_karyawan='$id_karyawan' and a.status_pengajuan='Diterima' and b.status_jenis_cuti='Normatif'"));
$banyak_cuti = $data['lama_cuti'];
$sisa = 12 - $banyak_cuti;
?>
<div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-12 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Jatah Cuti Normatif / Tahunan (12 Kali Cuti)</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-calculator"></i>
                            </div>
                            <div class="ps-3">
                                <h5><?= $sisa ?> Kali Cuti Lagi</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->


            <!-- Reports -->

            <!-- End Reports -->

        </div>
    </div><!-- End Left side columns -->
</div>