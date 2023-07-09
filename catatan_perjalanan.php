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
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Suhu</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Suhu</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          include 'koneksi.php';
          $no = 1;
          $sql = "SELECT * FROM catatan WHERE nik = '$_SESSION[nik]'";
          $query = mysqli_query($koneksi, $sql);

          foreach ($query as $value) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value['tanggal'] ?></td>
              <td><?= $value['waktu'] ?></td>
              <td><?= $value['lokasi'] ?></td>
              <td><?= $value['suhu'] ?></td>
              <td>
                <a href="?url=edit_catatan&id_catatan=<?= $value['id_catatan']; ?>" class="btn btn-info">
                  <i class="fa fa-pen"></i> Edit
                </a>
              </td>
              <td>
                <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="hapus_catatan.php?id_catatan=<?= $value['id_catatan'] ?>" class="btn btn-danger">
                  <i class="fa fa-trash"></i> Hapus
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?php
