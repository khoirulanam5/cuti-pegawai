<?php
require_once("../functions/koneksi.php");

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($con, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($query);
$cek = mysqli_num_rows($query);

if ($cek >= 1) {
    session_start();
    $_SESSION['user']['username']  = $username;
    $_SESSION['user']['id_user']   = $data['id_user'];
    $_SESSION['user']['level']          = $data['level'];
    $_SESSION['user']['nm_pengguna']     = $data['nm_pengguna'];

    echo "<script> window.location = '../'</script>";
} else {
    echo "<script>alert('Username dan Password tidak valid.'); window.location = '../'</script>";
}
