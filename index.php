<?php
error_reporting(0);
session_start();
$data = isset($_SESSION['user']['id_user']) ? $_SESSION['user'] : 0;

if ($data['level'] == 'pemimpin') { //level sistem
    include("menu/pemimpin/index.php");
} elseif ($data['level'] == 'admin') {
    include("menu/admin/index.php");
} elseif ($data['level'] == 'karyawan') {
    include("menu/karyawan/index.php");
} else {
    include("menu/login.php");
}
