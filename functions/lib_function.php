<?php
require_once("koneksi.php");
function str_bln($bln)
{
   $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
   return $bulan[$bln - 1];
}

function tanggal($tgl, $format = 1, $reverse = false)
{
   if ($reverse) {
      if ($format == 1) {
         return date("Y-m-d", strtotime($tgl));
      }
   } else {
      if ($format == 1) {
         return date("d-m-Y", strtotime($tgl));
      } else if ($format == 2) {
         return date("d", strtotime($tgl)) . " " . str_bln(date("m", strtotime($tgl))) . " " . date("Y", strtotime($tgl));
      } else if ($format == 3) {
         return date("d/m/Y", strtotime($tgl));
      }
   }
}

function kode_otomatis($tabel, $id, $inisial)
{
   include "function/koneksi.php";
   $tgl = date('d-m-Y');
   $panjang = 5;
   $query = "SELECT max($id) as maxKode FROM $tabel";
   $hasil = mysqli_query($con, $query);
   $data = mysqli_fetch_array($hasil);
   $kodeBarang = $data['maxKode'];
   if ($kodeBarang == "") {
      $angka = 0;
   } else {
      $angka = substr($kodeBarang, strlen($inisial));
   }
   $angka++;
   $angka  = strval($angka);
   $tmp    = "";
   for ($i = 1; $i <= ($panjang - strlen($inisial) - strlen($angka)); $i++) {
      $tmp = $tmp . "0";
   }

   return $inisial . $tmp . $angka;
}


//contoh penulisan fungsi
function list_pengguna_sistem()
{
   include("koneksi.php");
   $view = mysqli_query($con, "SELECT * FROM tb_user");
   return $view;
}

function list_devisi()
{
   include("koneksi.php");
   $view = mysqli_query($con, "SELECT * FROM tb_devisi ORDER BY id_devisi DESC");
   return $view;
}

function list_jenis_cuti()
{
   include("koneksi.php");
   $view = mysqli_query($con, "SELECT * FROM tb_jenis_cuti ORDER BY id_jenis_cuti DESC");
   return $view;
}

function list_karyawan()
{
   include("koneksi.php");
   $view = mysqli_query($con, "SELECT * FROM tb_karyawan a,tb_devisi b WHERE a.id_devisi=b.id_devisi ORDER BY a.id_karyawan DESC");
   return $view;
}

function list_pengaujuan_cuti_by_karyawan($id)
{
   include("koneksi.php");
   $view = mysqli_query($con, "SELECT * FROM tb_pengajuan_cuti a,tb_karyawan b,tb_jenis_cuti c WHERE a.id_karyawan=b.id_karyawan and a.id_jenis_cuti=c.id_jenis_cuti and b.id_user='$id' order by a.id_pengajuan_cuti desc");
   return $view;
}

function list_pengaujuan_cuti()
{
   include("koneksi.php");
   $view = mysqli_query($con, "SELECT * FROM tb_pengajuan_cuti a,tb_karyawan b,tb_jenis_cuti c WHERE a.id_karyawan=b.id_karyawan and a.id_jenis_cuti=c.id_jenis_cuti order by a.id_pengajuan_cuti desc");
   return $view;
}
