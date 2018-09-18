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
	<h2>User Sign Up</h2>
	<form action="signup.php" method="POST">
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
	 
	$signup = mysql_query("INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')") or die(mysql_error());
	if ($signup) {
		$_SESSION['username'] = $username;
		header("location: index.php");
	} else {
		mysql_error();
	}
}
?>