<?php 
session_start();
include_once 'koneksi.php';
if (isset($_SESSION["username"])) {
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>6701174057</title>
</head>
<body>
	<form action="login.php" method="POST">
		<input type="text" name="username" placeholder="Username"><br>
		<input type="password" name="password" placeholder="Password"><br>
		<input type="submit" name="submit" value="kirim">
	</form>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	 
	$login = mysql_query("select * from users where username='$username' and password='$password'");
	$cek = mysql_num_rows($login);
	if ($cek > 0) {
		while ($data = mysql_fetch_array($login)) {
			$_SESSION['username'] = $data['username'];
		}
		header("location: index.php");
	} else {
		header("location: login.php");
	}
}
?>