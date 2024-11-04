<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $id_karyawan = $_POST['id_karyawan'];
    $nm_karyawan = $_POST['nm_karyawan'];
    $nis = $_POST['NIS'];
    $id_devisi = $_POST['id_devisi'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_karyawan = $_POST['no_karyawan'];

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

    
    $tgl = date('Y-m-d');
    
    // mysqli_query($con, "UPDATE tb_karyawan SET id_devisi = '$id_devisi' where id_karyawan = '$id_karyawan'");
    $sql = "UPDATE `tb_karyawan` SET `id_devisi`='$id_devisi',
                    `jabatan`='$jabatan',
                    `nm_karyawan`='$nm_karyawan',
                    `NIS`='$nis',
                    `alamat`='$alamat',
                    `no_karyawan`='$no_karyawan',
                    `jenis_kelamin`='$jenis_kelamin',
                    `foto_karyawan`='$nama_foto' WHERE `id_karyawan`='$id_karyawan'";


$insert = mysqli_query($con, $sql);

if ($insert) {
    echo "<script>alert('Data Berhasil Diedit'); window.location = '../../?menu=karyawan'</script>";
} else {
    // Check if the error is due to a duplicate key violation
    $errorCode = mysqli_errno($con);
    if ($errorCode == 1062) {
        $errorMessage = mysqli_error($con);
        if (strpos($errorMessage, 'NIS') !== false) {
            echo "<script>alert('NIS sudah ada. Data Gagal Tersimpan'); window.location = '../../?menu=karyawan'</script>";
        } elseif (strpos($errorMessage, 'no_karyawan') !== false) {
            echo "<script>alert('Nomer HP Karyawan sudah ada. Data Gagal Tersimpan'); window.location = '../../?menu=karyawan'</script>";
        } else {
            echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=karyawan'</script>";
        }
    } else {
        echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=karyawan'</script>";
    }
}
    
    
    // if (empty($nama_foto)) {
    //     $insert = mysqli_query($con, "UPDATE `tb_karyawan` SET `id_devisi`='$id_devisi',`jabatan`='$jabatan',`nm_karyawan`='$nm_karyawan',`alamat`='$alamat',`no_karyawan`='$no_karyawan',`jenis_kelamin`='$jenis_kelamin' WHERE `id_karyawan`='$id_karyawan'");
    
    //     if ($insert) {
    //         echo "<script>alert('Data Berhasil Diedit'); window.location = '../../?menu=karyawan'</script>";
    //     } else {
    //         echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=karyawan'</script>";
    //     }
    // } else {
    //     $insert = mysqli_query($con, "UPDATE `tb_karyawan` SET `id_devisi`='$id_devisi',`jabatan`='$jabatan',`nm_karyawan`='$nm_karyawan',`alamat`='$alamat',`no_karyawan`='$no_karyawan',`jenis_kelamin`='$jenis_kelamin',`foto_karyawan`='$nama_foto' WHERE `id_karyawan`='$id_karyawan'");
    
    //     if ($insert) {
    //         echo "<script>alert('Data Berhasil Diedit'); window.location = '../../?menu=karyawan'</script>";
    //     } else {
    //         echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=karyawan'</script>";
    //     }
    // }


    ?>
</body>