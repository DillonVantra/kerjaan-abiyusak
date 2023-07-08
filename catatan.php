<?php
include "header.php";

session_start();
$user = $_SESSION['username'];
$datauser = "catatan/$user.txt";

if (!file_exists($datauser)) {
  die('<center>Kamu belum mempunya catatan</center>');
} else {
  $file = fopen($datauser, "r");
}
?>

<html>

<body>
  <table border="1" align="center" width="50%">
    <td>
      <a>Urutkan Berdasarkan</a>
      <select name="" id="" onclick="urutkan(this)">
        <option value="0">Tanggal</option>
        <option value="1">Waktu</option>
        <option value="2">Lokasi</option>
        <option value="3">Suhu</option>
      </select>
      <input type="submit" value="Urutkan" />
    </td>
  </table>
  <br />
  <table border="1" align="center" width="50%" height="40%">
    <td>
      <table id="myTable" border="1" align="center" width="80%">
        <tr>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Lokasi yang dikunjungi</th>
          <th>Suhu tubuh</th>
        </tr>
        <?php
        while (($row = fgets($file)) != false) {
          $col = explode(',', $row);
          foreach ($col as $data) {
            echo '<td>' . trim($data) . '</td>';
          }
        }
        ?>
      </table>
    </td>
  </table>
  <script src="main.js"></script>
</body>

</html>