<?php

include 'koneksi.php';
$id_catatan = $_GET['id_catatan'];
$sql = "SELECT * FROM catatan WHERE id_catatan = '$id_catatan'";
$query = mysqli_query($koneksi, $sql);
$value = mysqli_fetch_array($query);

?>

<div class="card">
  <div class="card-header">
    <a href="user.php" class="btn btn-primary btn-icon-split">
      <span class="icon text-white-50">
        <i class="fa fa-arrow-left"></i>
      </span>
      <span class="text">Kembali</span>
    </a>
  </div>
  <div class="card-body">
    <form action="simpan_edit_catatan.php" method="post">
      <input type="hidden" name="id_catatan" value="<?= $id_catatan ?>">
      <div class="form-group">
        <label for="">Pilih Tanggal</label>
        <input name="tanggal" type="date" required class="form-control" placeholder="Masukkan Tanggal" value="<?= $value['tanggal'] ?>">
      </div>
      <div class="form-group">
        <label for="">Pilih Jam</label>
        <input name="waktu" type="time" required class="form-control" placeholder="Masukkan Jam" value="<?= $value['waktu'] ?>">
      </div>
      <div class="form-group">
        <label for="">Pilih Lokasi</label>
        <input name="lokasi" type="text" required class="form-control" placeholder="Masukkan Lokasi" value="<?= $value['lokasi'] ?>">
      </div>
      <div class="form-group">
        <label for="">Suhu Tubuh</label>
        <input name="suhu" type="text" required class="form-control" placeholder="Masukkan Suhu Tubuh" value="<?= $value['suhu'] ?>">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning"><i class="fa fa-trash"></i> Kosongkan</button>
      </div>
    </form>
  </div>
</div>

<?php
