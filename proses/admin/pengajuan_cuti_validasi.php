<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $id_pengajuan_cuti = $_POST['id_pengajuan_cuti'];
    $validasi_cuti = $_POST['validasi_cuti'];
    $status_pengajuan = $_POST['status_pengajuan'];

    $insert = mysqli_query($con, "UPDATE `tb_pengajuan_cuti` SET `validasi_admin`='$validasi_cuti',`status_pengajuan`='$status_pengajuan' WHERE `id_pengajuan_cuti`='$id_pengajuan_cuti'");

    if ($insert) {
        echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=pengajuan_cuti'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=pengajuan_cuti'</script>";
    }


    ?>
</body>