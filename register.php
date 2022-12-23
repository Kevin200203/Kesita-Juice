<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email_pelanggan'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['nama_pelanggan'];
	$email = $_POST['email_pelanggan'];
	$password = ($_POST['password_pelanggan']);
	$cpassword = ($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM tb_pelanggan WHERE email_pelanggan='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO tb_pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan)
					VALUES ('$email', '$password', '$username')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Selamat Anda telah berhasil daftar')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Sesuatu yang buruk terjadi')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email telah tersedia')</script>";
		}

	} else {
		echo "<script>alert('Password tidak sama')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">

	<title>Daftar akun</title>
</head>
<body  style="background-image:2.jpg;">
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Daftar</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email_pelanggan" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password_pelanggan" value="<?php echo $password; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Konfirmasi Password" name="cpassword" value="<?php echo $cpassword; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="nama_pelanggan" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Daftar</button>
			</div>
			<p class="login-register-text">Sudah punya akun?<a href="login.php">Login disini</a>.</p>
		</form>
	</div>
</body>
</html>
