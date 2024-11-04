<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $id_user = $_POST['id_user'];
    $no_karyawan = $_POST['no_karyawan'];
    $alamat = $_POST['alamat'];

    $username = $_POST['username'];
    $password = $_POST['password'];

    // $foto = $_FILES['foto_karyawan']['name'];
    // $extensi = explode(".", $_FILES["foto_karyawan"]["name"]);
    // $nama_foto = $nm_karyawan . round(microtime(true)) . '.' . end($extensi);
    // $foto2 = $_FILES['foto_karyawan']['tmp_name'];
    // $lokasi = "../../assets/foto_karyawan/" . $nama_foto;
    // copy($foto2, $lokasi);

    $nama_foto = $_POST['foto_old'];
    if($_FILES['foto_karyawan']['name'] != ''){
        $foto = $_FILES['foto_karyawan']['name'];
        $file_tmp = $_FILES['foto_karyawan']['tmp_name'];	
        $extensi = explode('.', $nama);
        $nama_foto = date('YmdGis')."_".$npp."_".$foto;
        unlink('../../assets/foto_karyawan/'. $_POST['foto_old']);
        move_uploaded_file($file_tmp, '../../assets/foto_karyawan/'.$nama_foto);
    }

    
    $insert = mysqli_query($con, "UPDATE `tb_karyawan` SET `alamat`='$alamat',
                                `no_karyawan`='$no_karyawan',
                                `foto_karyawan`='$nama_foto' WHERE `id_user`='$id_user'");
    $insert2 = mysqli_query($con, "UPDATE `tb_user` SET `username`='$username',
                                `password`='$password' WHERE `id_user`='$id_user'");


    // $insert = mysqli_query($con, $sql) or die(mysqli_error($con));
    // if($insert){
    //         echo "<script>alert('Data Berhasil Diedit'); window.location = '../../?menu=data_diri'</script>";
            
    //     }else{
    //         echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=data_diri'</script>";
            
    //     }




    if (empty($foto)) {
        $insert = mysqli_query($con, "UPDATE `tb_karyawan` SET `alamat`='$alamat',`no_karyawan`='$no_karyawan' WHERE `id_user`='$id_user'");

        $insert2 = mysqli_query($con, "UPDATE `tb_user` SET `username`='$username',`password`='$password' WHERE `id_user`='$id_user'");

        if ($insert) {
            echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=data_diri'</script>";
        } else {
            echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=data_diri'</script>";
        }
    } else {
        $insert = mysqli_query($con, "UPDATE `tb_karyawan` SET `alamat`='$alamat',`no_karyawan`='$no_karyawan',`foto_karyawan`='$nama_foto' WHERE `id_user`='$id_user'");

        $insert2 = mysqli_query($con, "UPDATE `tb_user` SET `username`='$username',`password`='$password' WHERE `id_user`='$id_user'");

        if ($insert) {
            echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=data_diri'</script>";
        } else {
            echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=data_diri'</script>";
        }
    }

    ?>
</body>