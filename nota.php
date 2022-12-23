<?php
$koneksi = new mysqli("localhost", "root", "", "db_kesita");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Nota Pembelian</title>
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

<section class="konten">
    <div class="container">



            <!---------------------------- Nota pembelian -------------------->

<?php
$ambil= $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan
    ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan
    WHERE tb_pembelian.id_pembelian='$_GET[id]'");
$detail= $ambil->fetch_assoc();
?>
<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
<p>
    <?php echo $detail['telepon_pelanggan']; ?><br>
    <?php echo $detail['email_pelanggan']; ?><br>
</p>
<p>
    tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
    total:<?php echo $detail['total_pembelian']; ?><br>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk=tb_produk.id_produk
        WHERE tb_pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
                <?php echo $pecah['harga_produk']* $pecah['jumlah']; ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                        Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
                        <strong>BANK BRI  323-5849-2212 AN. KESITA JUICE</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>