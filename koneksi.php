<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "kerjaan_yusak";

$koneksi = mysqli_connect($host, $user, $password);

mysqli_select_db($koneksi, $database);

if (!$koneksi) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}
