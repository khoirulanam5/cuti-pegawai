<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../functions/koneksi.php");

    $id_user = $_POST['id_user'];
    $nm_pengguna = $_POST['nm_pengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $insert = mysqli_query($con, "UPDATE `tb_user` SET `username`='$username',`password`='$password',`nm_pengguna`='$nm_pengguna' WHERE `id_user`='$id_user'");

    if ($insert) {
        echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../?menu=profil'</script>";
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../?menu=profil'</script>";
    }


    ?>
</body>