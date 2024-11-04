<?php

include("../../functions/koneksi.php");

$tgl_awal = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];
// $sql = mysqli_query($con, "SELECT * FROM tb_pengajuan_cuti a,
//                     tb_karyawan b,
//                     tb_jenis_cuti c,
//                     tb_devisi d 
//                     WHERE a.id_karyawan=b.id_karyawan 
//                     AND a.id_jenis_cuti=c.id_jenis_cuti 
//                     AND b.id_devisi= d.id_devisi 
//                     AND a.tgl_pengajuan 
//                     BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY a.id_pengajuan_cuti DESC");
// $query = mysqli_query($con, $sql);



?>

<!-- deskripsi halaman -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cuti : <?= $tgl_awal ?> s/d <?= $tgl_akhir ?></title>


    <link href="../../assets/img/notaris.png" rel="icon">



    <!-- Bootstrap Core CSS -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/css/offline-font.css" rel="stylesheet">
    <link href="../../assets/css/custom-report.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../../assets/js/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>


<body>
    <section id="header-top">
        <div class="container-fluid">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="text-left" width="15%">
                            <img src="../../assets/img/notaris.png" alt="logo-dkm" width="80" />
                        </td>
                        <td class="text-center" width="70%">
                            <b>Dinas Kesehatan Kabupaten Kudus</b> 
                            <br>Jl. Diponegoro No.15, Nganguk, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59312 Telp : (0291) 438152<br>
                        <td class="text-right" width="20%">
                            <!-- <img src="../../assets/img/kudus.jpg" alt="logo-dkm" width="100" height="70" /> -->
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr class="line-top" />
        </div>
    </section>

    <section id="body-of-report">
        <div class="container-fluid">
            <h4 class="text-center">LAPORAN TOTAL CUTI KARYAWAN</h4>
            <h5 class="text-center">Periode <?= $tgl_awal ?> s/d <?= $tgl_akhir ?></h5>
            <br />
            <table class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama Pegawai</th>
                        <th style="text-align: center;">Devisi - Jabatan</th>
                        <th style="text-align: center;">Total Cuti Normatif (Hari)</th>
                        <th style="text-align: center;">Total Cuti Non Normatif (Hari)</th>
                        <!-- <th style="text-align: center;">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $tgl_awal = $_GET['tgl_awal'];
                    $tgl_akhir = $_GET['tgl_akhir'];
                    $id_karyawan = $_GET['id_karyawan'];

                    if ($id_karyawan == "Semua") {
                        $view = mysqli_query($con, "SELECT * FROM tb_karyawan a,tb_devisi b WHERE a.id_devisi=b.id_devisi ORDER BY a.id_karyawan DESC");
                        $nama = "Semua Karyawan";
                    } else {
                        $view = mysqli_query($con, "SELECT * FROM tb_karyawan a,tb_devisi b WHERE a.id_devisi=b.id_devisi and a.id_karyawan='$id_karyawan' ORDER BY a.id_karyawan DESC");
                        $dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'"));
                        $nama = $dt['nm_karyawan'];
                    }
                    while ($row = $view->fetch_array()) {
                        $id = $row['id_karyawan'];
                        // normatif
                        $data = mysqli_fetch_array(mysqli_query($con, "SELECT sum(lama_cuti) as tot_cuti_normatif FROM tb_pengajuan_cuti a,tb_jenis_cuti b WHERE a.id_jenis_cuti=b.id_jenis_cuti and b.status_jenis_cuti='Normatif' and a.status_pengajuan !='Pengajuan' and a.id_karyawan='$id'"));
                        // non normatif
                        $data1 = mysqli_fetch_array(mysqli_query($con, "SELECT sum(lama_cuti) as tot_cuti_non_normatif FROM tb_pengajuan_cuti a,tb_jenis_cuti b WHERE a.id_jenis_cuti=b.id_jenis_cuti and b.status_jenis_cuti='Non Normatif' and a.status_pengajuan !='Pengajuan'  and a.id_karyawan='$id'"));
                    ?>
                        <tr style="text-align: center;">
                            <td><?= $no++ ?></td>
                            <td><?= $row['nm_karyawan'] ?></td>
                            <td><?= $row['nm_devisi'] ?> - <?= $row['jabatan'] ?></td>
                            <td><?= $data['tot_cuti_normatif'] ?> </td>
                            <td><?= $data1['tot_cuti_non_normatif'] ?> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div style="text-align: right;margin-right:50px">
                <p>Kudus, <?= date("Y-m-d") ?></p>
                <p>Penanggung Jawab Dinas Kesehatan</p>
                <p>
                    <!-- <img src="../assets/ttd.png" style="width:15%"> -->
                </p>
                <p style="margin-top: 80px;">dr. ANDINI ARIDEWI, M.Kes</p>
            </div>
        </div>
        </div>



    </section>

    <script type="text/javascript">
        window.print();
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jTebilang JavaScript -->
    <script src="../../assets/jTerbilang/jTerbilang.js"></script>

</body>

</html>