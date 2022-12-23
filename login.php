<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db_kesita");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container"></>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <!-------------------- jika sudah login --------------->
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <li><a href="logout.php">Logout</a></li>
                <!-------------------- jika belum login --------------->
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif ?>
                
            <li><a href="checkout.php">checkout</a></li>
        </ul>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-tittle">Login Pelanggan</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button class="btn btn-primary" name="login">Login</button>
                        <p class="login-register-text">Belum punya akun? <a href="register.php">Daftar disini</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php 
//jika ada tombol login(tombol login ditekan)
if (isset($_POST["login"]))
{

    $email = $_POST["email"];
    $password = $_POST["password"];
    // lakukan kuery ngecek akun di tabel pelanggan di db
    $ambil= $koneksi->query("SELECT * FROM tb_pelanggan 
    WHERE email_pelanggan='$email' AND password_pelanggan='$password'");



//ngitung akun yang terambil
$akunyangcocok = $ambil->num_rows;

//jika 1 akun ya g coocok, maka boleh diloginkan
if ($akunyangcocok==1)
{
    //anda sudah login
    //mendapatkan akun dala m bentuk array
    $akun= $ambil->fetch_assoc();
    //simpan disesion pelanggan
    $_SESSION["pelanggan"] = $akun;
    echo "<script>alert('Anda sukses login');</script>";
    echo "<script>location='checkout.php' ;</script>";
}
else
{
    //anda belum login
    echo "<script>alert('Anda gagal login, periksa kembali akun anda'); </script>";
    echo "<script>location='login.php';</script>";
}
}
?>
</body>
</html>