<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["daftar"])) {
		$nik = $_POST["nik"];
		$nama = $_POST["nama"];

		$query = "INSERT INTO data1 (nik, nama) VALUES ('$nik', '$nama')";

		$result = mysqli_query($koneksi, $query);

		if ($result) {
			echo "Pengguna baru berhasil ditambahkan.";
		} else {
			echo "Terjadi kesalahan dalam menambahkan pengguna baru.";
		}
	} elseif (isset($_POST["masuk"])) {
		$nik = $_POST["nik"];
		$nama = $_POST["nama"];

		$query = "SELECT * FROM data1 WHERE nik = '$nik'";
		$result = mysqli_query($koneksi, $query);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$hashedNik = $row['nik'];

			if (password_verify($nik, $hashedNik)) {
				session_start();
				$_SESSION['username'] = $nama;
				header("location: home.php");
				exit();
			} else {
				echo '<script>alert("NIK atau Nama Anda Salah! Silahkan isi kembali.");</script>';
			}
		}
	}
}
?>

<html>
<form action="" method="POST">
	<br><br><br><br><br><br><br>
	<table align="center">
		<tr>
			<td><input type="text" name="nik" placeholder="NIK"></td>
		</tr>
		<tr>
			<td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="daftar" value="Daftar">
				<input type="submit" name="masuk" value="Masuk">
			</td>
		</tr>
	</table>
</form>

</html>
