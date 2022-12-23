<?php
$ambil= $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan
    ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan
    WHERE tb_pembelian.id_pembelian='$_GET[id]'");
$detail= $ambil->fetch_assoc();
?>
<pre><?php print_r($detail); ?></pre>

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

    </div>
</section>
</body>
</html>