<?php

// $nik          = $_POST['nik'];
// $nama_lengkap = $_POST['nama_lengkap'];

// include 'koneksi.php';

// $query_validasi = "SELECT * FROM user WHERE nik = '$nik'";
// $query = mysqli_query($koneksi, $query_validasi);

// Mengecek status NIK
$data = file('config.txt', FILE_IGNORE_NEW_LINES);
foreach ($data as $value) {
  $pecah = explode('|', $value);

  if ($nik == $pecah['0']) {
    $cek = true;
  }
}

if ($cek) { ?>
  <script type="text/javascript">
    alert('!! Maaf NIK yang Anda Masukkan Sudah Terdaftar.')
    window.location.assign('register.php');
  </script>
<?php } else {
  // buat format penyimpanan
  $format = "\n$nik|$nama_lengkap";

  // buka file config.txt
  $file = fopen('config.txt', 'a');
  fwrite($file, $format);

  // tutup file
  fclose($file);

?>
  <script>
    alert('Pendaftaran Berhasil Dilakukan.')
    window.location.assign('index.php')
  </script>
<?php
}
