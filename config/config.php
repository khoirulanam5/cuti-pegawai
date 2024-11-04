<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

$db_connection = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'cuti',
    'host' => 'localhost'
);

$con = mysqli_connect($db_connection['host'], $db_connection['user'], $db_connection['pass'], $db_connection['db']);


if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

function base_url($url = null)
{
    $base_url = "http://localhost/cuti";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}