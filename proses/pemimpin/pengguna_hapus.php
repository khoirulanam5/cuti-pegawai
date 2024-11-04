<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $id = $_GET['id'];

    $insert = mysqli_query($con, "DELETE FROM `tb_user` WHERE id_user='$id'");

    if ($insert) {
        echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=pengguna_sistem'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=pengguna_sistem'</script>";
    }


    ?>
</body>