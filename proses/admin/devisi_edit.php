<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $id_devisi = $_POST['id_devisi'];
    $nm_devisi = $_POST['nm_devisi'];

    $insert = mysqli_query($con, "UPDATE `tb_devisi` SET `nm_devisi`='$nm_devisi' WHERE `id_devisi`='$id_devisi'");

    if ($insert) {
        echo "<script>alert('Data Berhasil Diedit'); window.location = '../../?menu=devisi'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=devisi'</script>";
    }


    ?>
</body>