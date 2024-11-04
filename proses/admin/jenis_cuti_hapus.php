<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $id = $_GET['id'];

    $insert = mysqli_query($con, "DELETE FROM `tb_jenis_cuti` WHERE id_jenis_cuti='$id'");

    if ($insert) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location = '../../?menu=jenis_cuti'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=jenis_cuti'</script>";
    }


    ?>
</body>