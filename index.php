<?php 
session_start();
include_once 'koneksi.php';
if (!isset($_SESSION["username"])) {
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>6701174057</title>
</head>
<body>
	<br>
	<br>
	<br>

	<center>
		<table border="1">
			<tr>
				<td>
					<table>
						<form action="data.php" method="POST" enctype="multipart/form-data">
							<tr>
								<td><a href="logout.php">Logout</a></td>
								<td></td>
							</tr>
							<tr>
								<td>Nama User</td>
								<td><input type="text" name="nama"></td>
							</tr>
							<tr>
								<td>Nim</td>
								<td> <input type="text" name="nim"></td>
							</tr>
							<tr>
								<td>Fakultas</td>
								<td>
									<select name="fakultas">
										<option value="fit">Fakultas Ilmu Terapan</option>
										<option value="fkb">Fakultas Komunikasi Bisnis</option>
										<option value="fri">Fakultas Rekayasa Industri</option>	
										<option value="fte">Fakultas Teknik Elektro</option>
										<option value="fti">Fakultas Teknik Informatika</option>			
									</select>
							</td>
							</tr> 
							<tr>
								<td>Jenis Kelamin</td>
								<td>
									<input type="radio" name="jk" value="Laki-Laki" checked> Laki-Laki
					  				<input type="radio" name="jk" value="Perempuan"> Perempuan
					  			</td>
							</tr>
							<tr></tr>
							<tr>
								<td><input type="file" name="file"></td>
								<td><input type="submit" name="submit" value="kirim"></td>
							</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>
		<table border>
			<tr>
				<th>NIM</th>
				<th>Nama</th>
				<th>Fakultas</th>
				<th>Jenis Kelamin</th>
				<th>Gambar</th>
			</tr>
			<?php
			$data_mahasiswa = mysql_query("SELECT * FROM mahasiswa");
			$jumlah_data = mysql_num_rows($data_mahasiswa);
			if($jumlah_data > 0) {
				while ($data = mysql_fetch_array($data_mahasiswa)) {
			?>
				<tr>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['nim']; ?></td>
					<td><?php echo strtoupper($data['fakultas']); ?></td>
					<td><?php echo $data['jenis_kelamin']; ?></td>
					<td><img src="terUpload/<?php echo $data['gambar']; ?>" width="200"></td>
				</tr>
			<?php
				}
			} else {
				echo "Data Kosong!";
			}
			?>
		</table>
	</center>
</body>
</html>