<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $nm_pengguna = $_POST['nm_pengguna'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    $password = $_POST['password'];

    $insert = mysqli_query($con, "INSERT INTO `tb_user`(`id_user`, `username`, `password`, `nm_pengguna`, `level`) VALUES ('','$username','$password','$nm_pengguna','$level')");

    if ($insert) {
        echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=pengguna_sistem'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=pengguna_sistem'</script>";
    }


    ?>
</body>