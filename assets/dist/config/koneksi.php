<?php
  //error_reporting(0);

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "cuti_db";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Tidak dapat terhubung ke database: ".mysqli_error($conn));
?>