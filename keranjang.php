<?php
session_start();

 

$koneksi = new mysqli("localhost", "root", "", "db_kesita");
if(empty($_SESSION["keranjang"])  OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Keranjang kosong, silahkan berbelanja terlebih dahulu'); </script>";
    echo "<script>location='juice.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Keranjang KESITA</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 
</head>
<body>
    <!-------------NAVBAR------------>
<nav class="navbar navbar-default">
    <div class="container"></>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="checkout.php">checkout</a></li>
        </ul>
    </div>
</nav>
<section class="konten">
    <div class="container">
        <h1>Keranjang KESITA</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                <!------------------------ Menampilkan produk yang sedan diperulangkan berdasarkan id_produk ----->
                <?php
                $ambil= $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
                $pecah=$ambil->fetch_assoc();
                $subharga= $pecah["harga_produk"]*$jumlah;
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_produk"]; ?></td>
                    <td>Rp.<?php echo number_format ($pecah["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                    <td>
                        <a href="hapuskeranjang.php?id=<?php echo $id_produk ?> " class="btn btn-danger btn-xs">hapus</a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="juice.php" class="btn btn-default">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>
</section>
    
</body>
</html>