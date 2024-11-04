<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $nm_devisi = $_POST['nm_devisi'];

    $insert = mysqli_query($con, "INSERT INTO `tb_devisi`(`id_devisi`, `nm_devisi`) VALUES ('','$nm_devisi')");

    if ($insert) {
        echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=devisi'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=devisi'</script>";
    }


    ?>
</body>