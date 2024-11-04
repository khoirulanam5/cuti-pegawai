<script src="../assets/sweetalert/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="../assets/sweetalert/dist/sweetalert2.css">

<body>
<?php
error_reporting(0);
include("../../functions/koneksi.php");

$idKaryawan = $_POST['id_karyawan'];
$idJenisCuti = $_POST['id_jenis_cuti'];
$tglAwal = $_POST['tgl_awal'];
$tglAkhir = $_POST['tgl_akhir'];
$keperluanCuti = $_POST['keperluan'];
$tglPengajuan = $_POST['tgl_pengajuan'];
$maxCuti = $_POST['max_cuti'];
$statusJenisCuti = $_POST['status_jenis_cuti'];

$tgl1 = new DateTime($tglAwal);
$tgl2 = new DateTime($tglAkhir);
$today = new DateTime();

// Mendapatkan jalur direktori tempat menyimpan foto
$uploadDir = '../../assets/foto_bukti/';
// Mendapatkan nama file foto
$uploadedFile = $uploadDir . basename($_FILES['foto_bukti']['name']);
// Memindahkan file yang diunggah ke direktori tujuan
move_uploaded_file($_FILES['foto_bukti']['tmp_name'], $uploadedFile);

// Menyimpan jalur file ke dalam variabel untuk disertakan dalam query INSERT
$fotoBukti = mysqli_real_escape_string($con, $uploadedFile);

// Cek apakah terdapat pengajuan cuti yang masih dalam status 'Pengajuan'
$pendingQuery = mysqli_query($con, "SELECT * FROM tb_pengajuan_cuti WHERE id_karyawan='$idKaryawan' AND status_pengajuan='Pengajuan'");
$pendingLeave = mysqli_fetch_array($pendingQuery);

if ($pendingLeave) {
    echo "<script>alert('Anda masih memiliki pengajuan cuti yang belum divalidasi. Tunggu hingga pengajuan sebelumnya divalidasi sebelum mengajukan lagi.'); window.location = '../../?menu=pengajuan_cuti'</script>";
    exit;
}

// Hitung selisih hari untuk menentukan lama cuti
$selisih = $tgl2->diff($tgl1);
$lamaCuti = $selisih->d + 1;

// Jika jenis cuti adalah 'Normatif'
if ($statusJenisCuti == "Normatif") {
    // Hitung total cuti normatif yang sudah diambil
    $data = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(a.lama_cuti) AS lama_cuti FROM tb_pengajuan_cuti a, tb_jenis_cuti b WHERE a.id_jenis_cuti=b.id_jenis_cuti AND a.id_karyawan='$idKaryawan' AND a.status_pengajuan='Diterima' AND b.status_jenis_cuti='Normatif'"));
    $banyak = $data['lama_cuti'];
    $sisa = 12 - $banyak;

    // Cek apakah cuti normatif yang diambil masih dalam batas maksimal
    if ($banyak < 12) {
        // Cek apakah lama cuti tidak melebihi batas maksimal
        if ($lamaCuti <= $maxCuti) {
            // Cek apakah lama cuti tidak melebihi sisa cuti tahunan
            if ($lamaCuti <= $sisa) {
                // Melakukan query INSERT ke dalam tabel tb_pengajuan_cuti
                $insert = mysqli_query($con, "INSERT INTO `tb_pengajuan_cuti`(`id_pengajuan_cuti`, `id_karyawan`, `id_jenis_cuti`, `tgl_pengajuan`, `tgl_validasi`, `tgl_cuti_awal`, `tgl_cuti_akhir`, `lama_cuti`, `keperluan_cuti`, `validasi_admin`, `validasi_pemimpin`, `status_pengajuan`, `ket_status`, `foto_bukti`) VALUES ('','$idKaryawan','$idJenisCuti','$tglPengajuan','','$tglAwal','$tglAkhir','$lamaCuti','$keperluanCuti','','','Pengajuan','','$fotoBukti')");

                // Cek apakah query INSERT berhasil
                if ($insert) {
                    echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=pengajuan_cuti'</script>";
                } else {
                    echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=pengajuan_cuti'</script>";
                }
            } else {
                echo "<script>alert('Mohon Maaf Lama Cuti Anda Melebihi Sisa Cuti Tahunan Anda'); window.location = '../../?menu=pengajuan_cuti'</script>";
            }
        } else {
            // Jika lama cuti melebihi batas maksimal
            echo "<script>alert('Mohon Maaf Lama Cuti Anda Melebihi Jatah Max Jenis Cuti Tersebut'); window.location = '../../?menu=pengajuan_cuti'</script>";
        }
    } else {
        // Jika cuti normatif sudah mencapai batas maksimal
        echo "<script>alert('Mohon Maaf Cuti Tahunan Anda Telah Habis, Anda Tidak Dapat Mengajukan Cuti Tahunan Lagi'); window.location = '../../?menu=pengajuan_cuti'</script>";
    }
} else {
    // Jika jenis cuti adalah 'Non Normatif'
    if ($lamaCuti <= $maxCuti) {
        // Cek apakah lama cuti tidak melebihi batas maksimal
        $insert = mysqli_query($con, "INSERT INTO `tb_pengajuan_cuti`(`id_pengajuan_cuti`, `id_karyawan`, `id_jenis_cuti`, `tgl_pengajuan`, `tgl_validasi`, `tgl_cuti_awal`, `tgl_cuti_akhir`, `lama_cuti`, `keperluan_cuti`, `validasi_admin`, `validasi_pemimpin`, `status_pengajuan`, `ket_status`, `foto_bukti`) VALUES ('','$idKaryawan','$idJenisCuti','$tglPengajuan','','$tglAwal','$tglAkhir','$lamaCuti','$keperluanCuti','','','Pengajuan','','$fotoBukti')");

        // Cek apakah query INSERT berhasil
        if ($insert) {
            echo "<script>alert('Data Berhasil Tersimpan'); window.location = '../../?menu=pengajuan_cuti'</script>";
        } else {
            echo "<script>alert('Data Gagal Tersimpan'); window.location = '../../?menu=pengajuan_cuti'</script>";
        }
    } else {
        // Jika lama cuti melebihi batas maksimal
        echo "<script>alert('Mohon Maaf Lama Cuti Anda Melebihi Jatah Max Jenis Cuti Tersebut'); window.location = '../../?menu=pengajuan_cuti'</script>";
    }
}

?>

</body>