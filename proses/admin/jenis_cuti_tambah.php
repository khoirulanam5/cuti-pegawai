<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $nm_jenis_cuti = $_POST['nm_jenis_cuti'];
    $durasi_cuti_max = $_POST['durasi_cuti_max'];
    $ket_jenis_cuti = $_POST['ket_jenis_cuti'];
    $status_jenis_cuti = $_POST['status_jenis_cuti'];

    $insert = mysqli_query($con, "INSERT INTO `tb_jenis_cuti`(`id_jenis_cuti`, `nm_jenis_cuti`, `durasi_cuti_max`, `ket_jenis_cuti`, `status_jenis_cuti`) VALUES ('','$nm_jenis_cuti','$durasi_cuti_max','$ket_jenis_cuti','$status_jenis_cuti')");

    if ($insert) {
        echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=jenis_cuti'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=jenis_cuti'</script>";
    }


    ?>
</body>