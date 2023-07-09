<?php
session_start();
$nik          = $_SESSION['nik'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$tanggal = $_POST['tanggal'];
$jam     = $_POST['jam'];
$lokasi  = $_POST['lokasi'];
$suhu    = $_POST['suhu'];

$format = "\n$nik|$nama_lengkap";
