<h2>DATA PEMBELIAN<h2>
    
<table class="table table-bordered">
    <thead>
       
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        <tbody>
            <?php $nomor=1 ?>
            <?php $ambil=$koneksi-> query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan"); ?>
            <?php while($pecah = $ambil->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_pelanggan']; ?></td>
                <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                <td><?php echo $pecah['total_pembelian']; ?></td>
                <td>
                    <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>"
                    class="btn btn-info">detail</a>
                </td>
            </tr>
            <?php $nomor++ ?>
            <?php }?>
        </tbody>
    </thead>
</table>