<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $id = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id'"));
    $id_user = $data['id_user'];

    $insert = mysqli_query($con, "DELETE FROM `tb_karyawan` WHERE id_karyawan='$id'");
    $insert = mysqli_query($con, "DELETE FROM `tb_user` WHERE id_user='$id_user'");

    if ($insert) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location = '../../?menu=karyawan'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=karyawan'</script>";
    }


    ?>
</body>