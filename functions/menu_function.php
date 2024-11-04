<?php
function tampil_halaman_pemimpin($menu = "utama", $p = "") //nama fungsi tampilan berdasarkan level
{
    $mn = "";
    switch ($menu) {
        case "utama":
            $mn = "utama.php";
            break;

        case "pengguna_sistem":
            $mn = "pengguna.php";
            break;

        case "devisi":
            $mn = "devisi.php";
            break;

        case "jenis_cuti":
            $mn = "jenis_cuti.php";
            break;

        case "karyawan":
            $mn = "karyawan.php";
            break;

        case "pengajuan_cuti":
            $mn = "pengajuan_cuti.php";
            break;

        case "laporan_cuti_karyawan":
            $mn = "laporan_cuti_karyawan.php";
            break;

        case "laporan":
            $mn = "laporan.php";
            break;


        case "profil":
            $mn = "profil.php";
            break;

        default:
            $mn = "utama.php";
            break;
    }
    include_once("menu/pemimpin/" . $mn); //lokasi file berdasrkan level
}

function tampil_halaman_admin($menu = "utama", $p = "") //nama fungsi tampilan berdasarkan level
{
    $mn = "";
    switch ($menu) {
        case "utama":
            $mn = "utama.php";
            break;

        case "devisi":
            $mn = "devisi.php";
            break;

        case "jenis_cuti":
            $mn = "jenis_cuti.php";
            break;

        case "karyawan":
            $mn = "karyawan.php";
            break;

        case "pengajuan_cuti":
            $mn = "pengajuan_cuti.php";
            break;

        case "profil":
            $mn = "profil.php";
            break;

        default:
            $mn = "utama.php";
            break;
    }
    include_once("menu/admin/" . $mn); //lokasi file berdasrkan level
}

function tampil_halaman_karyawan($menu = "utama", $p = "") //nama fungsi tampilan berdasarkan level
{
    $mn = "";
    switch ($menu) {
        case "utama":
            $mn = "utama.php";
            break;

        case "data_diri":
            $mn = "data_diri.php";
            break;

        case "pengajuan_cuti":
            $mn = "pengajuan_cuti.php";
            break;

        case "profil":
            $mn = "profil.php";
            break;

        default:
            $mn = "utama.php";
            break;
    }
    include_once("menu/karyawan/" . $mn); //lokasi file berdasrkan level
}
