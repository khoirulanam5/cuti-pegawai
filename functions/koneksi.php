<?php
date_default_timezone_set('Asia/Jakarta');
$db = "cuti"; //nama database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = $db;

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => $db,
    'host' => 'localhost'
);
if (mysqli_connect_error()) {
    echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
}
