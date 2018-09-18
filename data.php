<?php
include_once 'koneksi.php';

$nama =$_POST ['nama'];
$nim =$_POST ['nim'];
$fakultas =$_POST ['fakultas'];
$jk =$_POST ['jk'];

$file_name =$_FILES['file']['name'];
$tmp_name =$_FILES['file']['tmp_name'];

// menentukan lokasi file yang akan dipindah

$fileUpload = "terUpload/";

//pindah file
$terUpload = move_uploaded_file($tmp_name, $fileUpload.$file_name);

if ($terUpload) {
	header("location: index.php");
} else {
	echo "file gagal upload!";
}

$query_insert_data_mahasiswa = "INSERT INTO `mahasiswa`(`nim`, `nama`, `fakultas`, `jenis_kelamin`, `gambar`) VALUES ('$nim', '$nama', '$fakultas', '$jk', '$file_name');";
$query_status = mysql_query($query_insert_data_mahasiswa);
if($query_status){
	echo "Data Masuk!";
} else {
	echo mysql_error();
}
?>