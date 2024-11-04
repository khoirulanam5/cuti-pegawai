<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
    <?php
    error_reporting(0);
    include("../../functions/koneksi.php");

    $nm_karyawan = $_POST['nm_karyawan'];
    $nis = $_POST['NIS'];
    $id_devisi = $_POST['id_devisi'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_karyawan = $_POST['no_karyawan'];

    $data = mysqli_fetch_array(mysqli_query($con, "SELECT max(id_user) as user FROM tb_user"));
    $id_user = $data['user'] + 1;

    $foto = $_FILES['foto_karyawan']['name'];
    $extensi = explode(".", $_FILES["foto_karyawan"]["name"]);
    $nama_foto = $nm_karyawan . round(microtime(true)) . '.' . end($extensi);
    $foto2 = $_FILES['foto_karyawan']['tmp_name'];
    $lokasi = "../../assets/foto_karyawan/" . $nama_foto;
    copy($foto2, $lokasi);

    $dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_user WHERE username='$no_karyawan'"));
    $cek = $dt['id_user'];

    if (empty($cek)) {
        $insert = mysqli_query($con, "INSERT INTO `tb_user`(`id_user`, `username`, `password`, `nm_pengguna`, `level`) VALUES ('$id_user','$nis','123','$nm_karyawan','karyawan')");

        $insert = mysqli_query($con, "INSERT INTO `tb_karyawan`(`id_karyawan`, `id_user`, `id_devisi`, `jabatan`, `nm_karyawan`, `NIS`, `alamat`, `no_karyawan`, `jenis_kelamin`, `foto_karyawan`) VALUES ('','$id_user','$id_devisi','$jabatan','$nm_karyawan','$nis','$alamat','$no_karyawan','$jenis_kelamin','$nama_foto')");

        if ($insert) {
            echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=karyawan'</script>";
        } else {
            echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=karyawan'</script>";
        }
    } else {
        echo "<script>alert('No Telp Karyawan Sudah Terpakai'); window.location = '../../?menu=karyawan'</script>";
    }




    ?>
</body>